<x-frontend.layout>
    <x-slot:title>
        Sản Phẩm
    </x-slot:title>
    <x-slot:header>
        <script src="{{ asset('js/jquery-4.0.0.min.js') }}"></script>
    </x-slot:header>

    <div class="flex my-12">
        <div class="flex-4">
            <p class="capitalize font-bold m-6 text-3xl">Tất cả sản phẩm</p>
            <div class="mt-6 mx-auto text-[#0f1111] w-[80%]">
                <div id="product-grid" class="gap-6 lg:gap-12 grid grid-cols-2 my-12 xl:grid-cols-4">
                    @fragment('product-list')
                        @foreach ($products as $product)
                            <x-ui.productcard :product="$product"></x-ui.productcard>
                        @endforeach
                    @endfragment
                </div>
                <div class="mt-4" id="paginator-container">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        <x-ui.all-product-filter />
    </div>
    <x-slot:footer>
        <script>
            function handle_filter() {
                let categories = [];
                $('input[name="category_id[]"]:checked').each(function() {
                    categories.push($(this).val());
                });

                let pricerange = $('input[name="price_range"]:checked');
                let minprice = pricerange.data('min');
                let maxprice = pricerange.data('max');

                let auth = $('input[name="brand_id"]:checked').val();

                $.ajax({
                    url: "{{ route('site.product.index') }}",

                    method: "GET",
                    data: {
                        categories: categories,
                        minprice: minprice,
                        maxprice: maxprice,
                        auth_id: auth
                    },
                    beforeSend: function() {
                        $("#product-grid").css('opacity', '0.5');
                    },
                    success: function(response) {
                        $('#paginator-container').html(response.paginator_html);
                        $("#product-grid").css('opacity', '1');
                    },
                    error: function() {
                        console.log("Error while ajax fetching data.");
                    }
                });
            }
        </script>
    </x-slot:footer>
</x-frontend.layout>
