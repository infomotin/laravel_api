<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    public static $wrap = 'Ticket';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'type' => 'ticket',
            'id' => $this->id,
            'attributes' =>[
                'title'=>$this->title,
                // 'description' => $this->description,
                'description' =>$this->when(
                    $request->routeIs('tickets.show'),$this->description
                ),
                'status'=> $this->status
            ],
            'relationships'=>[
                'author'=>[
                    'data'=>[
                        'type'=>'User',
                        'id'=>$this->user_id
                    ],
                    'links'=>[
                        ['self' =>'Do Something leatter']
                    ]
                ]
            ],
            'include'=>[
                new UserResource($this->user)
            ],
            'link' =>[
                ['self' =>route('tickets.show',[$this->id])]
            ]
        ];
    }
}
