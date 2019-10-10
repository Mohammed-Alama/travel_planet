<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationsValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
                'num_of_guests' => 'bail|required|max:1',
                'arrival' => 'required|date_format:Y/m/d|after:today',
        ];

        if ($this->request->has('arrival') && $this->request->get('arrival') != $this->request->get('departure')) {
            $rules['departure'] = 'date_format:Y-m-d|after:arrival';
        } else {
            $rules['departure'] = 'date_format:Y-m-d|after:today';
        }

        return $rules;

    }
}
