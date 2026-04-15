<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            // Tên hiển thị trên menu (Ví dụ: Trang chủ, Liên hệ)
            $table->string('name', 255);

            // Đường dẫn khi click vào menu
            $table->string('link', 255)->nullable();

            // Cột ICON: Lưu class icon (Ví dụ: 'fa-home', 'fa-phone')
            $table->string('icon', 255)->nullable();

            // Cột PARENT_ID: Dùng để làm menu đa cấp (dropdown)
            // 0: Menu cấp cha cao nhất | ID khác: là con của Menu có ID đó
            $table->unsignedInteger('parent_id')->default(0);

            // Cột SORT_ORDER: Thứ tự sắp xếp hiển thị (1, 2, 3...)
            $table->unsignedInteger('sort_order')->default(0);

            // Cột POSITION: Vị trí hiển thị menu (header, footer, v.v.)
            $table->string('position')->default('header');

            // ID từ các bảng khác (category_id, brand_id...) nếu type không phải là custom
            $table->unsignedInteger('table_id')->nullable();

            // Loại menu để xử lý link động
            $table->enum('type', [
                'category',
                'brand',
                'topic',
                'page',
                'custom',
            ])->default('custom');

            $table->unsignedInteger('created_by')->default(1);
            $table->unsignedInteger('updated_by')->nullable();

            // Trạng thái: 1: Hiển thị, 2: Tạm ẩn, 0: Thùng rác
            $table->unsignedTinyInteger('status')->default(2);

            $table->softDeletes(); // Tạo cột deleted_at cho tính năng xóa tạm
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
