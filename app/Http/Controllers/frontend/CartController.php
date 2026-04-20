<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart= session()->get('cart',[]);
        return view('layouts.frontend.pages.cart.index',compact('cart'));
    }

    public function addcart(Request $request)
    {
        $product_id = $request->input('product_id');
        $qty = $request->input('qty', 1);

        $product = Product::find($product_id);
        if (!$product) {
            return back()->with('error', 'Sản phẩm không tồn tại');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product_id])) {
            $cart[$product_id]['qty'] += $qty;
        } else {
            $cart[$product_id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->is_sale ? $product->price_sale : $product->price_buy,
                'image' => $product->image ?? '',
                'qty' => $qty
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('site.cart.index')->with('success', 'Đã thêm sản phẩm vào giỏ hàng');
    }

    public function updatecart(Request $request)
    {
        $cart = session()->get('cart', []);
        $qty = $request->input('qty'); // Expecting an array of product_id => quantity

        if ($qty && is_array($qty)) {
            foreach ($qty as $id => $q) {
                if (isset($cart[$id])) {
                    $cart[$id]['qty'] = max(1, intval($q)); // Ensure quantity is at least 1
                }
            }
            session()->put('cart', $cart);
        }

        return redirect()->route('site.cart.index')->with('success', 'Đã cập nhật giỏ hàng');
    }

    public function delcart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('site.cart.index')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng');
    }

    public function delallcart()
    {
        session()->forget('cart');

        return redirect()->route('site.cart.index')->with('success', 'Đã xóa tất cả sản phẩm khỏi giỏ hàng');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('site.cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        return view('layouts.frontend.pages.cart.checkout', compact('cart'));
    }

    public function docheckout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('site.cart.index');
        }

        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
        ]);

        $order = new Order();
        $order->user_id = auth()->id() ?? 0;
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        // $order->status = 1;
        $order->save();

        foreach ($cart as $id => $item) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id; // Lấy ID đơn hàng vừa tạo ở trên
            $orderDetail->product_id = $id;
            $orderDetail->price = $item['price'];
            $orderDetail->qty = $item['qty'];
            $orderDetail->amount = $item['price'] * $item['qty']; // Tổng tiền của 1 món
            $orderDetail->save();
        }
        session()->forget('cart'); // Xóa sạch giỏ hàng
        return redirect()->route('site.cart.thanks');
    }

    public function thanks()
    {
        return view('layouts.frontend.pages.cart.thanks');
    }
}
