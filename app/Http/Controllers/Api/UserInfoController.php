<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserInfoController extends Controller
{
    public function __invoke()
    {

        return Auth::user() ;
    }
}
