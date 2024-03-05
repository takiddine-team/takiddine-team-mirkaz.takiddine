<?php

    function trim_zeros( $number, $d = 3 ) {
        $nbr = number_format( $number, $d );
        return strpos($nbr,'.')!==false ? rtrim(rtrim($nbr,'0'),'.') : $nbr;
    }

    function qr_code( $link,$qr ){
        
        $qr_code = rand(1,999999999999999);
        if( $qr != null ){
            $qr_code = $qr;
        }
        
        return QRCode::url( $link.$qr_code )->setOutfile('qrcode/'.$qr_code.'.png')->png();
        return $qr_code;
    }

    function qr_code_zatca( $dataToEncode ){
    
        $qr_code = rand(1,999999999999999);
        $__TLV = __getTLV($dataToEncode);
        $__QR = base64_encode($__TLV);
        
        QRCode::text( $__QR )->setOutfile('qrcode/'.$qr_code.'.png')->png();
        return $qr_code;
    }

    function request_filter( $request, $values = null ){

        $all = $request->all();
        $inputs = array();
        if( !is_array($all['inputs']) ){
            parse_str($all['inputs'], $inputs);
        }else{
            $inputs = $all['inputs'];
        }


        if( $values == null ){
            return [ 'inputs' => $inputs ];
        }        

        foreach ($values as $value) {
            if (!empty(array_filter($inputs[$value], function ($a) {
                return $a !== null;
            }))) {
                $all_values[$value] =  array_values(array_filter($inputs[$value], new myFilter()))[0] ?? '';
                $all_values_array[$value] = array_values(array_filter($inputs[$value], new myFilter())) ?? '';
            } else {
                $all_values[$value] = '';
            }
        }

        return [ 'inputs' => $inputs, 'all_values' => $all_values, 'all_values_array' => $all_values_array ];
    }


    class myFilter
    {
        public function __invoke($var)
        {
            return ($var !== NULL && $var !== "");
        }
    }


    /*
    * QR Encoding Functions
    */

    function __getLength($value) {
        return strlen($value);
    }

    function __toHex($value) {
        return pack("H*", sprintf("%02X", $value));
    }

    function __toString($__tag, $__value, $__length) {
        $value = (string) $__value;
        return __toHex($__tag) . __toHex($__length) . $value;
    }

    function __getTLV($dataToEncode) {
        $__TLVS = '';
        for ($i = 0; $i < count($dataToEncode); $i++) {
            $__tag = $dataToEncode[$i][0];
            $__value = $dataToEncode[$i][1];
            $__length = __getLength($__value);
            $__TLVS .= __toString($__tag, $__value, $__length);
        }

        return $__TLVS;
    }

    /*
    * QR Encoding Functions
    */