<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        $query = Topic::query();
        $query->select('id', 'name', 'slug', 'sort_order', 'description', 'status');
        $query->whereNull('deleted_at');

        if($request->filled('name')){
            $query->where([ ['name','like','%'.$request->input('name').'%'],
                            ['slug','like','%'.$request->input('name').'%']]);
        }

        if($request->filled('sort_by')){
            switch($request->input('sort_by')){
                case 'asc':
                    $query->orderBy('name','asc');
                    break;
                case 'desc':
                    $query->orderBy('name','desc');
                    break;
                default:
                    $query->orderBy('created_at','desc');
                    break;
            }
        }

        $topics = $query->paginate(5)->withQueryString();
        return view('layouts.backend.pages.topic.index', compact('topics'));
    }

    public function create()
    {
        return view('layouts.backend.pages.topic.create');
    }

    public function store(Request $request)
    {


        return redirect()->route('topic.index');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $topic = Topic::findOrFail($id);
        return view('layouts.backend.pages.topic.edit', compact('topic'));
    }

    public function update(Request $request, string $id)
    {
        

        return redirect()->route('topic.index');
    }

    public function destroy(string $id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect()->route('topic.trash');
    }

    public function trash(Request $request)
    {
        $query = Topic::onlyTrashed()->select('id', 'name', 'slug', 'sort_order', 'description', 'status');

        if($request->filled('name')){
            $query->where([ ['name','like','%'.$request->input('name').'%'],
                            ['slug','like','%'.$request->input('name').'%']]);
        }

        if($request->filled('status')){
            $query->where('status', $request->input('status'));
        }

        if($request->filled('sort_by')){
            switch($request->input('sort_by')){
                case 'asc':
                    $query->orderBy('name','asc');
                    break;
                case 'desc':
                    $query->orderBy('name','desc');
                    break;
                default:
                    $query->orderBy('created_at','desc');
                    break;
            }
        }

        $topics = $query->paginate(5)->withQueryString();
        return view('layouts.backend.pages.topic.trash', compact('topics'));
    }
}
