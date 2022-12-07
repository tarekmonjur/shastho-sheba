<?php

namespace App\Http\Requests;

use App\Models\MedicineCompany;
use App\Rules\AlphaHyphen;
use App\Rules\AlphaSpacesDot;
use Illuminate\Foundation\Http\FormRequest;

class MedicineCompanyRequest extends FormRequest
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
        $this->request->set("medicine_company_slug", $this->toSlug($this->request->get('medicine_company_slug')));

        if($this->segment(3)){
            $slug = ['required', 'min:3', 'max:200', new AlphaHyphen(), 'unique:'.(new MedicineCompany())->getTable().',medicine_company_slug,'.$this->segment(3)];
        }else{
            $slug = ['required', 'min:3', 'max:200', new AlphaHyphen(), 'unique:'.(new MedicineCompany())->getTable().',medicine_company_slug'];
        }

        return [
            'medicine_company_name' => ['required', 'min:3', 'max:200', new AlphaSpacesDot()],
            'medicine_company_slug' => $slug,
            'medicine_company_status' => 'required',
        ];
    }

    private function toSlug($value)
    {
        $slug = strtolower(preg_replace('/[\s-_|=+@#$%^&*]/', '-', $value));
        return $slug;
    }
}
