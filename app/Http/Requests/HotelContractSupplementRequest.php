<?php

namespace App\Http\Requests;

use App\Models\HotelContract;
use Illuminate\Foundation\Http\FormRequest;

class HotelContractSupplementRequest extends FormRequest
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
        $HotelContract = HotelContract::where('id', $_GET['hotel_contract_id']??request()->get('hotel_contract_id'))->first();
        return [
            'name' => 'required',
            'hotel_contract_id' => 'required',
            'starting_date' => 'required|after_or_equal:'.$HotelContract->starting_date,
            'ending_date' => 'required|after_or_equal:starting_date|before_or_equal:'.$HotelContract->ending_date,
            'price_per_child' => 'required|decimal:0,3',
            'price_per_adult' => 'required|decimal:0,3',
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
