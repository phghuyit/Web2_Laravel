<x-backend.layout>
    <div class="grid xl:grid-cols-4 m-3 gap-3 ">
        <x-report-card></x-report-card>
        <x-report-card></x-report-card>
        <x-report-card></x-report-card>
        <x-report-card></x-report-card>
    </div>

    <div class="border-1 border-[#c8c8c8] rounded-lg m-3 bg-white">
        <div class="flex justify-between border-b-1 border-[#d3d3d3] p-3">
            <p class="font-bold text-xl">Tổng Kết Sale </p>
        </div>
        <div class="grid xl:grid-cols-2 p-3">
            <div class="flex flex-col">
                <p class="font-bold text-3xl">3,333 </p>
                <p class="capitalize">Đơn hàng tháng này</p>
                <div class="my-6 ">
                    <p class="my-3 whitespace-nowrap">
                        <span class="bg-green-200 rounded-lg mr-3 py-1 px-2">
                            <i class="fa-solid fa-caret-up text-green-900"></i>
                        </span>
                        Doanh thu <span class="text-green-500">tăng 3%</span> so với tháng trước
                    </p>
                    <p class="my-3 whitespace-nowrap">
                        <span class="bg-red-200 rounded-lg mr-3 py-1 px-2">
                            <i class="fa-solid fa-caret-down text-red-900"></i>
                        </span>
                        Doanh thu <span class="text-green-500">giảm 3%</span> so với tháng trước
                    </p>
                    <x-ui.btn content="Xem chi tiết"/>
                </div>
            </div>
            <p>//Chỗ này chèn chart</p>
        </div>
    </div>
</x-backend.layout>
