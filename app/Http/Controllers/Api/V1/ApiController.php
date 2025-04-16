<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    # Controller to make Include parameter
    # for search filtration
 public function include(string $args) : Bool{

     $param = request()->get('include');

     if(!isset($param))
     {
        return false ;
     }
     $data = explode(',' , strtolower($param));

     return in_array($args,$data);
    }
}
