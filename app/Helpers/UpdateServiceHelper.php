<?php

return [
    /*****************************/
    /*********** DONE ************/
    /*****************************/
    'دَن' => [
        'helper_name' => 'DoneHelper',
        'عقد للشريك' => [
            'NDA'                => [
                'view'     => 'pdf.done.contract.partner.nda',
                'function' => 'contract_partner_nda',
                'size'     => 'a4',
            ],
            'عقد الإنتاج المرئي'             => [
                'view'     => 'pdf.done.contract.partner.project',
                'function' => 'contract_partner_project',
                'size'     => 'a4',
            ],
        ],
        'عقد للمورّد' => [
            'NDA'             => [
                'view'     => 'pdf.done.contract.supplier.nda',
                'function' => 'contract_supplier_nda',
                'size'     => 'a4',
            ],
            'اتفاقية تمثيل'    => [
                'view'     => 'pdf.done.contract.supplier.castagreement',
                'function' => 'contract_supplier_castagreement',
                'size'     => 'a4',
            ],
            'اتفاقية عمل'               => [
                'view'     => 'pdf.done.contract.supplier.index',
                'function' => 'contract_supplier',
                'size'     => 'a4',
            ],
        ],
        'عرض سعر' => [
            'عرض سعر'           => [
                'view'     => 'pdf.done.offerprice.offer_price',
                'function' => 'offer_price',
                'size'     => 'a4',
            ],
            'عرض السعر مع فكرة'  => [
                'view'     => 'pdf.done.offerprice.with_idea',
                'function' => 'offer_price_with_idea',
                'size'     => '1080',
            ],
        ],
        'فاتورة' => [
            'فاتورة'           => [
                'view'     => 'pdf.done.invoice.three_in_one',
                'function' => 'three_in_one',
                'size'     => 'a4',
            ],
        ],
    ],
    /*****************************/
    /*********** Blackmist ************/
    /*****************************/
    'Blackmist' => [
        'helper_name' => 'DoneHelper',
        'عرض سعر' => [
            'عرض سعر'           => [
                'view'     => 'pdf.blackmist.offerprice.offer_price',
                'function' => 'offer_price',
                'size'     => 'a4',
            ],
        ],
    ],


];
