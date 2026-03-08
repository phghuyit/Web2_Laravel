@extends('layouts.frontend.layout')

@section('content')
    <div class="text-[#0f1111] mt-6 w-[80%] mx-auto">
        <div class="my-12">
            <p class="capitalize text-3xl font-bold mb-6 ml-3">Tất cả sản phẩm</p>

            <div class="grid grid-cols-2 xl:grid-cols-4 gap-10 mx-6">
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020 img="https://m.media-amazon.com/images/I/51TjK1b8uaL.AC_SX250.jpg"/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020 img="https://m.media-amazon.com/images/I/51ISNDCCBAL.AC_SX250.jpg"/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020 img="https://m.media-amazon.com/images/I/51TjK1b8uaL.AC_SX250.jpg"/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020 img="https://m.media-amazon.com/images/I/51ISNDCCBAL.AC_SX250.jpg"/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020 img="https://m.media-amazon.com/images/I/51TjK1b8uaL.AC_SX250.jpg"/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020 img="https://m.media-amazon.com/images/I/51ISNDCCBAL.AC_SX250.jpg"/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020 img="https://m.media-amazon.com/images/I/51TjK1b8uaL.AC_SX250.jpg"/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020 img="https://m.media-amazon.com/images/I/51ISNDCCBAL.AC_SX250.jpg"/>
        </div>




    </div>
@endsection