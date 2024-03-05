<?php


return [
    [
        'name' => 'عقد للشريك',
        'icon' => '/img/assets/q_icon_3.svg',
        'custom_class' => '',
        'buttons' => [
            [
                'id' => 'qubah_partner_nda',
                'custom_class' => 'nexa-light',
                'name' => 'NDA',
                'link' => 'done.form.contract.partner.nda',
            ],
            [
                'id' => 'qubah_partner_event',
                'custom_class' => '',
                'name' => 'عقد الإنتاج المرئي',
                'link' => 'done.form.contract.partner.project',
            ],
        ],

    ],
    [
        'name' => 'عقد للمورد',
        'icon' => '/img/assets/q_icon_2.svg',
        'custom_class' => '',
        'buttons' => [
            [
                'id' => 'qubah_supplier_nda',
                'custom_class' => 'nexa-light',
                'name' => 'NDA',
                'link' => 'done.form.contract.supplier.nda',
            ],
            [
                'id' => 'dm_supplier_castagreement',
                'custom_class' => '',
                'name' => 'اتفاقية تمثيل',
                'link' => 'done.form.contract.supplier.castagreement',
            ],
            [
                'id' => 'qubah_supplier_work',
                'custom_class' => '',
                'name' => 'اتفاقية عمل',
                'link' => 'done.form.contract.supplier.index',
            ],            

        ],

    ],
    [
        'name' => ' عرض سعر',
        'icon' => '/img/assets/q_icon_1.svg',
        'custom_class' => '',
        'buttons' => [
            [
                'id' => 'qubah_offer_price',
                'custom_class' => '',
                'name' => 'عرض سعر',
                'link' => 'done.form.offer.price',
            ],
            [
                'id' => 'qubah_offer_price_idea',
                'custom_class' => '',
                'name' => 'عرض سعر مع فكرة',
                'link' => 'done.form.offer.with_idea',
            ],
        ],

    ],
    [
        'name' => ' فاتورة',
        'icon' => '/img/assets/q_icon_5.svg',
        'custom_class' => '',
        'buttons' => [
            [
                'id' => 'qubah_three_in_one',
                'custom_class' => '',
                'name' => 'فاتورة',
                'link' => 'done.form.three.in.one',
            ],
        ],
    ],
    /*[
        'name' => ' محضر اجتماع',
        'icon' => '/img/assets/q_icon_4.png',
        'custom_class' => 'mt-30',
        'buttons' => [
            [
                'id' => 'qubah_meeting_report',
                'custom_class' => '',
                'name' => 'محضر اجتماع',
                'link' => 'done.form.meeting_report',
            ],
        ],

    ]*/
];
