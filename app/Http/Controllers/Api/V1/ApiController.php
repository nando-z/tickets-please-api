<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
 public function include(string $relationship) : bool
{
    $param =  request()->get('include');

    if (!isset($param))
    {
        return false;
    }

    $includeValues = explode(',' , strtolower($param));

    return is_array(strtolower($relationship) , $includeValues );

    }
}
