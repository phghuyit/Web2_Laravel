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
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->roles = $request->roles;

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('users', $filename, 'public');
            $user->image = $path;
        }

        $user->status = $request->status ?? 1;
        $user->created_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect()->route('user.index');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('layouts.backend.pages.user.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('layouts.backend.pages.user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->roles = $request->roles;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('users', $filename, 'public');
            $user->image = $path;
        }

        $user->status = $request->status ?? 1;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect()->route('user.index');
    }

    public function restore(string $id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('user.index');
    }

    public function delete(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.trash');
    }

    public function destroy(string $id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();

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
