<?php


return [
    [
        'name' => 'عقد للشريك',
        'icon' => '/img/assets/vs_icon_3.svg',
        'custom_class' => '',
        'buttons' => [
            [
                'id' => 'pv_partner_nda',
                'custom_class' => 'nexa-light',
                'name' => 'NDA',
                'link' => 'vp.form.contract.partner.nda',
            ],
            [
                'id' => 'pv_partner_project',
                'custom_class' => '',
                'name' => 'مشروع',
                'link' => 'vp.form.contract.partner.project',
            ],
        ],

    ],
    [
        'name' => 'عقد للمورد',
        'icon' => '/img/assets/vs_icon_2.svg',
        'custom_class' => '',
        'buttons' => [
            [
                'id' => 'pv_supplier_nda',
                'custom_class' => 'nexa-light',
                'name' => 'NDA',
                'link' => 'vp.form.contract.supplier.nda',
            ],
            [
                'id' => 'pv_supplier_project',
                'custom_class' => '',
                'name' => 'مشروع',
                'link' => 'vp.form.contract.supplier.index',
            ],
            [
                'id' => 'pv_supplier_castagreement',
                'custom_class' => '',
                'name' => 'اتفاقية تمثيل',
                'link' => 'vp.form.contract.supplier.castagreement',
            ],


        ],

    ],
    [
        'name' => ' عرض سعر',
        'icon' => '/img/assets/vs_icon_1.svg',
        'custom_class' => '',
        'buttons' => [
            [
                'id' => 'pv_offer_price',
                'custom_class' => '',
                'name' => 'عرض سعر',
                'link' => 'vp.form.offer.price',
            ],
            [
                'id' => 'pv_rate_card',
                'custom_class' => 'nexa-light',
                'name' => 'Eskelah Rate Card',
                'link' => 'vp.form.offer.rate_card',
            ],
            [
                'id' => 'pv_pffer_price_with_idea',
                'custom_class' => '',
                'name' => 'عرض سعر مع فكرة',
                'link' => 'vp.form.offer.with_idea',
            ],
        ],

    ],
    [
        'name' => ' فاتورة',
        'icon' => '/img/assets/vs_icon_5.svg',
        'custom_class' => 'offset-2 mt-30',
        'buttons' => [
            [
                'id' => 'pv_three_in_one',
                'custom_class' => '',
                'name' => 'فاتورة',
                'link' => 'vp.form.three.in.one',
            ],
        ],

    ],
    [
        'name' => ' محضر اجتماع',
        'icon' => '/img/assets/vs_icon_4.png',
        'custom_class' => 'mt-30',
        'buttons' => [
            [
                'id' => 'pv_meeting_report',
                'custom_class' => '',
                'name' => 'محضر اجتماع',
                'link' => 'vp.form.meeting_report',
            ],
        ],

    ]
];
