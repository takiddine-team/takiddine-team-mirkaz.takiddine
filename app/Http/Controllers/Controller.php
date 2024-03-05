<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \Carbon\Carbon;
use \App\Models\{Pdflist,User};
use PDF;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $users          = User::get();
        View()->share('users', $users);
    }

    public function whatsapp_message($phone){

        $url = "https://api.ultramsg.com/instance79646/messages/chat";
        $params = [
            'token' => 'bmze08d09h5el6zw',
            'to' => $phone,
            'body' => 'نُقدّر اعتذارك، ونتطلّع إلى رؤيتك في قادم الأحداث 💫'
        ];

        return $this->whatsapp( $params, $url );
    }

    public function whatsapp_access_card($guest){

        $url = "https://api.ultramsg.com/instance79646/messages/document";
        $params = [
            'token' => 'bmze08d09h5el6zw',
            'to' => $guest->phone,
            'filename' => 'بطاقة الدخول',
            'document' => 'https://mirkaz.takiddine.live/pdf/'.$guest->access_card,
            'caption' => '🏷 مُرفق لكم بطاقة الدخول، لإبرازها عند وصولكم، متشوّقون إلى لقائك قريبًا.'
        ];

        return $this->whatsapp( $params, $url );
    }

    public function sendWhatsappInvitation($guest){
        
        $url = "https://api.ultramsg.com/instance79646/messages/document";
        $params = [
            'token' => 'bmze08d09h5el6zw',
            'to' => $guest->phone,
            'filename' => 'دعوة خاصة',
            'document' => 'https://mirkaz.takiddine.live/pdf/'.$guest->invitation_link,
            'caption' => 'دعوة السحور:

دعوة خاصة

'.$guest->guest_name.'
السلام عليكم ورحمة الله وبركاته

🌙 | مركاز البلد الأمين
يشُرف بحضورك

🗓 |  الجمعة 5 رمضان 1445هـ
🕕 | لقاء السحور (11 مساءً حتى 1:30 صباحًا).
📍| مكة المكرمة، ضاحية سموّ

🔗 | نهتم بتأكيد حضوركم، عبر ردّك بـ:
✅ (مؤكد) لتأكيد تشريفك.
❌ (اعتذر) في حال عدم قدرتك على الحضور.

نسعد بكم ✨'
        ];

        return $this->whatsapp( $params, $url );
    }

    public function whatsappLocation($phone){
        $url = "https://api.ultramsg.com/instance79646/messages/location";
        $params = [
            'token' => 'bmze08d09h5el6zw',
            'to' => $phone,
            'address' => '📍 | الموقع الذي سيجمعنا بكم',
            'lat' => '21.5517191',
            'lng' => '39.1519381'
        ];

        return $this->whatsapp( $params, $url );
    }

    public function whatsapp( $params, $url ){

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($params),
            CURLOPT_HTTPHEADER => [
                "content-type: application/x-www-form-urlencoded",
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $response = json_decode($response);
            if( $response->sent == true ){
                //update table
            }
            return $response;
        }
    }

}
