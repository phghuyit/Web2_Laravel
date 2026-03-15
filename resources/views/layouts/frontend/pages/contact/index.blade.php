<x-frontend.layout>
    <x-slot:title>Liên hệ</x-slot:title>
    <div class="bg-gray-200 min-h-screen">
        <div class="w-[80%] mx-auto">
            <div class="bg-white rounded-t-xl rounded-b-xl py-3 px-6">
            <p class="text-3xl font-semibold">
                Đội chăm sóc khách hàng Amazin
            </p>
            <p class="mt-3">
                Chúng tôi muốn lắng nghe câu hỏi và ý kiến đóng góp từ bạn. Hãy phản hồi cho Amazin biết vấn đề của bạn nhé! Chúng tôi sẽ liên hệ lại bạn trong 24h tiếp theo.
            </p>
        </div>
        <div class="mt-3 bg-white rounded-xl p-6">
            <form action="">
                <label for="">Bạn cần hỗ trợ với vai trò là người bán hay người mua?</label>
                <br>
                <select name="" id="" class="border w-full px-6 py-3 mb-6">
                    <option value="">Người mua</option>
                    <option value="">Tác giả</option>
                </select>

                <label for="">Bạn thắc mắc về vấn đề nào?</label>
                <br>
                <select name="" id="" class="border w-full px-6 py-3 mb-6">
                    <option value="">Vận chuyển</option>
                    <option value="">Trả hàng & hoàn tiền</option>
                    <option value="">Trả hàng & hoàn tiền</option>
                    <option value="">Thanh toán</option>
                </select>
                <label for="">Nội dung phản hồi</label>
                <p class="text-sm text-gray-500">Điền thêm thông tin chi tiết về thắc mắc/ vấn đề của bạn</p>
                <br>
                <textarea class="border-1 rounded w-full p-3" rows="3">
Nhập giá trị ở đây
                </textarea>
            </form>
            <p class="font-bold mt-3">Bằng việc nhấn "Gửi/Submit", tôi đồng ý cho Shopee thu thập và xử lý dữ liệu cá nhân của tôi theo Chính sách bảo mật của Shopee.</p>
            <div class="mt-2">
                <input type="checkbox"><span class="ml-2">Tôi đồng ý</span></div>
            </div>
        </div>
        <div class="mt-5 w-[80%] mx-auto flex justify-end">
            <x-btn content="Gửi"/>
        </div>
    </div>
</x-frontend.layout>