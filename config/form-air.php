<?php 

return [
    "list_trade_type" => [
        "EX"  => "EXPORT",
        "IM"  => "IMPORT",
        "DOM" => "DOMESTIC",
        "FO"  => "FREIGHT ONLY",
    ],
    "list_ex_incoterm" => [
        "",
        // "CIP",
        // "CIF",
        // "CPT",
        // "CFR",
        "FCA",
        "CPT/CFR",
        "CIP/CIF",
        "DDP",
    ],
    "list_im_incoterm" => [
        "",
        // "CIP",
        // "CIF",
        // "CPT",
        // "CFR",
        "EXW",
        "CPT/CFR",
        "CIP/CIF",
    ],
];