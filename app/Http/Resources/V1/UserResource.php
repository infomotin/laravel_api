<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'type'=>'User',
            'id'=>$this->id,
            'attributes'=>[
                'name'=>$this->name,
                'email'=>$this->email,

                //another way 
                $this->mergeWhen($request->routeIs('users.*'),[
                    'emailVarificationAt' =>$this->email_verified_at,
                    'updated_at'=>$this->updated_at,
                    'created_at'=>$this->created_at,
                ]),

                // //first way 
                // 'emailVarificationAt'=>$this->when(
                //     $request->routeIs('users.*'),
                //     $this->email_verified_at
                // ),
                // 'updated_at'=>$this->when(
                //     $request->routeIs('users.*'),
                //     $this->email_verified_at
                // ),
                // 'created_at'=>$this->when(
                //     $request->routeIs('users.*'),
                //     $this->email_verified_at
                // )
            ]
        ];
    }
}
