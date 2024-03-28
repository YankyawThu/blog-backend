<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BlogResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */

    public function __construct($resource)
    {
        // $resource = $resource->getCollection();
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return $this->collection;
    }
}