<?php 

return [
    "auth" => [
        "bearer"   => "",
        "domain"   => "gcl",
        "username" => "administrator@tms.co.id",
        "password" => "administrator",
    ],
    "base_api" => "https://cloudservice.vsms.co.id/tms_public_api",
    "end_points" => [
        "get_token" => "/auth/token/create",
        "detail_order" => "/order",
        "create_order" => "/order",
    ],
];