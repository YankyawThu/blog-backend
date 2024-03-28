<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Filters\BlogFilter;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogFilter $filter)
    {
        $data = Blog::filter($filter)->where('user_id', auth()->user()->id)->get();
        return view('blogs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $data = $request->all();
        $data['image'] = Storage::putFileAs('blogs', $request->file('image'), Str::uuid().'.jpg', 'public');
        $data['user_id'] = auth()->user()->id;
        Blog::create($data);
        return back()->with('status', 'Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Blog::findorFail($id);
        return view('blogs.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogRequest $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update1(BlogRequest $request, $id)
    {
        $data = $request->all();
        $blog = Blog::findOrFail($id);
        if($request->image) {
            $data['image'] = Storage::putFileAs('blogs', $request->file('image'), Str::uuid().'.jpg', 'public');
            Storage::delete($blog->image);
        }
        else {
            $data['image'] = $request->old_image;
        }
        Blog::where('id', $id)->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'image' => $data['image'],
            'duration' => $data['duration']
        ]);
        return back()->with('status', 'Updated Successfully!');
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) {

    }

    public function destroy1($id)
    {
        $blog = Blog::findOrFail($id);
        // Storage::delete($blog->image);
        $blog->delete();
        return redirect()->route('blogs.index');
    }
}
