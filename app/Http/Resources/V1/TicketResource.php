<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => 'ticket',
            'attributes' => [
                'title' => $this->title,
                'description' => $this->when(
                    $request->routeIS('tickets.show'),
                    $this->description
                ),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'author' => [
                    'data' => [
                        'id' => $this->user_id,
                        'type' => 'user',
                    ],
                    'links'=>[
                        'self' => route('users.show', ['user' =>$this->user_id])
                    ],
                ],
                'includes' => new UserResource($this->whenLoaded('user')),

                'links' => [
                    'self' => route('tickets.show', ['ticket' => $this->id]) ,
                ],
            ],

        ];
    }
}
