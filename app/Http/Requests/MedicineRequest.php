<?php

namespace App\Http\Requests;

use App\Models\Medicine;
use App\Rules\AlphaHyphenNumber;
use App\Rules\AlphaSpacesDot;
use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
        $this->request->set("medicine_slug", $this->toSlug($this->request->get('medicine_name'), $this->request->get('medicine_power')));

        if($this->segment(3)){
            $id = $this->segment(3);
            $medicineCode = ["required", "max:8", "alpha_num", "unique:".(new Medicine())->getTable().",medicine_code,".$id];
            $medicineName = ["required", "max:200", "unique:".(new Medicine())->getTable().",medicine_name,".$id];
            $slug = ['required', 'min:3', 'max:250', new AlphaHyphenNumber(), 'unique:'.(new Medicine())->getTable().',medicine_slug,'.$id];
        }else{
            $medicineCode = ["required", "max:8", "alpha_num", "unique:".(new Medicine())->getTable().",medicine_code"];
            $medicineName = ["required", "max:200", "unique:".(new Medicine())->getTable().",medicine_name"];
            $slug = ['required', 'min:3', 'max:250', new AlphaHyphenNumber(), 'unique:'.(new Medicine())->getTable().',medicine_slug'];
        }

        return [
            'medicine_code' => $medicineCode,
            'medicine_name' => $medicineName,
            'medicine_type' => 'required',
            'medicine_category' => 'required',
            'medicine_manufacturer' => 'required',
            'medicine_generic' => 'required',
            'medicine_price' => 'required|numeric|max:99999999',
            'medicine_unit_per_box' => 'required|numeric|max:100',
            'medicine_unit_per_strip' => 'required|numeric|max:100',
            'medicine_power' => 'required|max:50',
            'medicine_manufacture_date' => 'nullable|date_format:Y-m-d',
            'medicine_expiry_date' => 'nullable|date_format:Y-m-d',
            'medicine_image' => 'nullable|mimes:jpeg,jpg,png,gif|max:4000',
            'medicine_is_new' => 'required',
            'medicine_is_active' => 'required',
            'medicine_slug' => $slug,
        ];
    }


    private function toSlug($name, $power)
    {
        $name_slug = strtolower(preg_replace('/[\s-_|=+@#$%^&*]/', '-', $name));
        $power_slug = strtolower(preg_replace('/[\s-_|=+@#$%^&*]/', '', $power));
        $slug = $name_slug.'-'.$power_slug;
        return $slug;
    }

}
