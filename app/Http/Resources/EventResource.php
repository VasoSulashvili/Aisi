<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'name' => $this->name,
            'data' => $this->data,
            'description' => $this->description,
            'address' => $this->address,
            'active' => $this->active,
            'type' => new EventTypeResource($this->whenLoaded('type')),
            'album' => new AlbumResource($this->whenLoaded('album')),
        ];
    }
}
