<x-frontend.layout>
    <x-slot:title>Liên hệ</x-slot:title>
    <div class="bg-gray-200 min-h-screen">
        <div class="mx-auto w-[80%]">
            <div class="bg-white px-6 py-3 rounded-b-xl rounded-t-xl">
            <p class="font-semibold text-3xl">
                Đội chăm sóc khách hàng Amazin
            </p>
            <p class="mt-3">
                Chúng tôi muốn lắng nghe câu hỏi và ý kiến đóng góp từ bạn. Hãy phản hồi cho Amazin biết vấn đề của bạn nhé! Chúng tôi sẽ liên hệ lại bạn trong 24h tiếp theo.
            </p>
        </div>
        <div class="bg-white mt-3 p-6 rounded-xl">
            <form action="">
                <label for="">Bạn cần hỗ trợ với vai trò là người bán hay người mua?</label>
                <br>
                <select name="" id="" class="border mb-6 px-6 py-3 w-full">
                    <option value="">Người mua</option>
                    <option value="">Tác giả</option>
                </select>

                <label for="">Email</label>
                <br>
                <label for="" class="text-gray-500 text-sm">Vui lòng cung cấp email (đã xác minh) mà bạn đã đăng ký trên tài khoản Amazin</label>
                <br>
                <input type="text" class="border mb-6 px-6 py-3 w-full">

                <label for="">Xác nhận Email</label>
                <br>
                <input type="text" class="border mb-6 px-6 py-3 w-full">

                <label for="">Bạn thắc mắc về vấn đề nào?</label>
                <br>
                <select name="" id="" class="border mb-6 px-6 py-3 w-full">
                    <option value="">Vận chuyển</option>
                    <option value="">Trả hàng & hoàn tiền</option>
                    <option value="">Trả hàng & hoàn tiền</option>
                    <option value="">Thanh toán</option>
                </select>
                <label for="">Nội dung phản hồi</label>
                <p class="text-gray-500 text-sm">Điền thêm thông tin chi tiết về thắc mắc/ vấn đề của bạn</p>
                <br>
                <textarea class="border-1 p-3 rounded w-full" rows="3">
Nhập giá trị ở đây
                </textarea>
            </form>
            <p class="font-bold mt-3">Bằng việc nhấn "Gửi/Submit", tôi đồng ý cho Amazin thu thập và xử lý dữ liệu cá nhân của tôi theo Chính sách bảo mật của Amazin.</p>
            <div class="mt-2">
                <input type="checkbox"><span class="ml-2">Tôi đồng ý</span></div>
            </div>
        </div>
        <div class="flex justify-end mt-5 mx-auto w-[80%]">
            <x-ui.btn content="Gửi"/>
        </div>
    </div>
</x-frontend.layout>
