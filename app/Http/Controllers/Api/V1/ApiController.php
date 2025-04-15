<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
 public function include(string $relationship)
 {
    $param =  request()->get('include');

    if (!isset($param))
    {
        return false;
    }
    // Splitting Values

    $includeValue = explode(',' , strtolower($param));

    return is_array(strtolower($relationship), $includeValue);
 }
}
