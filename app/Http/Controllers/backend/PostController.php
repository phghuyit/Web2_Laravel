<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();
        $query->select('id', 'topic_id', 'title', 'slug', 'detail', 'image', 'post_type', 'description', 'status');
        $query->whereNull('deleted_at');

        if ($request->filled('name')) {
            $query->where([['title', 'like', '%'.$request->input('name').'%'],
                ['slug', 'like', '%'.$request->input('name').'%']]);
        }

        if ($request->filled('sort_by')) {
            switch ($request->input('sort_by')) {
                case 'asc':
                    $query->orderBy('title', 'asc');
                    break;
                case 'desc':
                    $query->orderBy('title', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
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
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        $post->topic_id = $request->topic_id;
        $post->detail = $request->detail;
        $post->post_type = $request->post_type;
        $post->description = $request->description;

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = $post->slug.'_'.$file->getClientOriginalName();
            $path = $file->storeAs('posts', $filename, 'public');
            $post->image = $path;
        }

        $post->status = $request->status ?? 1;
        $post->created_at = date('Y-m-d H:i:s');
        $post->save();

        return redirect()->route('post.index');
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('layouts.backend.pages.post.show', compact('post'));
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        return view('layouts.backend.pages.post.edit', compact('post'));
    }

    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        $post->topic_id = $request->topic_id;
        $post->detail = $request->detail;
        $post->post_type = $request->post_type;
        $post->description = $request->description;

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = $post->slug.'_'.$file->getClientOriginalName();
            $path = $file->storeAs('posts', $filename, 'public');
            $post->image = $path;
        }

        $post->status = $request->status ?? 1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->save();

        return redirect()->route('post.index');
    }

    public function restore(string $id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->route('post.index');
    }

    public function delete(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.trash');
    }

    public function destroy(string $id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();

        return redirect()->route('post.trash');
    }

    public function trash(Request $request)
    {
        $query = Post::onlyTrashed()->select('id', 'topic_id', 'title', 'slug', 'detail', 'image', 'post_type', 'description', 'status');

        if ($request->filled('name')) {
            $query->where([['title', 'like', '%'.$request->input('name').'%'],
                ['slug', 'like', '%'.$request->input('name').'%']]);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('sort_by')) {
            switch ($request->input('sort_by')) {
                case 'asc':
                    $query->orderBy('title', 'asc');
                    break;
                case 'desc':
                    $query->orderBy('title', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }

        $posts = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.post.trash', compact('posts'));
    }
}
