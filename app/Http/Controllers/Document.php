<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Document extends Controller
{
    use \App\Traits\ApiResponses;

    public function __invoke()
    {
        return $this->ok(
            [
                "Api Router"=>[

                    "Documentation"=>"127.0.0.1:8000/doc",

                    "Authentication" =>[
                        "Login" =>"127.0.0.1:8000/api/login ",
                        "Register" =>"127.0.0.1:8000/api/register",
                        "Logout"=>"127.0.0.1:8000/api/logout",
                    ],
                    "User" =>[
                        "GET USERS" => "127.0.0.1:8000/api/v1/user/",
                        "GET tickets" => "127.0.0.1:8000/api/v1/tickets",
                        "GET ticket" => "127.0.0.1:8000/api/v1/tickets/{id}",
                    ]
                ]
                    ],
                    "That is Full API Endpoint Documentation and The End Point's"
        );
    }
}
