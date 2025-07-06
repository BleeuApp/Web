<?php

namespace App\Http\Controllers\Api\Professional;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professional;

class ApiController extends Controller
{
    public function login(Request $Request)
    {
        $res = new Professional;

        return response()->json($res->login($Request->all()));
    }
}
