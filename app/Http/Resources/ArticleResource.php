<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        ['user_id', 'image', 'title', 'description', 'body', 'active'];
        return [
            'user_id' => $this->user_id,
            'image' => $this->image,
            'image_public_path' => asset('storage/' . $this->image),
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'active' => $this->active,
            'author' => new UserResource($this->whenLoaded('author')),

        ];
    }
}
