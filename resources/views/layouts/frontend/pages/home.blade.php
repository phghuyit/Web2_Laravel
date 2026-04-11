<x-frontend.layout>
    <x-slot:title>
        Trang chủ
    </x-slot:title>
    <div class="mt-6 text-[#0f1111]">
            <x-ui.slider/>
            <x-frontend.product-new :products="$products" />
            <x-frontend.product-sale />
    </div>
</x-frontend.layout>
