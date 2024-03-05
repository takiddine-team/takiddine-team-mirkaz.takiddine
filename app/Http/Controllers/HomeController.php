<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use App\Models\Guest;
use App\Models\GuestDetail;

use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'invoice_qr_code']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function qrCode()
    {
        return view('qrCode');
    }

    public function qr_code_scanner($qrCode){

        $guestDetail = GuestDetail::where('qr_code', $qrCode)->first();

        if ($guestDetail) {

            if( $guestDetail->qr_code_scanned ){
                return response()->json(['message' => '<span style="color:red;"> تم مسح رمز الاستجابة مسبقا </span>'], 200);
            }

            $guestDetail->update(['qr_code_scanned' => true]);

            return response()->json(['message' => '<span style="color:green;"> تم مسح رمز الاستجابة بنجاح </span>'], 200);
        }
        else {
            return response()->json(['message' => '<span style="color:red;"> لم يتم العثور على رمز الاستجابة </span>'], 200);
        }
    }

}