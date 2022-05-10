<?php
return [
    "D001" => [
        "key" => "D001",
        "title" => "Dashboard",
        "route" => "internal.dashboard",
        "icon"  => "fas fa-chart-pie"
    ],
    "M001" => [
        "key"    => "M001",
        "title"  => "Data Master",
        "route"  => "",
        "icon"   => "far fa-hdd",
        "childs" => [
            "M004" => [
                "key"   => "M004",
                "title" => "Access Role",
                "route" => "internal.master.team",
                "icon"  => "",
            ],
            "M005" => [
                "key"   => "M005",
                "title" => "User",
                "route" => "internal.master.user",
                "icon"  => "",
            ],
            "M014" => [
                "key"   => "M014",
                "title" => "Banner",
                "route" => "internal.master.banner",
                "icon"  => "",
            ],
            "M006" => [
                "key"   => "M006",
                "title" => "Size Container",
                "route" => "internal.master.size",
                "icon"  => "",
            ],
            "M007" => [
                "key"   => "M007",
                "title" => "Type Container",
                "route" => "internal.master.type",
                "icon"  => "",
            ],
            "M008" => [
                "key"   => "M008",
                "title" => "List Depot Container",
                "route" => "internal.master.depot",
                "icon"  => "",
            ],
            "M009" => [
                "key"   => "M009",
                "title" => "List Truck",
                "route" => "internal.master.truck",
                "icon"  => "",
            ],
            "M015" => [
                "key"   => "M015",
                "title" => "List Port",
                "route" => "internal.master.port",
                "icon"  => "",
            ],
            "M012" => [
                "key"   => "M012",
                "title" => "Export Direct Schedule",
                "route" => "internal.master.export-direct",
                "icon"  => "",
            ],
            "M013" => [
                "key"   => "M013",
                "title" => "Export Non Direct Schedule",
                "route" => "internal.master.export-transit",
                "icon"  => "",
            ],
            "M010" => [
                "key"   => "M010",
                "title" => "Import Direct Schedule",
                "route" => "internal.master.import-direct",
                "icon"  => "",
            ],
            "M011" => [
                "key"   => "M011",
                "title" => "Import Non Direct Schedule",
                "route" => "internal.master.import-transit",
                "icon"  => "",
            ],
        ]
    ],
    "MS01" => [
        "key"    => "MS01",
        "title"  => "Manage Shipment",
        "route"  => "",
        "icon"   => "fas fa-clipboard-list",
        "childs" => [
            "MS02" => [
                "key"   => "MS02",
                "title" => "List Shipment",
                "route" => "internal.fcl_list",
                "icon"  => "",
            ],
            // "MS03" => [
            //     "key"   => "MS03",
            //     "title" => "LCL - Less Container Load",
            //     "route" => "internal.lcl_list",
            //     "icon"  => "",
            // ],
            // "MS04" => [
            //     "key"   => "MS04",
            //     "title" => "Non Container Shipment",
            //     "route" => "internal.breakbulk_list",
            //     "icon"  => "",
            // ],
            // "MS05" => [
            //     "key"   => "MS05",
            //     "title" => "Air Freight Shipment",
            //     "route" => "internal.air_freight_list",
            //     "icon"  => "",
            // ],
            // "MS06" => [
            //     "key"   => "MS06",
            //     "title" => "Charter Full Truck",
            //     "route" => "internal.full_truck_load_list",
            //     "icon"  => "",
            // ],
            // "MS07" => [
            //     "key"   => "MS07",
            //     "title" => "Less Truck Load",
            //     "route" => "internal.less_truck_load_list",
            //     "icon"  => "",
            // ],
            // "MS08" => [
            //     "key"   => "MS08",
            //     "title" => "Custom Only",
            //     "route" => "manage-shipment.custom-clearance",
            //     "icon"  => "",
            // ],
        ],
    ],
    "DD01" => [
        "key"    => "DD01",
        "title"  => "Draft Document",
        "route"  => "",
        "icon"   => "fas fa-align-justify",
        "childs" => [
            "DD02" => [
                "key"   => "DD02",
                "title" => "List Draft Document",
                "route" => "internal.draft-doc.list-shipment",
                "icon"  => "",
            ]
        ],
    ],
    "IV01" => [
        "key" => "IV01",
        "title" => "Commercial Invoice",
        "route" => "internal.invoicing.list",
        "icon"  => "far fa-file-alt"
    ],
    "TR01" => [
        "key" => "TR01",
        "title" => "Tracking",
        "route" => "internal.tracking.list",
        "icon"  => "fas fa-search-location"
    ],
    "OT01" => [
        "key" => "OT01",
        "title" => "Open Ticket",
        "route" => "internal.ticket.list",
        "icon"  => "fas fa-ticket-alt"
    ],
    "TU01" => [
        "key" => "TU01",
        "title" => "Tutorial",
        "route" => "tutorial.index",
        "icon"  => "fas fa-book-open"
    ],

];