<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\GuestDetail;
use Illuminate\Support\Str;
use \Carbon\Carbon;
use PDF;

class MirkazController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth', ['except' => 'guest-details']);
    }


    public function invitaion(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'number' => 'required|integer',
            'date' => 'required|string',
            'period' => 'required|string',
            'location' => 'required|string',
            'location_link' => 'required|string',
        ]);

        $guest = Guest::create($validatedData);

        $invitationToken = Str::uuid();

        $guest->update(['invitation_link' => $invitationToken]);

        $invitationLink = route('guest-details', ['token' => $invitationToken]);
        
        return response()->json(['invitation_link' => $invitationLink], 201);
    }

    public function show($token)
    {
        $guest = Guest::where('invitation_link', $token)->first();
    
        if (!$guest) {
            abort(404);
        }
    
        return view('invitation_form', compact('guest'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'guest_id' => 'required|integer',
            'guest_name' => 'required|string',
            'job' => 'nullable|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);

        $guest = Guest::find($validatedData['guest_id']);

        if (!$guest || $guest->number <= 0) {
            return redirect()->back()->with('error', 'لقد استنفذت عدد الدعوات الممنوحة لكم');
        }

        $guestDetail = GuestDetail::create([
            'guest_id' => $validatedData['guest_id'],
            'guest_name' => $validatedData['guest_name'],
            'job' => $validatedData['job'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
        ]);

        $guest->decrement('number');

        $this->invitaion_pdf( $guestDetail, 'pdf.invitation', 'invitation' );
        $this->invitaion_pdf( $guestDetail, 'pdf.access_card', 'access_card' );

        return redirect()->back()->with('success', 'تم إرسال الدعوه بنجاح');
    }

    public function invitaion_pdf($content,$view,$name){
        
        $guestDetail = GuestDetail::with('guest')->find($content->id);

        $qr_code_n = rand(1,999999999999999);
        \QRCode::url( $qr_code_n )->setOutfile('qrcode/'.$qr_code_n.'.png')->png();
        $guestDetail->update(['qr_code' => $qr_code_n]);

        view()->share('content',$guestDetail);
        view()->share('qr_code',$qr_code_n);
        $pdf_name = $name.'_'.Carbon::now()->toDateTimeString().'.pdf';

        $pdf = PDF::loadView($view)->setPaper('a4')->setOrientation('portrait')->setOption('margin-bottom', 0)->setOption('margin-top', 0)->setOption('margin-left', 0)->setOption('margin-right', 0);
            
        $pdfname = base_path('public/pdf/'.$pdf_name);
        $pdf->save( $pdfname );

        if( $name == 'invitation' ){
            $guestDetail->update(['invitation_link' => $pdf_name]);
        }elseif ( $name == 'access_card' ) {
            $guestDetail->update(['access_card' => $pdf_name]);
        }

        return $pdf->inline($pdf_name);
    }


    public function whatsapp_invitaion(){

        $guests = GuestDetail::where('invitation_status', 0)->get();
        foreach ($guests as $key => $guest) {
            $response = $this->sendWhatsappInvitation($guest);

            if ($response->sent == true) {
                $guest->update(['invitation_status' => 1]);
            }
        }

        return 'ok';
    }

    public function whatsapp_hook(Request $request)
    {
        $requestData = $request->all();

        $data = $requestData['data'];
        $from = $data['from'];
        $message = $data['body'];

        $from = explode('@', $from);
        $phoneNumber = $from[0];
        $guestDetail = GuestDetail::whereNull('invitation_accepted')->where('phone','like' ,'%'.$phoneNumber.'%')->first();

        if ($guestDetail) {
            if( $message == 'مؤكد'  ||$message == 'تأكيد'  ||$message == 'أؤكد'  || $message == 'موكد'  ||$message == 'تاكيد' ){
                $guestDetail->update(['invitation_accepted' => true]);

                if( $guestDetail->invitation_accepted == 1 && $guestDetail->access_card_status == 0 ){
                    $this->whatsapp_access_card($guestDetail);
                    $this->whatsappLocation($guestDetail->phone);
                }

                $guestDetail->update(['access_card_status' => 1]);
            }
            if( $message == 'اعتذر'  ||$message == 'اعتذار'  ||$message == 'اعتدار'  ||$message == 'اعتدار' ){

                $this->whatsapp_message($guestDetail->phone);
                $guestDetail->update(['invitation_accepted' => 0]);
            }
        }

        return response()->json(['success' => true], 200);
    }

    public function pdf_test(){

        $guestDetail = GuestDetail::with('guest')->find(15);
        $name = $guestDetail->guest_name;

        $qr_code_n = rand(1,999999999999999);
        $qr_code = \QRCode::url( 'https://www.google.com/' )->setOutfile('qrcode/'.$qr_code_n.'.png')->png();

        view()->share('content',$guestDetail);
        view()->share('qr_code',$qr_code_n);

        $pdf_name = $name.'_'.Carbon::now()->toDateTimeString().'.pdf';

        $pdf = PDF::loadView('pdf_1n')->setPaper('a4')->setOrientation('portrait')->setOption('margin-bottom', 0)->setOption('margin-top', 0)->setOption('margin-left', 0)->setOption('margin-right', 0);
            
        // $pdfname = base_path('public/pdf/'.$pdf_name);
        // $pdf->save( $pdfname );

        // $guestDetail->update(['invitation_link' => $pdf_name]);

        return $pdf->inline($pdf_name);

        return view('pdf_1n');
    }
}