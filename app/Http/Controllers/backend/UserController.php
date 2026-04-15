<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        $query->select('id', 'name', 'email', 'phone', 'username', 'address', 'image', 'roles', 'status');
        $query->whereNull('deleted_at');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }

        if ($request->filled('sort_by')) {
            switch ($request->input('sort_by')) {
                case 'asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }

        $users = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('layouts.backend.pages.user.create');
    }

    public function store(Request $request)
    {

        return redirect()->route('user.index');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('layouts.backend.pages.user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {

        return redirect()->route('user.index');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.trash');
    }

    public function trash(Request $request)
    {
        $query = User::onlyTrashed()->select('id', 'name', 'email', 'phone', 'username', 'address', 'image', 'roles', 'status');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('sort_by')) {
            switch ($request->input('sort_by')) {
                case 'asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }

        $users = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.user.trash', compact('users'));
    }
}
