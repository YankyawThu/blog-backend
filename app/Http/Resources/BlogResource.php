<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'author' => $this->user->author_name,
            'image' => asset(Storage::url($this->image)),
            'title' => $this->title,
            'content' => $this->content,
            'likes' => kFormat($this->likes),
            'views' => kFormat($this->views),
            'duration' => $this->duration,
            'publishedDate' => date_format($this->created_at,'d M')
        ];
    }
}
