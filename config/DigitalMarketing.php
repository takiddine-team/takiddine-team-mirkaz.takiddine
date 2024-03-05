<?php



return [
    [
        'name' => 'عقد للشريك',
        'icon' => '/img/assets/vs_icon_3.svg',
        'custom_class' => '',
        'buttons' => [
            [
                'id' => 'dm_partner_nda',
                'custom_class' => 'nexa-light',
                'name' => 'NDA',
                'link' => 'digital.form.contract.partner.nda',
            ],
            [
                'id' => 'dm_partner_project',
                'custom_class' => '',
                'name' => 'مشروع',
                'link' => 'digital.form.contract.partner.project',
            ],
        ],

    ],
    [
        'name' => 'عقد للمورد',
        'icon' => '/img/assets/vs_icon_2.svg',
        'custom_class' => '',
        'buttons' => [
            [
                'id' => 'dm_supplier_nda',
                'custom_class' => 'nexa-light',
                'name' => 'NDA',
                'link' => 'digital.form.contract.supplier.nda',
            ],
            [
                'id' => 'dm_supplier_castagreement',
                'custom_class' => '',
                'name' => 'اتفاقية تمثيل',
                'link' => 'digital.form.contract.supplier.castagreement',
            ],
            [
                'id' => 'dm_supplier_photographer',
                'custom_class' => '',
                'name' => 'اتفاقية مصور',
                'link' => 'digital.form.contract.supplier.photographer-contract',
            ],
            [
                'id' => 'dm_supplier_work_contract',
                'custom_class' => '',
                'name' => 'اتفاقية عمل',
                'link' => 'digital.form.contract.supplier.index',
            ],
        ],

    ],
    [
        'name' => ' عرض سعر',
        'icon' => '/img/assets/vs_icon_1.svg',
        'custom_class' => '',
        'buttons' => [
            [
                'id' => 'dm_offer_price',
                'custom_class' => '',
                'name' => 'عرض سعر',
                'link' => 'digital.form.offer.price',
            ],
        ],

    ],
    [
        'name' => ' فاتورة',
        'icon' => '/img/assets/vs_icon_5.svg',
        'custom_class' => 'offset-2 mt-30',
        'buttons' => [
            [
                'id' => 'dm_three_in_one',
                'custom_class' => '',
                'name' => 'فاتورة',
                'link' => 'digital.form.three.in.one',
            ],
        ],

    ],
    [
        'name' => ' محضر اجتماع',
        'icon' => '/img/assets/vs_icon_4.png',
        'custom_class' => 'mt-30',
        'buttons' => [
            [
                'id' => 'dm_meeting_report',
                'custom_class' => '',
                'name' => 'محضر اجتماع',
                'link' => 'digital.form.meeting_report',
            ],
        ],

    ]
];
