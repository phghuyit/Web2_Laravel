<x-frontend.layout>
    <x-slot:title>Giỏ Hàng</x-slot:title>
    <main class="text-[#0f1111] mt-6 w-[95%] mx-auto ">
        <div class="flex flex-col lg:flex-row gap-10">
            <div class="flex-[4] rounded-xs shadow p-6">
                <div class=" mb-6">
                    <p class="capitalize text-4xl font-bold">giỏ hàng</p>
                </div>
                <div class="relative border border-[#d3d3d3]">
                    <span class="absolute right-0 -top-6">Gia</span>
                </div>

                <div class="my-6">
                    //Card Cart San pham
                </div>

                <div class="hidden border border-[#d3d3d3]
                            lg:block"></div>
                    <p class="  hidden text-2xl font-semibold my-2 text-right
                                lg:block flex-">
                        Tổng tạm tính: 333,333 vnđ
                    </p>
                </div>

            <div class="flex-1 rounded-xs shadow p-6 text-xl max-w-lg self-center">
                <p class="capitalize">tổng tạm tính: <span class="uppercase font-bold ">333,333 vnd</span></p>
                {{-- <div class="rounded-xl bg-orange-400 p-3 text-center my-3">
                    <a href="#"><p class="">Tiến hành thanh toán</p></a>
                </div> --}}
                <x-btn content="Tiến hành thanh toán"/>
            </div>
        </div>
        
        
    </main>
</x-frontend.layout>