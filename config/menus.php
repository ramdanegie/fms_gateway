<?php
return [
    "D001" => [
        "key" => "D001",
        "title" => "Dashboard",
        "route" => "dashboard",
        "icon"  => "fas fa-chart-pie"
    ],
    "M001" => [
        "key"    => "M001",
        "title"  => "Data Master",
        "route"  => "",
        "icon"   => "far fa-hdd",
        "childs" => [
            "M002" => [
                "key"   => "M002",
                "title" => "Cargo",
                "route" => "master.cargo",
                "icon"  => "",
            ],
            "M003" => [
                "key"   => "M003",
                "title" => "Location",
                "route" => "master.location",
                "icon"  => "",
            ],
            "M004" => [
                "key"   => "M004",
                "title" => "Shipper",
                "route" => "master.shipper",
                "icon"  => "",
            ],
            "M005" => [
                "key"   => "M005",
                "title" => "Consignee",
                "route" => "master.consignee",
                "icon"  => "",
            ],
            "M006" => [
                "key"   => "M006",
                "title" => "Notify Party",
                "route" => "master.notifi-party",
                "icon"  => "",
            ],
        ]
    ],
    "SC01" => [
        "key"    => "SC01",
        "title"  => "Schedule",
        "route"  => "lcl-schedule.direct",
        "icon"   => "far fa-calendar-alt",
        /* "childs" => [
            "SC02" => [
                "key"   => "SC02",
                "title" => "Direct Schedule",
                "route" => "lcl-schedule.direct",
                "icon"  => "",
            ],
            "SC03" => [
                "key"   => "SC03",
                "title" => "Non DIrect Schedule",
                "route" => "lcl-schedule.non-direct",
                "icon"  => "",
            ],
        ], */
    ],
    "RQ01" => [
        "key"    => "RQ01",
        "title"  => "Request Quotation",
        "route"  => "",
        "icon"   => "far fa-list-alt",
        "childs" => [
            "RQ02" => [
                "key"     => "RQ02",
                "title"   => "FCL - Full Container Load",
                "route"   => "req-quote",
                "payload" => ["fcl"],
                "icon"    => "",
            ],
            "RQ03" => [
                "key"     => "RQ03",
                "title"   => "LCL - Less Container Load",
                "route"   => "req-quote",
                "payload" => ["lcl"],
                "icon"    => "",
            ],
            "RQ04" => [
                "key"     => "RQ04",
                "title"   => "Non Container Shipment",
                "route"   => "req-quote",
                "payload" => ["breakbulk"],
                "icon"    => "",
            ],
            "RQ05" => [
                "key"   => "RQ05",
                "title" => "Air Freight Shipment",
                "route"   => "req-quote",
                "payload" => ["air-freight"],
                "icon"  => "",
            ],
            "RQ06" => [
                "key"     => "RQ06",
                "title"   => "Charter Full Truck",
                "route"   => "req-quote",
                "payload" => ["ftl"],
                "icon"    => "",
            ],
            "RQ07" => [
                "key"     => "RQ07",
                "title"   => "Less Truck Load",
                "route"   => "req-quote",
                "payload" => ["ltl"],
                "icon"    => "",
            ],
            "RQ08" => [
                "key"     => "RQ08",
                "title"   => "Custom Only",
                "route"   => "req-quote",
                "payload" => ["ccl"],
                "icon"    => "",
            ],
        ]
    ],
    "EQ01" => [
        "key"    => "EQ01",
        "title"  => "Manage Quotation",
        "route"  => "",
        "icon"   => "fas fa-clipboard",
        "childs" => [
            "EQ02" => [
                "key"   => "EQ02",
                "title" => "List Quotation",
                "route" => "edit-quote",
                "icon"  => "",
            ],
        ],
    ],
    "MS01" => [
        "key"    => "MS01",
        "title"  => "Manage Shipment",
        "route"  => "",
        "icon"   => "fas fa-clipboard-list",
        "childs" => [
            "MS02" => [
                "key"     => "MS02",
                "title"   => "List Shipment",
                "route"   => "manage-shipment",
                "icon"    => "",
            ],
        ],
    ],
    "TX01" => [
        "key" => "TX01",
        "title" => "Tracking Shipment",
        "route" => "tracking-shipment",
        "icon"  => "fas fa-search-location"
    ],
    "DD01" => [
        "key"    => "DD01",
        "title"  => "Draft Document",
        "route"  => "",
        "icon"   => "fas fa-align-justify",
        "childs" => [
            "DD02" => [
                "key"     => "DD02",
                "title"   => "Bill of Lading",
                "route"   => "draft-doc",
                "payload" => ["BL"],
                "icon"    => "",
            ],
            "DD03" => [
                "key"     => "DD03",
                "title"   => "Airway Bill",
                "route"   => "draft-doc",
                "payload" => ["AB"],
                "icon"    => "",
            ],
            "DD04" => [
                "key"     => "DD04",
                "title"   => "PEB (Export Declaration)",
                "route"   => "draft-doc",
                "payload" => ["PEB"],
                "icon"    => "",
            ],
            "DD05" => [
                "key"     => "DD05",
                "title"   => "PIB (Import Declaration)",
                "route"   => "draft-doc",
                "payload" => ["PIB"],
                "icon"    => "",
            ],
        ],
    ],
    "IV01" => [
        "key" => "IV01",
        "title" => "Commercial Invoice",
        "route" => "invoice.list",
        "icon"  => "fas fa-file-alt"
    ],
    "OT01" => [
        "key" => "OT01",
        "title" => "Open Ticket",
        "route" => "ticket.list",
        "icon"  => "fas fa-ticket-alt"
    ],
    "TU01" => [
        "key" => "TU01",
        "title" => "Tutorial",
        "route" => "tutorial.index",
        "icon"  => "fas fa-book-open"
    ],

];