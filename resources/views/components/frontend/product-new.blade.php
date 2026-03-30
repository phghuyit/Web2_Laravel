
<div class="my-12">
    <p class="capitalize text-3xl font-bold mb-6 ml-3">Sách Mới Nhất</p>
    {{-- {{ dd($products) }} --}}
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-10 mx-6">
        @foreach ($products as $product)
            <x-ui.product-card :product="$product"/>
        @endforeach
    </div>
</div>
