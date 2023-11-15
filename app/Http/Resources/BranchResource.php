<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
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
            'image' => $this->image,
            'image_public_path' => asset('storage/' . $this->image),
            'name' => $this->name,
            'address' => $this->address,
            'map' => $this->map,
            'active' => $this->active,
            'groups' => new GroupCollection($this->whenLoaded('groups')),
//
        ];
    }
}
