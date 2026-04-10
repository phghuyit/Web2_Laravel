<x-frontend.layout>
<x-slot:title>
    Sản Phẩm
</x-slot:title>
    <div class="gap-3 grid grid-cols-4 mt-6 mx-auto text-[#0f1111] w-[95%]">
        <div class="object-contain">
           <img src="https://m.media-amazon.com/images/I/71UbrOC7TwL._SY342_.jpg" alt="Judge Stone Bìa Sách" class="justify-self-center">
           <x-ui.btn content="Đọc thử" bgcolor="border border-[#888c8c]"/>
           <x-ui.btn content="Nghe audio thử" bgcolor="border border-[#888c8c]"/>
        </div>

        <div class="col-span-2 space-y-2">
            <p class="capitalize font-bold text-xl">Judge Stone: A Novel<span class="text-[#616b69] text-xs"> 09/04/2016</span></p>
            <p>by <a href="" class="text-[#3671a7] hover:text-black hover:underline">James Patterson</a> (Tác giả), <a href="" class="text-[#3671a7] hover:text-black hover:underline">Viola Davis</a> (Đồng tác giả)</p>

            <div class="border border-[#d3d3d3]"></div>
            <div>
                Academy Award winning actress Viola Davis and the world's #1 bestselling author James Patterson’s Judge Stone “delivers first-class courtroom drama, small-town excitement, and strong characters all wrapped in a moral dilemma. Tense, readable, and relevant.” (Kirkus Reviews, starred review)

                “Talk about a power combo! ... With Davis’s razor-sharp emotional insight and Patterson’s mastery of rocket-fuel pacing, this is the dream team to deliver an up-all-night read that will keep the group chat buzzing.” —Oprah Daily

                “Wonderfully satisfying ... This legal thriller from [a] superstar duo ... demands attention from its opening pages and never lets go.” —Booklist, starred review
            </div>
            <div class="border border-[#d3d3d3]"></div>
            <div class="grid grid-cols-4 pt-6 py-3">
                <x-detail-card/>
                <x-detail-card/>
                <x-detail-card/>
                <x-detail-card/>
            </div>

        </div>

        <div class="border-[#d3d3d3] border-t col-span-3">
            <p class="font-bold mt-3 text-bold text-xl">Những thể loại liên quan mà bạn có thể thấy thú vị</p>
            <div class="flex flex-col gap-2">

            </div>
        </div>

        <div class="col-start-4 row-span-2 row-start-1">
            <div class="border border-[#d3d3d3] p-6">
                <p class="text-2xl"><span class="font-light hidden mr-2 text-red-500 lg:inline lg:text-5xl">-53%</span>133,333 vnđ</p>
                <p>Giá bìa cứng: <span class="line-through">150000 vnđ</span></p>
                <x-ui.btn content="Mua ngay"/>
                <p class="text-sm">Bằng việc đặt hàng,<span class="font-bold text-sm">bạn đồng ý với <a href="#" class="text-blue-400 underline hover:text-orange-400">Điều khoản dịch vụ và Chính sách quyền riêng tư của chúng tôi</a></span></p>
                <p class="mt-1 text-gray-500 text-xs">Đại diện thương mại bởi Amazin.com Services LLC.</p>
                <div class="mt-2">
                    <input type="checkbox"><label for="" class="ml-2">Thêm <a href="#"><span class="capitalize text-blue-400 hover:text-orange-500 hover:underline">sách nghe</span></a> chỉ với <span class="text-red-500">99,000 vnđ</span><span class="line-through ml-1">120,000 vnđ</span></label>
                </div>
            </div>
            <div class="border border-[#d3d3d3] p-6">
                <p class="font-semibold text-lg">Mua sách để làm quà tặng</p>
                <p class="text-xm">Mua làm quà tặng cá nhân hoặc cho một nhóm lớn</p>
                <a href="#" class="hover:text-orange-400 hover:underline"><p class="text-blue-400 hover:text-orange-400">Xem thêm tại đây <i class="fa-angle-down fa-solid"></i></i></p></a>
            </div>
        </div>

    </div>
</x-frontend.layout>
