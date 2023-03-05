<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelContractHigherRoomRequest extends FormRequest
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
            'room_type_id' => 'required',
            'season_id' => 'required',
            'single' => 'required|decimal:0,3',
            'double' => 'required|decimal:0,3',
            'triple' => 'required|decimal:0,3',
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
