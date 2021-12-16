<?php

return [
    'regidential_ev_charger_types'=>[
        [
            "title"=>"Already Have My Own EV Charger",
            'alias'=>"already_have",
            "price"=>000.000
        ],
        [
            "title"=>"Blink Home Level 2",
            'alias'=>"blink_home_level_2",
            "price"=>490.999
        ],
        [
            "title"=>"Charger Point Home Flex",
            'alias'=>"charger_home_flex",
            "price"=>490.999
        ],
        [
            "title"=>"Enel X Juice Box",
            'alias'=>"enel_x_box",
            "price"=>490.999
        ]
    ],
    'commercial_ev_charger_types'=>[
        [
            "title"=>"Already Have My Own EV Charger",
            'alias'=>"already_have",
            "price"=>000.000
        ],
        [
            "title"=>"Level 2 Charger",
            'alias'=>"level_2_charger",
            "price"=>490.999
        ],
        [
            "title"=>"Level 3 Charger",
            'alias'=>"level_3_charger",
            "price"=>490.999
        ]
    ],
    'assesment_questions'=>[
        [
            "title"=>"How far is your breaker panel from the desired EV charger location?",
            "type"=>"radio",
            "name"=>"charger_distance",
            "options"=>[
                "5ft"=>"5ft",
                "10ft"=>"10ft",
                "15ft"=>"15ft",
                "20ft"=>"20ft",
                "25ft"=>"25ft"
            ]
        ],
        [
            "title"=>"Is the breaker panel on the same wall as the desired EV charger location?",
            "type"=>"radio",
            "name"=>"is_breaker_panel_on_same_wall",
            "options"=>[
                "Yes"=>"Yes",
                "No"=>"No"
            ]
        ],
        [
            "title"=>"Is the breaker panel on the same level as the desired EV charger location?",
            "type"=>"radio",
            "name"=>"is_breaker_panel_on_same_level",
            "options"=>[
                "Yes"=>"Yes",
                "No"=>"No"
            ]
        ],
        [
            "title"=>"Is the desired EV charger location interior or exterior?",
            "type"=>"radio",
            "name"=>"location_interior_or_exterior",
            "options"=>[
                "Interior"=>"Interior",
                "Exterior"=>"Exterior"
            ]
        ],
        [
            "title"=>"Choose the electrical appliances you have in your home?",
            "type"=>"checkbox",
            "name"=>"electrical_appliances",
            "options"=>[
                "Washer"=>"Washer",
                "Dryer"=>"Dryer",
                "Microwave"=>"Microwave",
                "Range"=>"Range",
                "Water Heater"=>"Water Heater",
                "AC Unit"=>"AC Unit",
                "Dishwasher"=>"Dishwasher",
                "HeatPump"=>"HeatPump"
            ]
        ],
        [
            "title"=>"Are there any additional electrical items on your to-do-list?",
            "type"=>"input",
            "name"=>"additional_electrical"
        ],
        [
            "title"=>"Within which range would you like to have an install?",
            "type"=>"radio",
            "name"=>"expected_intsallation",
            "options"=>[
                "1-2 Weeks"=>"1-2 Weeks",
                "1 Month"=>"1 Month",
                "2 Months"=>"2 Months"
            ]
        ]
    ],
    'commercial_industry_area'=>[
        [
            "title"=>"Which industry or area applies to you?",
            "type"=>"radio",
            "name"=>"industry",
            "options"=>[
                "automotive"=>"automotive.jpg",
                "municiple"=>"municiple.jpg",
                "office"=>"office.jpg",
                "parking"=>"parking.jpg",
                "regidential"=>"regidential.jpg",
                "retail"=>"retail.jpg"
            ]
        ]
    ]


];
