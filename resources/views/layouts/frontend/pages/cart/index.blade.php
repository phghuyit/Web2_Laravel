<x-frontend.layout>
    <x-slot:title>Giỏ Hàng</x-slot:title>
    <main class="mt-6 mx-auto text-[#0f1111] w-[95%]">
        <div class="flex flex-col gap-10 lg:flex-row">
            <div class="flex-[4] p-6 rounded-xs shadow">
                <div class=" mb-6">
                    <p class="capitalize font-bold text-4xl">giỏ hàng</p>
                </div>
                <div class="border border-[#d3d3d3] relative">
                    <span class="-top-6 absolute right-0">Gia</span>
                </div>

                <div class="my-6">
                    //Card Cart San pham
                </div>

                <div class="border border-[#d3d3d3] hidden lg:block"></div>
                    <p class="flex- font-semibold hidden my-2 text-2xl text-right lg:block">
                        Tổng tạm tính: 333,333 vnđ
                    </p>
                </div>

            <div class="flex-1 max-w-lg p-6 rounded-xs self-center shadow text-xl">
                <p class="capitalize">tổng tạm tính: <span class="font-bold uppercase">333,333 vnd</span></p>
                {{-- <div class="bg-orange-400 my-3 p-3 rounded-xl text-center">
                    <a href="#"><p class="">Tiến hành thanh toán</p></a>
                </div> --}}
                <x-ui.btn content="Tiến hành thanh toán"/>
            </div>
        </div>


    </main>
</x-frontend.layout>
