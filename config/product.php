<?php

return [
    'regidential_ev_charger_types' => [
        [
            "title" => "Already Have My Own EV Charger",
            'alias' => "already_have",
            "price" => 000.000
        ],
        [
            "title" => "Blink Home Level 2",
            'alias' => "blink_home_level_2",
            "price" => 490.999
        ],
        [
            "title" => "Charger Point Home Flex",
            'alias' => "charger_home_flex",
            "price" => 490.999
        ],
        [
            "title" => "Enel X Juice Box",
            'alias' => "enel_x_box",
            "price" => 490.999
        ]
    ],
    'commercial_ev_charger_types' => [
        [
            "title" => "Already Have My Own EV Charger",
            'alias' => "already_have",
            "price" => 000.000
        ],
        [
            "title" => "Level 2 Charger",
            'alias' => "level_2_charger",
            "price" => 490.999
        ],
        [
            "title" => "Level 3 Charger",
            'alias' => "level_3_charger",
            "price" => 490.999
        ]
    ],
    'assesment_questions' => [
        [
            "title" => "How far is your breaker panel from the desired EV charger location?",
            "type" => "radio",
            "name" => "charger_distance",
            "options" => [
                "5ft" => "5ft",
                "10ft" => "10ft",
                "15ft" => "15ft",
                "20ft" => "20ft",
                "25ft" => "25ft"
            ]
        ],
        [
            "title" => "Is the breaker panel on the same wall as the desired EV charger location?",
            "type" => "radio",
            "name" => "is_breaker_panel_on_same_wall",
            "options" => [
                "Yes" => "Yes",
                "No" => "No"
            ]
        ],
        [
            "title" => "Is the breaker panel on the same level as the desired EV charger location?",
            "type" => "radio",
            "name" => "is_breaker_panel_on_same_level",
            "options" => [
                "Yes" => "Yes",
                "No" => "No"
            ]
        ],
        [
            "title" => "Is the desired EV charger location interior or exterior?",
            "type" => "radio",
            "name" => "location_interior_or_exterior",
            "options" => [
                "Interior" => "Interior",
                "Exterior" => "Exterior"
            ]
        ],
        [
            "title" => "Choose the electrical appliances you have in your home?",
            "type" => "checkbox",
            "name" => "electrical_appliances",
            "options" => [
                "Washer" => "Washer",
                "Dryer" => "Dryer",
                "Microwave" => "Microwave",
                "Range" => "Range",
                "Water Heater" => "Water Heater",
                "AC Unit" => "AC Unit",
                "Dishwasher" => "Dishwasher",
                "HeatPump" => "HeatPump"
            ]
        ],
        [
            "title" => "Are there any additional electrical items on your to-do-list?",
            "type" => "input",
            "name" => "additional_electrical"
        ],
        [
            "title" => "Within which range would you like to have an install?",
            "type" => "radio",
            "name" => "expected_intsallation",
            "options" => [
                "1-2 Weeks" => "1-2 Weeks",
                "1 Month" => "1 Month",
                "2 Months" => "2 Months"
            ]
        ]
    ],
    'commercial_industry_area' => [
        [
            "title" => "Which industry or area applies to you?",
            "type" => "radio",
            "name" => "industry",
            "options" => [
                "automotive" => "automotive.jpg",
                "municiple" => "municiple.jpg",
                "office" => "office.jpg",
                "parking" => "parking.jpg",
                "regidential" => "regidential.jpg",
                "retail" => "retail.jpg"
            ]
        ]
    ],
    "makemodel" => [
        "Audi" => [
            "Audi e-tron 2018",
            "Audi e-tron GT 2021",
            "Audi Q4 e-tron 2021",
            "Audi Q2L e-Tron 2019",
            "Audi Q5 e-tron 2021"
        ],
        "BMW" => [
            "BMW i3 2013",
            "BMW i4 2021",
            " BMW iX 2021",
            "BMW iX3 2020"
        ],
        "General Motors" => [
            "General Motors"
        ],
        "Cadillac" => [
            "Cadillac Lyriq 2022"
        ],
        "Chevrolet" => [
            "Chevrolet Bolt EUV 2021",
            "Chevrolet Bolt EV 2016",
            "Chevrolet Bolt EV 2016",
            "Chevrolet Bolt EV 2016",
            "Equinox",
            "Blazer"
        ],
        "GMC" => [
            "GMC Hummer EV 2022"
        ],
        "Buick" => [
            "Buick Velite 6 2019",
            "Buick Velite 7 2020",
            "Buick Velite 7 2020"
        ],
        "Alpha Motor Corporation" => [
            "WOLF+",
            "JAX™ CUV",
            "ACE™",
            " SAGA™ ",
        ],

        "Fisker" => [
            "Fisker Ocean"
        ],

        "Rimac" => [
            "Rimac Nevera "
        ],

        "Stellantis" => [
            "Toyota Proace City Electric 2021",
            "Toyota Proace Electric 2021"
        ],

        "Peugeot" => [
            "Peugeot e-208 2019",
            "Peugeot e-2008 2020",
            "Peugeot e-Boxer 2021",
            "Peugeot e-Rifter 2021",
            "Peugeot e-Traveller 2021"
        ],

        "Citroen" => [
            "Citroën ë-Berlingo 2021",
            "Citroën ë-C4 2021",
            "Citroën ë-Jumper/Relay 2021",
            "Citroën ë-Jumpy/Dispatch/SpaceTourer 2021",
            "Citroën Ami/Opel Rocks-e 2020",
        ],

        "DS Automobiles" => [
            "DS 3 Crossback 2019",
        ],


        "Opel and Vauxhall" => [
            "Opel/Vauxhall Combo-e 2021",
            "Opel/Vauxhall Corsa-e 2019",
            "Opel/Vauxhall Mokka-e 2020",
            "Opel/Vauxhall Movano-e 2021",
            "Opel/Vauxhall Vivaro/Zafira-e 2021"
        ],

        "Fiat" => [
            "Fiat e-Ducato 2021",
            "Fiat e-Scudo/e-Ulysse 2022",
            "Fiat New 500 2020"
        ],
        "Dodge" => [
            "eMuscle 2024"
        ],
        "Chrysler" => [
            "Chrysler"
        ],

        "Jeep" => [
            "Jeep® Wrangler 4xe 2021"
        ],

        "Jeep® Wrangler 4xe 2021" => [
            "Cupra Born 2021"
        ],

        "Dacia/Renault" => [
            "Dacia Spring Electric 2021",
            "Renault Twizy Z.E. 2012"
        ],
        "Ford" => [
            "Ford F-150 Lightning 2022",
            "Ford Mustang Mach-E 2020",
            "Ford Territory EV 2019"
        ],

        "Genesis Motor" => [
            "Genesis Electrified G80 2021",
            "Genesis Electrified GV70 2022",
            "Genesis GV60 2021"
        ],

        "Honda" => [
            " Honda e 2020",
            "Honda e:NS1 2022",
            "Honda e:NP1 2022"
        ],
        "Hyundai" => [
            "Hyundai Ioniq 5 2021",
            " Hyundai Ioniq Electric 2016",
            "Hyundai Kona Electric 2019",
            "Hyundai Porter2 Electric 2019",
            "Hyundai Lafesta EV 2019",
            "Hyundai Mistra EV 2021"
        ],

        "Jaguar Land Rover" => [
            "Jaguar Land Rover"
        ],

        "Kia" => [
            "Kia Bongo EV 2020",
            "Kia EV6 2021",
            "Kia Niro EV/e-Niro 2018",
            "Kia Ray EV 2012",
            "Kia Soul EV 2014"
        ],

        "Toyota" => [
            "Lexus UX 300e 2020",
            "Toyota bZ4X 2022",
            "Toyota C+pod 2021",
            "Toyota COMS 2000"
        ],

        "Lotus Cars" => [
            "Lotus Evija 2020"
        ],

        "Lucid Motors" => [
            "Lucid Air 2021"
        ],
        "Mazda" => [
            "Mazda MX-30 2020",
            "Mazda CX-30 EV 2021"
        ],

        "Daimler AG" => [
            "Mercedes-Benz EQA 2021",
            "Mercedes-Benz EQB 2021",
            "Mercedes-Benz EQC 2021",
            "Mercedes-Benz EQE 2022",
            "Mercedes-Benz EQS 2021",
            "Mercedes-Benz EQV 2020",
            "smart EQ forfour 2017",
            "smart EQ fortwo 2017"
        ],
        "Mini/BMW" => [
            "Mini Electric/Cooper SE 2020"
        ],

        "Mitsubishi Motors" => [
            "Mitsubishi Minicab MiEV 2011"
        ],

        "Nissan" => [
            "Nissan Ariya 2021",
            "Nissan e-NV200 2014",
            "Nissan Leaf 2010",
            "Nissan Sylphy Z.E. 2018"
        ],
        "Automobili Pininfarina" => [
            "Pininfarina Battista 2020"
        ],

        "Volvo Cars" => [
            "Polestar 2 2020",
            "Volvo C40 Recharge 2021",
            "Volvo XC40 Recharge 2020",
        ],

        "Porsche" => [
            "Porsche Taycan 2019"
        ],
        "Renault" => [
            "Renault Kangoo Z.E./Kangoo E-Tech Electric 2011",
            "Renault Master Z.E./Master E-Tech Electric 2018",
            "Renault Mégane E-Tech Electric 2022",
            "Renault Zoe 2012",
            "Renault City K-ZE 2019"
        ],

        "Rivian" => [
            "Rivian R1S 2022",
            "Rivian R1T 2022"
        ],

        "Škoda Auto" => [
            "Škoda Enyaq iV 2020"
        ],

        "Subaru (produced by Toyota)" => [
            "Subaru Solterra 2022"
        ],

        "Tata Motors Cars" => [
            "Tata Nexon EV 2020",
            "Tata Tigor EV/X Pres-T EV 2019"
        ],

        "Tesla, Inc." => [
            "Tesla Model 3 2017",
            "Tesla Cybertruck 2022",
            "Tesla Model S 2012",
            "Tesla Model X 2015",
            "Tesla Model Y 2020"

        ],

        "Volkswagen" => [
            "Volkswagen e-Crafter 2018",
            "Volkswagen e-Up! 2013",
            "Volkswagen ID.3 2020",
            "Volkswagen ID.4 2020",
            "Volkswagen ID.5 2022",
            "Volkswagen e-Lavida 2019",
            "Volkswagen ID.6 2021"
        ],

        "Aiways" => [
            "Aiways U5 2019",
            "Aiways U6 2021"
        ],

        "BAIC Group" => [
            "Arcfox Lite 2017",
            "Arcfox α-S 2021",
            "Arcfox α-T 2020",
            "BJEV EC3 2016",
            "BJEV EC5/Senova X25 2019",
            "BJEV EU5/Beijing EU5 2018",
            "BJEV EU7/Beijing EU7 2019"
        ],

        "SAIC-GM-Wuling" => [
            "Baojun E100 2017",
            "Baojun E200/Wuling Nano EV 2018",
            "Baojun E300/KiWi EV 2020",
            "Wuling Hongguang Mini EV 2020"
        ],

        "FAW Group" => [
            "Bestune E01 2021",
            "Bestune NAT 2021",
            "Hongqi E-HS3 2018",
            "Hongqi E-HS9 2020",
            "Hongqi E-QM5 2022",
            "Toyota IZOA EV 2020"
        ],

        "BYD Auto" => [
            "BYD Dolphin 2021",
            "BYD e1 2019",
            "BYD e2 2019",
            "BYD e3 2019",
            "BYD e5 2016",
            "BYD e6 2011",
            "BYD Han 2020",
            "BYD Qin 2012",
            "BYD Song 2015",
            "BYD Song Max 2017",
            "BYD T3 2015",
            "BYD Tang 2015",
            "BYD Yuan 2019"
        ],

        "Changan Automobile" => [
            "Changan BenBen EV/BenBen E-Star 2015",
            "Changan CS15EV/CS15 E-Pro 2017",
            "Changan CS55 EV 2020",
            "Changan Ruixing EM80",
            "Oushang A600 EV 2019"
        ],

        "Chery Automobile" => [
            "Chery Arrizo 5e 2017",
            "Chery eQ 2014",
            "Chery eQ1 2016",
            "Chery eQ2 2018",
            "Chery eQ5 2020",
            "Chery QQ Ice Cream 2021",
            "Chery Tiggo e 2019",
            "Jetour X70S EV 2019"
        ],

        "Dongfeng Honda" => [
            "Ciimo M-NV 2021",
            "Ciimo X-NV 2020"
        ],
        "Denza" => [
            "Denza EV/400/500 2014",
            "Denza X 2019"
        ],

        "Dongfeng Motor" => [
            "Dongfeng Aeolus EX1 2019",
            "Dongfeng Aeolus Yixuan 2019",
            "Dongfeng EM13 2018",
            "Dongfeng Fengshen A60 EV/Aeolus E70 2015",
            "Dongfeng Ruitaite EM10 "
        ],

        "DFSK Motor" => [
            "Dongfeng Fengon E1 2019",
            "Dongfeng Fengon E3/Seres E3 2019",
            "Dongfeng Sokon EC31/EC35/EC36 2018"
        ],

        "Dongfeng Liuzhou Motor" => [
            "Dongfeng Fengxing T1 2019"
        ],

        "Enovate" => [
            "Enovate ME5 2021",
            "Enovate ME7 2019"
        ],

        "Guangqi Honda" => [
            "Everus VE-1 2019"
        ],

        "Farizon Auto" => [
            "Farizon E5/E5L "
        ],

        "GAC Group" => [
            "GAC Aion LX 2019",
            "GAC Aion S 2019",
            "GAC Aion V 2020",
            "Trumpchi GE3 2017",
            "Trumpchi GS4 EV 2016",
            "Toyota C-HR EV 2020",
        ],

        "Geely Auto" => [
            "Geely Emgrand EV",
            "Geely Emgrand GSe 2018",
            "Geometry A 2019",
            "Geometry C 2019",
            "Maple 30X/Geometry EX3 2020",
            "Maple 80V 2020",
            "Zeekr 001 2021"
        ],

        "Great Wall Motors" => [
            "Great Wall Wingle 7 EV 2018",
            "ORA iQ 2018",
            "ORA Black Cat/Heimao 2019",
            "ORA Cherry Cat/Yingtaomao 2022",
            "ORA Good Cat/Haomao 2020",
            "ORA White Cat 2020"
        ],

        "Higer" => [
            "Higer H4E 2016"
        ],

        "HiPhi" => [
            "HiPhi X 2020"
        ],

        "IM Motors" => [
            "IM L7 2022"
        ],

        "JAC Motors" => [
            "JAC iC5/E J7/Sehol E50A 2019",
            "JAC iEV6E/Sehol E10X 2021",
            "JAC iEV7S/Sehol E20X 2017",
            "JAC iEVA50 2018",
            "JAC iEVS4 2019",
            "JAC J3 EV 2020",
            "Sehol E20X 2018",
            "Sehol X4 2020"
        ],

        "Kandi" => [
            "Kandi K23",
            "Kandi K27 "
        ],

        "Leapmotor" => [
            "Leapmotor C11 2020",
            "Leapmotor S01 2019",
            "Leapmotor T03 2020",
        ],

        "SAIC Motor" => [
            "Maxus EG10 2016",
            "Maxus Euniq 5 2019",
            "Maxus Euniq 6 EV 2021",
            "Maxus T90 EV 2021",
            "MG ZS EV 2018",
            "Roewe Clever 2020",
            "Roewe Ei5/MG 5 EV/MG EP 2017",
            "Roewe Ei6 2016",
            "Roewe Ei6 Max 2020",
            "Roewe ER6 2020",
            "Roewe ERX5 2019",
            "Roewe Marvel R 2018",
            "Roewe/MG Marvel X 2020"
        ],

        "Beijing Automobile Works" => [
            "Modern IN 2021"
        ],

        "Nanjing Automobile-SAIC Motor" => [
            "NAC Chang Da H9 2017"
        ],

        "Hozon Auto" => [
            "Neta N01 2018",
            "Neta U 2020",
            "Neta V 2020"
        ],
        "NIO" => [
            "NIO EC6 2020",
            " NIO EP9 2016",
            " NIO ES6 2019",
            "NIO ES8 2018",
            "NIO ET7 2021"
        ],

        "Qiantu Motor" => [
            "Qiantu K50 2017"
        ],

        "Singulato" => [
            "Singulato iS6 2019"
        ],
        "Shineray Group" => [
            "SRM Shineray X30LEV 2018"
        ],
        "Weltmeister" => [
            "Weltmeister E5 2021",
            "Weltmeister EX5 2018",
            "Weltmeister EX6 2020",
            "Weltmeister W6 2021"
        ],

        "XPeng" => [
            "XPeng G3/Identity X 2018",
            "XPeng G9 2022",
            "XPeng P5 2021",
            "XPeng P7 2020",
        ]
    ],
    "usstates" => [
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District Of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming',
    ],
    "residential_questions" => [
        "ev_chargers_type" => [
            "title" => "Here are the EV chargers we provide based on your vehicle.",
            "type" => "radio",
            "values" => [
                "Charger Point Homeflex",
                "Enelx Juicebox 48",
                "Walbox Pulsar Plus 48",
                "I have my own charger"
            ]
        ],
        "considering_an_additional_EV" => [
            "title" => "Are you considering an additional EV within the next year?",
            "type" => "radio",
            "values" => [
                "Yes",
                "No"
            ],
        ],
        "contact_info_first_name" => [
            "title" => "First Name"
        ],
        "contact_info_last_name" => [
            "title" => "Last Name"
        ],
        "contact_info_email" => [
            "title" => "Email"
        ],
        "contact_info_phone" => [
            "title" => "Phone"
        ],
        "Style_of_home" => [
            "title" => "What style of home?",
            "type" => "radio",
            "values" => [
                "Detached",
                "Townhome",
                "Multi-Unit",
                "Other"
            ],
        ],
        "Ownership_Type" => [
            "title" => "Ownership Type",
            "type" => "radio",
            "values" => [
                "Own",
                "Rent",
                "Others"
            ],
        ],

        "need_permission_from_anyone" => [
            "title" => "Will you need permission from anyone to install this EV charger?",
            "type" => "radio",
            "values" => [
                "Yes",
                "No"
            ],
        ],
        "EV_charger_be_installed" => [
            "title" => "Where will the EV charger be installed?",
            "type" => "radio",
            "values" => [
                "Interior",
                "Exterior"

            ],
        ],
        "breaker_panel_to_the_EV_charger" => [
            "title" => "Approximately how far is it from the breaker panel to the EV charger?",
            "type" => "radio",
            "values" => [
                "5FT",
                "10FT",
                "15FT",
                "20FT",
                "20FT+",
            ],
        ],
        "same_wall_as_the_breaker_panel" => [
            "title" => "Will the EV charger be located on the same wall as the breaker panel?",
            "type" => "radio",
            "values" => [
                "Yes",
                "No"

            ],
        ],
        "electrical_items_at_your_home" => [
            "title" => "Please choose the electrical items at your home.",
            "type" => "checkbox",
            "values" => [
                "Washer",
                "Dryer",
                "Rerigerator",
                "Stove",
                "MicroWave",
                "Freezer",
                "Heat Pump",
                "AC Unit",
                "Water Heater",
                "Tankless Water Heater",
                "Solar Panels",
                "Battery Storage",
                "Generator"

            ],
        ],
        "looking_to_install_your_EV_charger" => [
            "title" => "When are you looking to install your EV charger?",
            "type" => "radio",
            "values" => [
                "1-3 Weeks",
                "1 Month",
                "1 Month+"

            ],
        ],
        "interested_in_financing" => [
            "title" => "Are you interested in financing?",
            "type" => "radio",
            "values" => [
                "Yes",
                "No"
            ],
        ],
        "taxstate" => [
            "title" => "Tax State"
        ],
        "address" => [
            "title" => "Address"
        ]

    ],
    "commercial_questions" => [
        "interested_in_financing" => [
            "title" => "Are you interested in financing?",
            "type" => "radio",
            "values" => [
                "Yes",
                "No"
            ],
        ],

        "some_basic_info" => [
            "title" => "What type of EV do you have?",
            "type" => "radio",
            "values" => [
                "Level 1",
                "Level 2",
                "I have my own charger"
            ],
        ],
        "vehicles_be_charging_at_once" => [
            "title" => "Could multiple vehicles be charging at once?",
            "type" => "radio",
            "values" => [
                "Yes",
                "No"
            ],
        ],
        "providing_EV_charging_as_a_paid_service" => [
            "title" => "Are you thinking of providing EV charging as a paid service?",
            "type" => "radio",
            "values" => [
                "Yes",
                "No"
            ],
        ],
        "property_type" => [
            "title" => "Property type",
            "type" => "radio",
            "values" => [
                "Land",
                "Commercial",
                "Multi-Unit"
            ],
        ],
        "Ownership_Type" => [
            "title" => "Ownership Type",
            "type" => "radio",
            "values" => [
                "Rent",
                "Owner",
                "Others"
            ],
        ],
        "anyone_to_install_this_EV_charger" => [
            "title" => "Will you need permission from anyone to install this EV charger?",
            "type" => "radio",
            "values" => [
                "Yes",
                "No"
            ],
        ],
        "anyone_to_install_this_EV_charger" => [
            "title" => "Will you need permission from anyone to install this EV charger?",
            "type" => "radio",
            "values" => [
                "Yes",
                "No"
            ],
        ],
        "type_of_industry" => [
            "title" => "What is your type of industry?",
            "type" => "checkbox",
            "values" => [
                "Automotive",
                "Hotel",
                "Municiple",
                "Office",
                "Parking",
                "Residential",
                "Retail"
            ],
        ],
        "looking_to_install_your_EV_charger" => [
            "title" => "When are you looking to install your EV charger?",
            "type" => "radio",
            "values" => [
                "1-3 Weeks",
                "1 Month",
                "1 Month+"

            ],
        ],
        "taxstate" => [
            "title" => "Tax State"
        ],
        "contact_info_first_name" => [
            "title" => "First Name"
        ],
        "contact_info_last_name" => [
            "title" => "Last Name"
        ],
        "contact_info_email" => [
            "title" => "Email"
        ],
        "contact_info_phone" => [
            "title" => "Phone"
        ],
        "address" => [
            "title" => "Address"
        ]
    ]



];
