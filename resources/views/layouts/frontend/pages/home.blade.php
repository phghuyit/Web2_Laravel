@extends('layouts.frontend.layout')

@section('content')

    <div class="text-[#0f1111] mt-6">
        
        <div class="my-12">
            <p class="capitalize text-3xl font-bold mb-6 ml-3">Sách Bán Chạy</p>

            <div class="grid grid-cols-4 gap-10 mx-6">
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020 img="https://m.media-amazon.com/images/I/51TjK1b8uaL.AC_SX250.jpg"/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020 img="https://m.media-amazon.com/images/I/51ISNDCCBAL.AC_SX250.jpg"/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
        </div>
        
        <div class="my-12">
            <p class="capitalize text-3xl font-bold mb-6 ml-3">Sách Giảm Giá Sâu</p>

            <div class="grid grid-cols-4 gap-10 mx-6">
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
        </div>
        
        <div class="my-12">
            <p class="capitalize text-3xl font-bold mb-6 ml-3">sách Vừa ra lò</p>

            <div class="grid grid-cols-4 gap-10 mx-6">
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
        </div>

        <div class="my-12">
            <p class="capitalize text-3xl font-bold mb-6 ml-3">Sách kinh điển</p>

            <div class="grid grid-cols-4 gap-10 mx-6">
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
            <x-product-card title="Nhà Giả Kim" price="151000" author="Paulo Coelho" year=2020/>
        </div>
    </div>

@endsection