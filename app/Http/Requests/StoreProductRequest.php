<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|string|max:1000|unique:'.Product::class.',name',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'category_id' => 'required|integer|exists:categories,id',

            'brand_id' => 'required|integer|exists:brand,id',

            'price_buy' => 'required|numeric|min:0',

            'price_sale' => 'nullable|numeric|min:0|lte:price_buy',

            'qty' => 'required|integer|min:0',

            'detail' => 'nullable|string',

            'description' => 'nullable|string',

            'status' => 'required|integer|in:1,2',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'numeric' => ':attribute phải là số',
            'integer' => ':attribute phải là số nguyên',
            'image' => ':attribute phải là hình ảnh',
            'mimes' => ':attribute phải là định dạng jpg, jpeg, png, webp',
            'max' => ':attribute vượt quá kích thước cho phép',
            'exists' => ':attribute không tồn tại',
            'unique' => ':attribute đã tồn tại',
            'lte' => ':attribute phải nhỏ hơn hoặc bằng price_buy',
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => 'Danh mục',
            'brand_id' => 'Thương hiệu',
            'name' => 'Tên sản phẩm',
            'price_buy' => 'Giá nhập',
            'price_sale' => 'Giá khuyến mãi',
            'image' => 'File tải',
            'qty' => 'Số lượng',
            'detail' => 'Chi tiết',
            'description' => 'Mô tả',
            'status' => 'Trạng thái',
        ];
    }
}
