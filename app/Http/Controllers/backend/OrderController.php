<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();
        $query->select('id', 'user_id', 'name', 'phone', 'email', 'address', 'note', 'status');
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

        $orders = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.order.index', compact('orders'));
    }

    public function create()
    {
        return view('layouts.backend.pages.order.create');
    }

    public function store(Request $request)
    {
        $order = new Order;
        $order->user_id = $request->user_id;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->note = $request->note;
        $order->status = $request->status ?? 1;
        $order->created_at = date('Y-m-d H:i:s');
        $order->save();

        return redirect()->route('order.index');
    }

    public function show(string $id)
    {
        $order = Order::findOrFail($id);

        return view('layouts.backend.pages.order.show', compact('order'));
    }

    public function edit(string $id)
    {
        $order = Order::findOrFail($id);

        return view('layouts.backend.pages.order.edit', compact('order'));
    }

    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->user_id = $request->user_id;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->note = $request->note;
        $order->status = $request->status ?? 1;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->save();

        return redirect()->route('order.index');
    }

    public function restore(string $id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        $order->restore();

        return redirect()->route('order.index');
    }

    public function delete(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.trash');
    }

    public function destroy(string $id)
    {
        $order = Order::withTrashed()->findOrFail($id);
        $order->forceDelete();

        return redirect()->route('order.trash');
    }

    public function trash(Request $request)
    {
        $query = Order::onlyTrashed()->select('id', 'user_id', 'name', 'phone', 'email', 'address', 'note', 'status');

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

        $orders = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.order.trash', compact('orders'));
    }
}
