<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pdflist;
use PhpParser\Node\Stmt\Foreach_;
use \Carbon\Carbon;
use PDF;

use function PHPUnit\Framework\isNull;

class HistoryController extends Controller
{

    public function index(){
        if( auth()->user()->id == 20 || auth()->user()->id == 23 ){
            $pdflist = Pdflist::orderBy('created_at', 'DESC')->paginate(30);
        }else{
            $pdflist = Pdflist::where('user_id',auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(30);
        }
        //dd( $pdflist[0]->user->name );
        return view('history',compact('pdflist'));
    }

    public function search(Request $request){

        $pdflist = Pdflist::query();
        

        if( isset($request->user) ){
            $pdflist = $pdflist->where('user_id',$request->user);
        }
        elseif ( isset($request->type) ) {
            $pdflist = $pdflist->where('service',$request->type);
        }
        elseif ( isset($request->service) ) {
            $pdflist = $pdflist->where('service_type',$request->service);
        }
        elseif ( isset($request->service_name) ) {
            $pdflist = $pdflist->where('service_pdf',$request->service_name);
        }
        elseif ( isset($request->from) && isset($request->to) ) {
            $from = Carbon::parse($request->from)->startOfDay();                        
            $to = Carbon::parse($request->to)->endOfDay();
            $pdflist = $pdflist->whereBetween('created_at',[$from,$to]);
        }
        elseif ( isset($request->doc_nbr) ) {
            $pdflist = $pdflist->where('doc_nbr',$request->doc_nbr);
        }


        if( auth()->user()->id != 20 && auth()->user()->id != 23 ){
            $pdflist = $pdflist->where('user_id',auth()->user()->id);
        }
        

        $pdflist = $pdflist->orderBy('id', 'DESC')->paginate(30);        
        $pdflist->appends(request()->input())->links();

        return view('history',compact('pdflist'));
    }

    public function delete($id)
    {
        Pdflist::where('id',$id)->delete();
        return redirect()->route('history.index');
    }

    public function edite($id){
        $pdf = Pdflist::where('id',$id)->first();

        if( empty($pdf->html) ){
            return redirect('history')->with('alert', 'الصفحة غير قابلة للتعديل');
        }

        $id             = $pdf->id;
        $content        = json_decode($pdf->json, true);
        $json           = $pdf->form;
        $html           = file_get_contents(base_path('public/forms/').$pdf->html);
        $page_title     = $pdf->page_title;

        $form_view      = 'edit_form.index';
        
        if( isset($content['contract_date_ar']) ){
            $str = strip_tags($content['contract_date_ar']);
            $contract_date_ar = explode(" ",$str);
            return view($form_view,compact('json','id','html','page_title','contract_date_ar'));
        }

        return view($form_view,compact('json','id','html','page_title'));
    }

    public function generate_new_pdf($Pdflist,$request){

        $service_name           = $Pdflist->service;
        $service_type           = $Pdflist->service_type;
        $service_pdf            = $Pdflist->service_pdf;
        $services               = include app_path() .'/Helpers/UpdateServiceHelper.php';
        $helper_name            = $services[ $service_name ]['helper_name'];

        $service_info           = $services[ $service_name ][ $service_type ][ $service_pdf ];
        $helper_function        = $service_info['function'];
        $view                   = $service_info['view'];
        $size                   = $service_info['size'];
        $content                = $helper_name::$helper_function($request);
        
        view()->share('content',$content);

        $old_name               = preg_replace('/(\d{4}[\.\/\-][01]\d[\.\/\-][0-3]\d)/', '', $Pdflist->pdf_link);
        $new_name               = explode(" ", $old_name)[0];

        $pdf_name = $new_name.'_'.Carbon::now()->toDateTimeString().'.pdf';
        if( $size === 'a4' )
            $pdf                = PDF::loadView($view)->setPaper('a4')->setOrientation('portrait')->setOption('margin-bottom', 0)->setOption('margin-top', 0)->setOption('margin-left', 0)->setOption('margin-right', 0);
        if( $size === '1080' )
            $pdf                = PDF::loadView($view)->setOption('page-width', '2560px')->setOption('page-height', '1440px')->setOrientation('portrait')->setOption('margin-bottom', 0)->setOption('margin-top', 0)->setOption('margin-left', 0)->setOption('margin-right', 0);


        $pdfname                = base_path('public/pdf/'.$pdf_name);
        $pdf->save( $pdfname );

        return [ 'pdf' => $pdf_name, 'content' => $content ];
    }

    public function update(Request $request, $id){

        $Pdflist                = Pdflist::where('id',$id)->first();
        
        //$request['contract_id'] = json_decode($Pdflist->json)->contract_id;

        if( isset(json_decode($Pdflist->json)->contract_id) && !empty(json_decode($Pdflist->json)->contract_id) )
        {
            $request['contract_id'] = json_decode($Pdflist->json)->contract_id;
        }
        elseif( isset( json_decode($Pdflist->json,true)['invoice-number'] ) && !empty( json_decode($Pdflist->json,true)['invoice-number'] ) )
        {
            $request['contract_id'] = json_decode($Pdflist->json,true)['invoice-number'];
        }
        else{
            $request['contract_id'] = null;
        }
        
        
        if( $request['client_logo'] == "undefined" )
            $request['dn_cl_logo'] = json_decode($Pdflist->json)->client_logo;
        else
            $request['dn_cl_logo'] = null;

        if( $request['video_img'] == "undefined" )
            $request['dn_video_img'] = json_decode($Pdflist->json)->video_img;
        else
            $request['dn_video_img'] = null;        


        $request['qr_code']         = json_decode($Pdflist->json)->qr_code ?? null;
        $new_pdf                    = $this->generate_new_pdf($Pdflist,$request);
        $pdf_name                   = $new_pdf['pdf'];
        $content                    = $new_pdf['content'];

        //save html file
        $html                       = 'html_'.Carbon::now()->toDateTimeString().'.txt';
        $myfile                     = fopen(base_path('public/forms/').$html, "wb");
        $txt                        = $request['html'];
        fwrite($myfile, $txt);
        fclose($myfile);


        $Pdflist->pdf_link          = $pdf_name;
        $Pdflist->json              = json_encode($content);
        $Pdflist->form              = json_encode($request->all()['inputs'] ?? '');
        $Pdflist->html              = $html;
        $Pdflist->qr_code           = $content['qr_code'] ?? '';
        $Pdflist->save();
        
        if( $request->ajax() ){
            return $pdf_name;
        }

        return redirect()->route('history.index');
    }

    public function duplicate(Request $request, $id){

        $Pdflist                    = Pdflist::find($id);

        if( empty($Pdflist->html) ){
            return redirect('history')->with('alert', 'الصفحة غير قابلة للنسخ');
        }

        $request['dn_cl_logo']      = json_decode($Pdflist->json)->client_logo ?? null;
        $request['dn_video_img']    = json_decode($Pdflist->json)->video_img ?? null;

        $request['inputs']          = json_decode($Pdflist->form);
        //generate new pdf
        $new_pdf                    = $this->generate_new_pdf($Pdflist,$request);        
        $pdf_name                   = $new_pdf['pdf'];
        $content                    = $new_pdf['content'];
        
        $newPdflist                 = $Pdflist->replicate();
        $newPdflist->pdf_link       = $pdf_name;
        $newPdflist->user_id        = auth()->user()->id;
        $newPdflist->json           = json_encode($content);
        $newPdflist->created_at     = Carbon::now();
        $newPdflist->qr_code        = $content['qr_code'] ?? '';
        $newPdflist->save();

        return redirect()->route('history.index');
    }

}
