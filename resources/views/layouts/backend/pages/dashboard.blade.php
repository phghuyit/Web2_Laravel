<x-backend.layout>
    <div class="gap-3 grid m-3 xl:grid-cols-4">
        <x-ui.report-card></x-ui.report-card>
        <x-ui.report-card></x-ui.report-card>
        <x-ui.report-card></x-ui.report-card>
        <x-ui.report-card></x-ui.report-card>
    </div>

    <div class="bg-white border-[#c8c8c8] border-1 m-3 rounded-lg">
        <div class="border-[#d3d3d3] border-b-1 flex justify-between p-3">
            <p class="font-bold text-xl">Tổng Kết Sale </p>
        </div>
        <div class="grid p-3 xl:grid-cols-2">
            <div class="flex flex-col">
                <p class="font-bold text-3xl">3,333 </p>
                <p class="capitalize">Đơn hàng tháng này</p>
                <div class="my-6 ">
                    <p class="my-3 whitespace-nowrap">
                        <span class="bg-green-200 mr-3 px-2 py-1 rounded-lg">
                            <i class="fa-caret-up fa-solid text-green-900"></i>
                        </span>
                        Doanh thu <span class="text-green-500">tăng 3%</span> so với tháng trước
                    </p>
                    <p class="my-3 whitespace-nowrap">
                        <span class="bg-red-200 mr-3 px-2 py-1 rounded-lg">
                            <i class="fa-caret-down fa-solid text-red-900"></i>
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
