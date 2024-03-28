<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Http\Resources\BlogResourceCollection;
use App\Http\Resources\BlogResource;
use App\Filters\BlogFilter;

class BlogController extends Controller
{
    public function index(BlogFilter $filter)
    {
        $data = Blog::filter($filter)->get();
        return response()->json(new BlogResourceCollection($data));
    }

    public function detail($id)
    {
        $this->viewsPlusOne($id);
        $data = Blog::findOrFail($id);
        return response()->json(new BlogResource($data));
    }

    public function viewsPlusOne($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->increment('views', 1);
    }

    public function likesPlusOne($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->increment('likes', 1);
        return response()->json('You liked it');
    }
}
