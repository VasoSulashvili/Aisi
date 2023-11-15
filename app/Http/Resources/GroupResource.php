<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
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
            'branch_id' => $this->branch_id,
            'name' => $this->name,
            'image' => $this->image,
            'image_public_path' => asset('storage/' . $this->image),
            'descroption' => $this->description,
            'schedule' => $this->schedule,
            'active' => $this->active,
            'branch' => new BranchResource($this->whenLoaded('branch')),
        ];
    }
}
