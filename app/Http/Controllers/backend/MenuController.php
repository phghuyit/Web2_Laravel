<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $query = Menu::query();
        $query->select('id', 'name', 'link', 'table_id', 'type', 'status');
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

        $menus = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('layouts.backend.pages.menu.create');
    }

    public function store(Request $request)
    {
        $menu = new Menu;
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->table_id = $request->table_id;
        $menu->type = $request->type;
        $menu->status = $request->status ?? 1;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->save();

        return redirect()->route('menu.index');
    }

    public function show(string $id)
    {
        $menu = Menu::findOrFail($id);

        return view('layouts.backend.pages.menu.show', compact('menu'));
    }

    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);

        return view('layouts.backend.pages.menu.edit', compact('menu'));
    }

    public function update(Request $request, string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->table_id = $request->table_id;
        $menu->type = $request->type;
        $menu->status = $request->status ?? 1;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->save();

        return redirect()->route('menu.index');
    }

    public function restore(string $id)
    {
        $menu = Menu::onlyTrashed()->findOrFail($id);
        $menu->restore();

        return redirect()->route('menu.index');
    }

    public function delete(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.trash');
    }

    public function destroy(string $id)
    {
        $menu = Menu::withTrashed()->findOrFail($id);
        $menu->forceDelete();

        return redirect()->route('menu.trash');
    }

    public function trash(Request $request)
    {
        $query = Menu::onlyTrashed()->select('id', 'name', 'link', 'table_id', 'type', 'status');

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

        $menus = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.menu.trash', compact('menus'));
    }
}
