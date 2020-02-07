<?php

return [
    'titles' => [
        'fairInfo' => [
            'general' => 'General Information',
            'purpose' => 'The purpose of the exhibition',
            'downloads' => 'Media files',
            'dateAndPlace' => 'Date and place of the exhibition',
            'forExhibitor' => 'Steps to become an Exhibitor'
        ],
    ],

    'fairInfo' => [
        'general' => "<p>This event will be organized in accordance with the Decree of the President of the Republic of Uzbekistan on May 18, 2019 #DP-5721 “On measures to accelerate the development of the jewelry industry in the Republic of Uzbekistan”, as well as within the framework of the Decree of the Cabinet of Ministers of the Republic of Uzbekistan “On measures to organize and conduct the first international exhibition-sale of modern equipment, technologies of the jewelry industry of Uzbekistan “Uzbek Jewelery Fair-2020” on January 10, 2020.This is the first, unique and only specialized jewelry exhibition will be held in Uzbekistan.</p>
        <p>This is the first and only specialized jewelry exhibition held in Uzbekistan.</p>
        <p>In the framework of the “Uzbek Jewellery Fair-2020” will be held Italian gold technology workshop.</p>",
        'purpose' => [
            'Establish new intra-industry and international mutually beneficial links;',
            'Get acquainted with technological innovations and achievements of foreign companies;',
            'To master the most popular areas in the design of jewelry products;',
            'Improve the quality and quantity of jewelry products.',
        ],
        'dateAndPlace' => "<p>Date of the Exhibition: 8-10 May, 2020.</p>
        <p>Venue: Exhibition Hall “Yoshlar Izhod Saroyi”, Tashkent, Uzbekistan.</p>
        <p>Landmark: “Mustaqillik maydoni” metro station</p>"
    ],

    'downloads' => [
        'brochure' => 'Brochure',
        'floorPlan' => 'Floor Plan',
        'invitation' => "Invitation letter"
    ],

    'partners' => [
        'association' => 'Supporting Association<br>',
        'gilzarexpo' => 'Organized By:<br>',
        'ministry' => "Ministry of Economy and Industry<br> of the Republic of Uzbekistan"
    ],

    'forExhibitor' => [
        'steps' => [
            [
                'name' => 'Registration (obligatory)',
                'link' => route('register')
            ], [
                'name' => 'Specify your main activity (obligatory)',
                'link' => route('cabinet.sections.update')
            ], [
                'name' => 'Book your booth or raw space (obligatory)',
                'link' => route('cabinet.stalls.create')
            ], [
                'name' => 'Choose additional equipment (by request)',
                'link' => route('cabinet.stalls.create')
            ], [
                'name' => 'Get your visa (by request)',
                'link' => route('cabinet.visas.create')
            ], [
                'name' => 'Get participant’s badge (obligatory)',
                'link' => route('cabinet.badges.create')
            ], [
                'name' => 'Get badge for the material-responsible person (obligatory)',
                'link' => ''
            ], [
                'name' => 'Send invoice, description for custom clearance (obligatory)',
                'link' => ''
            ], [
                'name' => 'Add information for the fair catalogue (obligatory)',
                'link' => ''
            ], [
                'name' => 'Order advertising at the fair catalogue (by request)',
                'link' => ''
            ], [
                'name' => 'Order advertising at the venue territory (by request)',
                'link' => ''
            ], [
                'name' => 'Choose your cultural programme (by request)',
                'link' => ''
            ],
        ]
    ],
];
