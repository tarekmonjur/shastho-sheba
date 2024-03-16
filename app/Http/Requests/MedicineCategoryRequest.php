<?php

namespace App\Http\Requests;

use App\Models\MedicineCategory;
use App\Rules\AlphaHyphen;
use App\Rules\AlphaSpacesDot;
use Illuminate\Foundation\Http\FormRequest;

class MedicineCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->request->set("medicine_category_slug", $this->toSlug($this->request->get('medicine_category_slug')));

        if($this->segment(3)){
            $slug = ['required', 'min:3', 'max:200', new AlphaHyphen(), 'unique:'.(new MedicineCategory())->getTable().',category_slug,'.$this->segment(3)];
        }else{
            $slug = ['required', 'min:3', 'max:200', new AlphaHyphen(), 'unique:'.(new MedicineCategory())->getTable().',category_slug'];
        }

        return [
            'medicine_category_type' => 'required',
            'medicine_category_name' => ['required', 'min:3', 'max:200'],
            'medicine_category_slug' => $slug,
            'category_image_box' => 'nullable|mimes:jpeg,jpg,png,gif|max:4000',
            'category_image_top_banner' => 'nullable|mimes:jpeg,jpg,png,gif|max:4000',
            'category_image_banner' => 'nullable|mimes:jpeg,jpg,png,gif|max:4000',
            'is_feature' => 'required',
            'is_top' => 'required',
        ];
    }

    private function toSlug($value)
    {
        $slug = strtolower(preg_replace('/[\s-_|=+@#$%^&*]/', '-', $value));
        return $slug;
    }
}
