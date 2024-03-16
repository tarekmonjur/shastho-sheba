<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineOfferRequest extends FormRequest
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
        return [
            'offer_name' => 'required',
            'medicine_name' => 'required',
            'offer_percent' => 'required',
            'offer_start_date' => 'required|date_format:Y-m-d',
            'offer_end_date' => 'required|date_format:Y-m-d',
            'offer_highlight' => 'required',
            'offer_status' => 'required',
        ];
    }
}
