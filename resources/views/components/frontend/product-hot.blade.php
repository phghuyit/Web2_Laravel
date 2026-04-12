<div class="my-12">
    <p class="capitalize font-bold mb-6 ml-3 text-3xl">Best Seller</p>
    <div class="gap-10 grid grid-cols-2 mx-6 xl:grid-cols-4">
        @foreach ($products as $product)
            <x-ui.product-card :product="$product" />
        @endforeach
    </div>
</div>
