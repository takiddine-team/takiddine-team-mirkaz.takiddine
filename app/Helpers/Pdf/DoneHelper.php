<?php

namespace App\Helpers\Pdf;
use \Carbon\Carbon;

class DoneHelper
{
    public static function contract_partner_nda($request)
    {
        $values             = [ 'companyname','companycountry','companyaddress','companyrepresentative','action' ];
        $c_request          = request_filter($request,$values);
        $inputs             = $c_request['inputs'];
        $all_values         = $c_request['all_values'];

        return [
            'selected_choice'               => $inputs['selected-choice'] ,
            'company'                       => $all_values['companyname'] ,
            'country_company'               => $all_values['companycountry'],
            'address_company'               => $all_values['companyaddress'],
            'commercia_record'              => $inputs['commercialregister'] ,
            'directeur_company'             => $all_values['companyrepresentative'] ,
            'directeur_company_signature'   => $all_values['action'].'  '.$all_values['companyrepresentative'] ,
            'as'                            => $all_values['action'] ,
            'cin'                           => $inputs['cin'] ,
            'show_cin'                      => $inputs['show_cin'] ,
            'contract_id'                   => $request['contract_id'] ?? Carbon::now()->isoFormat('YYYYMMDDHHmmss'),
            'contract_date'                 => date("Y/m/d", strtotime($inputs['dateofcontract'])) ,
            'contract_date_ar'              => $inputs['day-ar'] . " الموافق " . "<span class=''> " . $inputs['day-nbr-ar'] . " </span> " . $inputs['day-month-ar'] . " <span class=''> " . $inputs['day-year-ar'] . " </span>" . "<span class='m-l7ram' style='position: relative;right: -3px;'>م<span>",
            'project_name'                  => $inputs['project_name']
        ];
    }

    public static function contract_partner_project($request)
    {
        $values             = ['companyname', 'companyrepresentative', 'action', 'companycountry', 'clause_cost', 'service_','servicedetails','service_cost'];

        $c_request          = request_filter($request,$values);
        $inputs             = $c_request['inputs'];
        $all_values         = $c_request['all_values'];
        $all_values_array   = $c_request['all_values_array'];

        $cost = '';
        if ($inputs['price_'] == "priceoption1-done") {
            $cost = array_sum($inputs['clause_cost']);
        }
        if ($inputs['price_'] == "priceoption2-done" || $inputs['price_'] == "priceoption3-done") {
            $cost = array_sum($inputs['service_cost']);
        }


        $content = [
            'project_name'              => $inputs['project_name'],
            'company'                   => $all_values['companyname'],
            'directeur_company'         => $all_values['action'] . " " . $all_values['companyrepresentative'],
            'directeur_company_1'       => $all_values['companyrepresentative'],
            'country_company'           => $all_values['companycountry'],
            'company_address'           => $inputs['address'],
            'addresscompany'            => $inputs['addresscompany'],
            'commercia_record'          => $inputs['commercialregister'],
            'show_cin'                  => $inputs['show_cin'],
            'cin'                       => $inputs['cin'],
            'as'                        => $all_values['action'],

            'partner_email'             => $inputs['partner_email'],
            //'partner_officer'           => $inputs['partner_officer'],
            'qubbah_email'              => $inputs['qubbah_email'],
            //'qubbah_officer'            => $inputs['qubbah_officer'],

            'mission'                   => $inputs['mission'],
            'area'                      => $inputs['area'],
            'first-side'                => $inputs['first-side'],

            'project_name'              => $inputs['project_name'],
            //count
            'project_services_count'    => count($inputs['servicestep']) + 1,
            //table_1
            'project_services'          => $inputs['servicestep'],
            'serviceporcentage'         => $inputs['serviceporcentage'],

            //************tables************//
            'price_'                    => $inputs['price_'],
            //priceoption1
            'clause_cost'               => $all_values_array['clause_cost'],
            //priceoption2&3
            'priceoption_count'         => count($inputs['service_']) + 1,
            'service_'                  => $all_values_array['service_'],
            'servicedetails'            => $all_values_array['servicedetails'],
            'service_cost'              => $all_values_array['service_cost'],
            //Payments
            'payment_date'              => $inputs['payment_date'],
            'payment_perce'             => $inputs['payment_perce'],
            'payment_price'             => $inputs['payment_price'],
            //************tables************//
            
            'contract_duration'         => $inputs['contract_duration'],
            'contract_id'               => $request['contract_id'] ?? Carbon::now()->isoFormat('YYYYMMDDHHmmss'),            
            'contract_date'             => date("Y/m/d", strtotime($inputs['dateofcontract'])),
            'contract_date_ar'          => $inputs['day-ar'] . " الموافق " . "<span class=''> " . $inputs['day-nbr-ar'] . " </span> " . $inputs['day-month-ar'] . " <span class=''> " . $inputs['day-year-ar'] . " </span>" . "<span class='m-l7ram' style='position: relative;right: -3px;'>م<span>",


            'cost_sum'                  => trim_zeros($cost,3),
            $cost_sum                   = $cost,
            'cost_tva'                  => trim_zeros(($cost_sum * 0.15),3),
            $cost_tva                   = ($cost_sum * 0.15),
            'cost_sum_tva'              => trim_zeros(($cost_sum + $cost_tva),3),
        ];


        //dd( array_sum($request['clause_total']) );


        return $content;
    }

    public static function contract_supplier_nda($request)
    {
        $inputs = request_filter($request)['inputs'];
        
        return [
            'suppliername'          => $inputs['suppliername'],
            'suppliersex'           => $inputs['suppliersex'],
            'suppliernationality'   => $inputs['suppliernationality'],
            'supplierphone'         => $inputs['supplierphone'],
            'suppliercin'           => $inputs['suppliercin'],

            'project'               => $inputs['project'],
            'mission'               => $inputs['mission'],

            'contract_id'           => $request['contract_id'] ?? Carbon::now()->isoFormat('YYYYMMDDHHmmss'),
            'contract_date'         => date("Y/m/d", strtotime($inputs['dateofcontract'])),
            'show_penality'         => $inputs['show_penality'],
            'penality'              => $inputs['penality'],
            'damage'                => $inputs['damage'],
        ];
    }

    public static function contract_supplier_castagreement($request)
    {
        $inputs = request_filter($request)['inputs'];

        return [
            'company'           => $inputs['companypub'],
            'city_company'      => $inputs['city'],

            'actorname'         => $inputs['actorname'],
            'actorsex'          => $inputs['actorsex'],
            'actornationa'      => $inputs['actornationa'],
            'actorphone'        => $inputs['actorphone'],
            'actorcin'          => $inputs['actorcin'],

            'contract_date_ar'  => $inputs['day-ar'] . " الموافق " . $inputs['day-nbr-ar'] . " " . $inputs['day-month-ar'] . " " . $inputs['day-year-ar'] . "م",
            'contract_id'       => $request['contract_id'] ?? Carbon::now()->isoFormat('YYYYMMDDHHmmss'),
            'contract_date'     => date("Y/m/d", strtotime($inputs['dateofcontract'])),
            'contractprice'     => trim_zeros($inputs['contractprice']),
            'show_agreement'    => $inputs['show_contractprice'],
        ];
    }

    public static function contract_supplier($request)
    {
        $inputs = request_filter($request)['inputs'];

        return [
            'suppliername'          => $inputs['suppliername'],
            'suppliersex'           => $inputs['suppliersex'],
            'suppliernationality'   => $inputs['suppliernationality'],
            'supplierphone'         => $inputs['supplierphone'],
            'suppliercin'           => $inputs['suppliercin'],

            'project'               => $inputs['project'],
            'mission'               => $inputs['mission'],
            'area'                  => $inputs['area'],
            'role'                  => $inputs['role'],
            'project_price'         => $inputs['project-price'],
            'duration'              => $inputs['duration'],

            'contract_id'           => $request['contract_id'] ?? Carbon::now()->isoFormat('YYYYMMDDHHmmss'),
            'contract_date'         => date("Y/m/d", strtotime($inputs['dateofcontract'])),
            'contract_date_ar'      => $inputs['day-ar'] . " الموافق " . $inputs['day-nbr-ar'] . " " . $inputs['day-month-ar'] . " " . $inputs['day-year-ar'] . "م",

            //'show_penality'         => $inputs['show_penality'],
            //'penality'              => $inputs['penality'],
            //'damage'                => $inputs['damage'],
        ];
    }

    public static function three_in_one($request)
    {

        $values = [ 'service_','servicedetails','dayprice','numberofdays','cost' ];

        $c_request          = request_filter($request,$values);
        $inputs             = $c_request['inputs'];
        $all_values_array   = $c_request['all_values_array'];

        $content = [
            'contract_date'             => date("Y/m/d", strtotime($inputs['invoice-date'])),
            'contract_id'               => $request['contract_id'] ?? Carbon::now()->isoFormat('YYYYMMDDHHmmss'),
            'partner_tax'               => $inputs['partner_tax'],
            'show_tax'                  => $inputs['show-partner-tax'],
           
            'invoice-date'              => date("Y/m/d", strtotime($inputs['invoice-date'])),
            'partner'                   => $inputs['partner'],
            'project'                   => $inputs['project'],
            'partner_address'           => $inputs['partner_address'] ?? null,
            'partner_more_info'         => $inputs['partner_more_info'] ?? null,
            'projectdate1'              => date("Y/m/d", strtotime($inputs['projectdate1'])),
            'projectdate2'              => date("Y/m/d", strtotime($inputs['projectdate2'])),
            'project_execution_date'    => $inputs['show_tin'],
            // 'project_execution_date' => $inputs['project_execution_date'],
            'selected_table'            => $inputs['first-side'],

            $servicedetails             = $all_values_array['servicedetails'],
            'service_'                  => $all_values_array['service_'],
            'servicedetails'            => $all_values_array['servicedetails'],
            //'servicedetails_count'    => count($servicedetails),
            'service_day_price'         => $all_values_array['dayprice'],
            'service_days'              => $all_values_array['numberofdays'],
            'service_cost'              => $all_values_array['cost'],

            $cost_sum                   = array_sum($inputs['cost']),
            'cost_sum'                  => trim_zeros($cost_sum,3),
            $cost_tva                   = $cost_sum * 0.15,
            'cost_tva'                  => trim_zeros(($cost_sum * 0.15),3),
            'cost_sum_tva'              => trim_zeros(($cost_sum + $cost_tva),3),

            'qr_code' => qr_code( 'https://www.done-house.com/invoice/qrcode/',$request['qr_code'] ),
        ];

        $dataToEncode = [
            [1, 'شركة نقطة إنجاز لخدمات الدعاية والإعلان'],
            [2, '311988551900003'],
            [3, $content['contract_date']],
            [4, str_replace(',','',$content['cost_sum_tva'])],
            [5, str_replace(',','',$content['cost_tva'])]
        ];

        $content += [
            'qr_code_img'        => qr_code_zatca( $dataToEncode ),
        ];

        return $content;
    }


    public static function offer_price($request)
    {
        $values = [ 'service_','servicedetails','dayprice','numberofdays','cost' ];

        $c_request          = request_filter($request,$values);
        $inputs             = $c_request['inputs'];
        $all_values_array   = $c_request['all_values_array'];

        return [
            'contract_date'             => date("Y/m/d", strtotime($inputs['invoice-date'])),
            'contract_id'               => $request['contract_id'] ?? Carbon::now()->isoFormat('YYYYMMDDHHmmss'),
           
            'invoice-date'              => date("Y/m/d", strtotime($inputs['invoice-date'])),
            'partner'                   => $inputs['partner'],
            'project'                   => $inputs['project'],
            'projectdate1'              => date("Y/m/d", strtotime($inputs['projectdate1'])),
            'projectdate2'              => date("Y/m/d", strtotime($inputs['projectdate2'])),
            'project_execution_date'    => $inputs['show_tin'],
            // 'project_execution_date' => $inputs['project_execution_date'],
            'selected_table'            => $inputs['first-side'],

            $servicedetails             = $all_values_array['servicedetails'],
            'service_'                  => $all_values_array['service_'],
            'servicedetails'            => $all_values_array['servicedetails'],
            //'servicedetails_count'    => count($servicedetails),
            'service_day_price'         => $all_values_array['dayprice'],
            'service_days'              => $all_values_array['numberofdays'],
            'service_cost'              => $all_values_array['cost'],

            $cost_sum                   = array_sum($inputs['cost']),
            'cost_sum'                  => trim_zeros($cost_sum,3),
            $cost_tva                   = $cost_sum * 0.15,
            'cost_tva'                  => trim_zeros(($cost_sum * 0.15),3),
            'cost_sum_tva'              => trim_zeros(($cost_sum + $cost_tva),3),

            'qr_code' => qr_code( 'https://www.done-house.com/invoice/qrcode/',$request['qr_code'] ),
        ];
    }

    public static function offer_price_with_idea($request)
    {
        $inputs          = request_filter($request)['inputs'];

        $logoName = $request['dn_cl_logo'] ?? time().'1.'.$request->client_logo->extension();
        if( $request['dn_cl_logo'] == null )
            $request->client_logo->move(public_path('images'), $logoName);

        $imagevideoName = $request['dn_video_img'] ?? time().'2.'.$request->video_img->extension();
        if( $request['dn_video_img'] == null )
            $request->video_img->move(public_path('images'), $imagevideoName);

        return [
            //'project_name'            => $request['projectname'],
            //'offer_date'                => Carbon::parse($inputs['date'])->isoFormat('DD MMMM YYYY'),
            //'offer_date_'               => Carbon::parse($inputs['date'])->isoFormat('MM-DD-YYYY'),
            
            'clientname_ar'             => $inputs['clientname_ar'],
            'client_logo'               => $logoName,
            //الفكرة
            'idea_source'               => $inputs['idea_source'],
            'creative_idea'             => $inputs['creative_idea'],
            //عمل مُشابه
            'video_name'                => $inputs['video_name'],
            'video_url'                 => $inputs['video_url'],
            'video_img'                 => $imagevideoName,        
            //بطاقة المشروع
            'equipment_name'            => explode("\r\n", trim($inputs['equipment_name'])),
            'crew_name'                 => explode("\r\n", trim($inputs['crew_name'])),
            'shooting_days'             => explode("\r\n", trim($inputs['shooting_days'])),
            'done_place'                => explode("\r\n", trim($inputs['done_place'])),
            'done_note'                 => explode("\r\n", trim($inputs['done_note'])),
            //العرض المالي
            'project_total_payment'     => trim_zeros( $inputs['project_total_payment'],3 ),
            'project_tva_payment'       => trim_zeros(($inputs['project_total_payment'] * 0.15),3),
            'project_totaltva_payment'  => trim_zeros( ($inputs['project_total_payment'] * 0.15) + $inputs['project_total_payment'] ,3 ),
            //الدفعات المالية
            'show_firstpayment'         => $inputs['show_firstpayment'],
            'payments_part'             => $inputs['payments_part'],
            'payments_percent'          => $inputs['payments_percent'],
            'payments_date'             => $inputs['payments_date'],
            //الخطوات القادمة
            'project_step'              => $inputs['project_step'],
        ];
    }

    public static function meeting_report($request)
    {
        $inputs = request_filter($request)['inputs'];

        return [
            'project_name'          => $inputs['projectname'],
            'project_description'   => $inputs['projectdescription'],
            'company_name'          => $inputs['companyname'],
            'object'                => $inputs['object'],
            'date'                  => Carbon::parse($inputs['date'])->isoFormat('YYYY/DD/MM'),
            'meeting_date'          => Carbon::parse($inputs['meeting_date'])->isoFormat('DD MMMM YYYY'),
            'date_from'             => $inputs['date_from'],
            'date_to'               => $inputs['date_to'],
            'qubbah_crew'           => $inputs['qubbah_crew'],
            'partner_crew'          => $inputs['partner_crew'],
            'nextstep'              => explode("\r\n", trim($inputs['nextstep'])),
            'content_sources'       => $inputs['content_sources'],

            'projectgoal'           => $inputs['projectgoal'],
            'projectoressource'     => $inputs['ressources'],
            'projectduration'       => $inputs['project-period'],
            'projectcategory'       => $inputs['projectcategory'],
            'projectpublic'         => $inputs['project-public'],
            'projectvesion'         => $inputs['vesion'],
            'meeting-details'       => explode("\r\n", trim($inputs['meeting-details'])),
            'creatorname_ar'        => $inputs['creatorname_ar'],
            'creatorname'           => $inputs['creatorname'],
            'creatorphone'          => $inputs['creatorphone'],
        ];
    }
}