<x-frontend.layout>
    <x-slot:title>Liên hệ hỗ trợ</x-slot:title>

    <div class="bg-gray-100 min-h-screen py-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="bg-white px-8 py-6 rounded-xl shadow-sm border border-gray-200 mb-6">
                <h1 class="font-bold text-3xl text-gray-900 mb-2">Đội chăm sóc khách hàng Amazin</h1>
                <p class="text-gray-600 text-lg">
                    Chúng tôi muốn lắng nghe câu hỏi và ý kiến đóng góp từ bạn. Hãy cho Amazin biết vấn đề của bạn để
                    được hỗ trợ nhanh nhất nhé! Chúng tôi sẽ liên hệ lại trong vòng 24h.
                </p>
            </div>

            <!-- Form Section -->
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-200">
                <form action="" method="POST" class="space-y-6">
                    @csrf

                    <!-- Role selection -->
                    <div>
                        <label for="role" class="block font-medium text-gray-800 mb-2">Bạn cần hỗ trợ với vai trò
                            là?</label>
                        <select name="role" id="role"
                            class="w-full border border-gray-300 bg-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-200 focus:border-orange-500 outline-none transition-colors">
                            <option value="buyer">Người mua (Độc giả)</option>
                            <option value="author">Tác giả (Người bán/Xuất bản)</option>
                        </select>
                    </div>

                    <!-- Email inputs in a grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block font-medium text-gray-800 mb-1">Email liên hệ <span
                                    class="text-red-500">*</span></label>
                            <p class="text-gray-500 text-sm mb-2">Email (đã xác minh) trên tài khoản Amazin của bạn.</p>
                            <input type="email" name="email" id="email" placeholder="example@mail.com"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-200 focus:border-orange-500 outline-none transition-colors">
                        </div>

                        <div>
                            <label for="email_confirm" class="block font-medium text-gray-800 mb-1">Xác nhận Email <span
                                    class="text-red-500">*</span></label>
                            <p class="text-gray-500 text-sm mb-2">Vui lòng nhập lại chính xác email của bạn.</p>
                            <input type="email" name="email_confirm" id="email_confirm" placeholder="example@mail.com"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-200 focus:border-orange-500 outline-none transition-colors">
                        </div>
                    </div>

                    <!-- Topic Selection -->
                    <div>
                        <label for="topic" class="block font-medium text-gray-800 mb-2">Bạn đang gặp vấn đề
                            gì?</label>
                        <select name="topic" id="topic"
                            class="w-full border border-gray-300 bg-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-200 focus:border-orange-500 outline-none transition-colors">
                            <option value="">-- Chọn chủ đề hỗ trợ --</option>
                            <option value="shipping">Vận chuyển & Nhận hàng</option>
                            <option value="refund">Trả hàng & Hoàn tiền</option>
                            <option value="payment">Thanh toán & Hóa đơn</option>
                            <option value="author_publish">Vấn đề bản quyền & Đăng bán (Dành cho Tác giả)</option>
                            <option value="other">Vấn đề khác</option>
                        </select>
                    </div>

                    <!-- Message details -->
                    <div>
                        <label for="message" class="block font-medium text-gray-800 mb-1">Nội dung phản hồi <span
                                class="text-red-500">*</span></label>
                        <p class="text-gray-500 text-sm mb-2">Điền thêm thông tin chi tiết về thắc mắc/vấn đề của bạn.
                        </p>
                        <textarea name="message" id="message" rows="5" placeholder="Mô tả chi tiết vấn đề của bạn ở đây..."
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-200 focus:border-orange-500 outline-none transition-colors resize-y"></textarea>
                    </div>

                    <!-- Consent and Submit -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 mt-6">
                        <div class="flex items-start mb-4">
                            <div class="flex items-center h-5">
                                <input type="checkbox" id="consent" name="consent"
                                    class="w-4 h-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500 mt-1 cursor-pointer">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="consent" class="font-bold text-gray-800 cursor-pointer">Tôi đồng ý với
                                    chính sách xử lý dữ liệu</label>
                                <p class="text-gray-600 mt-1">Bằng việc nhấn "Gửi yêu cầu", tôi đồng ý cho Amazin thu
                                    thập và xử lý dữ liệu cá nhân của tôi theo <a href="#"
                                        class="text-[#0066c0] hover:text-[#c45500] hover:underline">Chính sách bảo
                                        mật</a>.</p>
                            </div>
                        </div>

                        <div class="flex justify-end pt-2">
                            <button type="submit"
                                class="bg-[#ffd814] hover:bg-[#f7ca00] border border-[#fcd200] rounded-lg px-10 py-3 text-base shadow-sm font-medium transition-colors cursor-pointer w-full md:w-auto">
                                Gửi yêu cầu hỗ trợ
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-frontend.layout>
