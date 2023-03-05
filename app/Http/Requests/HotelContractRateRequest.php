<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelContractRateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hotel_contract_id' => 'required',
            'season_id' => 'required',
            'double' => 'required|decimal:0,3',
            'single_supplement' => 'required|decimal:0,3',
            'third_person' => 'required|decimal:0,3',
            'breakfast' => 'required|decimal:0,3',
            'lunch' => 'required|decimal:0,3',
            'dinner' => 'required|decimal:0,3',
            'all_inc' => 'required|decimal:0,3',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
