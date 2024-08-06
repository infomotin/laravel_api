<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ApiRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{   
    use ApiResponses;
    public function login(LoginUserRequest $request){
        //validad request 
        $request->validated($request->all());
        if(!Auth::attempt($request->only('email','password'))){
            return $this->error('Unauthrize User',401);
        }
        $user = User::firstWhere('email',$request->email);

        return $this->ok('Authorize User',[
            'token'=>$user->createToken(
                    'Api User Token'.$user->email,
                    ['*'],
                    now()->addDays(30)
                    
                    )->plainTextToken
        ],200);

         


        // return $this->ok($request->get('email'),'Welcome to Laravel API',200);
        // return response()->json([
        //     'success' => true,
        //     'message'=>'Welcome to Laravel API',
        // ],200);
    }
    public function register(){
        return $this->ok('Calling Register Api');
    }

    public function logout(Request $request){
        // dd($request);
        $request->user()->currentAccessToken()->delete();
        return $this->ok('LogOut Success');
    }
}
