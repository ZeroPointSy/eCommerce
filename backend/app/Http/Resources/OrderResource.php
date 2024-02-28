<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'total_price' => $this->total_price,
            'date' => $this->date,
            'user' => UserResource::make($this->whenLoaded('user'))
        ];
    }
}
