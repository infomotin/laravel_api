<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{   
    use ApiResponses;
    public function login(ApiRequest $request){
        return $this->ok($request->get('email'),'Welcome to Laravel API',200);
        // return response()->json([
        //     'success' => true,
        //     'message'=>'Welcome to Laravel API',
        // ],200);
    }
    public function register(){
        return $this->ok('Calling Register Api');
    }
}
