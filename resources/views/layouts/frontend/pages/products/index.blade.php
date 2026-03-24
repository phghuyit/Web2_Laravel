<x-frontend.layout>
<x-slot:title>
    Sản Phẩm
</x-slot:title>
<x-slot:header>
    <script src="{{asset('js/jquery-4.0.0.min.js')}}"></script>
</x-slot:header>
    <div class="flex">
        <div class="flex-4">
            <p class="capitalize text-3xl font-bold m-6">Tất cả sản phẩm</p>
            <div class="text-[#0f1111] mt-6 w-[80%] mx-auto">
                <div class="my-12 grid grid-cols-2 xl:grid-cols-4 gap-3">
                    @foreach ($products as $product)
                        <x-ui.productcard :product="$product"></x-ui.productcard>
                    @endforeach
                </div>
                <div class="mt-4 ">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        <aside class="flex-1 border-l border-black p-3">
            <p class="m-6 capitalize ">Sap xep<i class="fa-solid fa-filter"></i></p>
            <p>The Loai Sach</p>
            <ul>
                <li><input type="radio" name="categoru_id" value="1">Van hoc</li>
                <li><input type="radio" name="categoru_id" value="2">Fantasy</li>
                <li><input type="radio" name="categoru_id" value="6">Tam ly hoc</li>
            </ul>
            <p>Khoang gia</p>
            <ul>
                <li><input type="checkbox" name="price_range" data-min=0 data-max=200>0-200k</li>
                <li><input type="checkbox" name="price_range" data-min=200 data-max=1000>200k-1tr</li>
                <li><input type="checkbox" name="price_range" data-min=1000 >1tr+</li>
            </ul>
            <p>Tac Gia</p>
            <ul>
                <li><input type="checkbox" name="brand_id" value="1">J.K. Rowling</li>
                <li><input type="checkbox" name="brand_id" value="2">George Orwell</li>
                <li><input type="checkbox" name="brand_id" value="3">J.R.R. Tolkien</li>
            </ul>
        </aside>
    </div>
    <x-slot:footer>
        <script>
            
        </script>
    </x-slot:footer>
</x-frontend.layout>