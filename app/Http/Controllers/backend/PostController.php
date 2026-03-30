<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();
        $query->select('id', 'topic_id', 'title', 'slug', 'detail', 'image', 'post_type', 'description', 'status');
        $query->whereNull('deleted_at');

        if($request->filled('name')){
            $query->where([ ['title','like','%'.$request->input('name').'%'],
                            ['slug','like','%'.$request->input('name').'%']]);
        }

        if($request->filled('sort_by')){
            switch($request->input('sort_by')){
                case 'asc':
                    $query->orderBy('title','asc');
                    break;
                case 'desc':
                    $query->orderBy('title','desc');
                    break;
                default:
                    $query->orderBy('created_at','desc');
                    break;
            }
        }

        $posts = $query->paginate(5)->withQueryString();
        return view('layouts.backend.pages.post.index', compact('posts'));
    }

    public function create()
    {
        return view('layouts.backend.pages.post.create');
    }

    public function store(Request $request)
    {


        return redirect()->route('post.index');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('layouts.backend.pages.post.edit', compact('post'));
    }

    public function update(Request $request, string $id)
    {
       

        return redirect()->route('post.index');
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.trash');
    }

    public function trash(Request $request)
    {
        $query = Post::onlyTrashed()->select('id', 'topic_id', 'title', 'slug', 'detail', 'image', 'post_type', 'description', 'status');

        if($request->filled('name')){
            $query->where([ ['title','like','%'.$request->input('name').'%'],
                            ['slug','like','%'.$request->input('name').'%']]);
        }

        if($request->filled('status')){
            $query->where('status', $request->input('status'));
        }

        if($request->filled('sort_by')){
            switch($request->input('sort_by')){
                case 'asc':
                    $query->orderBy('title','asc');
                    break;
                case 'desc':
                    $query->orderBy('title','desc');
                    break;
                default:
                    $query->orderBy('created_at','desc');
                    break;
            }
        }

        $posts = $query->paginate(5)->withQueryString();
        return view('layouts.backend.pages.post.trash', compact('posts'));
    }
}
