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

        if($request->filled('name')){
            $query->where('name','like','%'.$request->input('name').'%');
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

        $orders = $query->paginate(5)->withQueryString();
        return view('layouts.backend.pages.order.index', compact('orders'));
    }

    public function create()
    {
        return view('layouts.backend.pages.order.create');
    }

    public function store(Request $request)
    {

        return redirect()->route('order.index');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
        return view('layouts.backend.pages.order.edit', compact('order'));
    }

    public function update(Request $request, string $id)
    {
        

        return redirect()->route('order.index');
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.trash');
    }

    public function trash(Request $request)
    {
        $query = Order::onlyTrashed()->select('id', 'user_id', 'name', 'phone', 'email', 'address', 'note', 'status');

        if($request->filled('name')){
            $query->where('name','like','%'.$request->input('name').'%');
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

        $orders = $query->paginate(5)->withQueryString();
        return view('layouts.backend.pages.order.trash', compact('orders'));
    }
}
