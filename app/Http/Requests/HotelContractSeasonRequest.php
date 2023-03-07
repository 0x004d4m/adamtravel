<?php

namespace App\Http\Requests;

use App\Models\HotelContract;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class HotelContractSeasonRequest extends FormRequest
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
            'hotel_contract_id' => 'required',
            'season_id' => 'required',
            'starting_date' => 'required|after_or_equal:'.$HotelContract->starting_date,
            'ending_date' => 'required|after_or_equal:starting_date|before_or_equal:'.$HotelContract->ending_date,
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
