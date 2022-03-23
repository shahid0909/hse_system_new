<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleDemoRequest extends FormRequest
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
            'company_name' => 'required|string|max:255',
            'email_address' => 'required|string|max:255|unique:schedule_demos',
            'industry_type_id' => 'required',
            'number_of_employees' => 'required',
            'person_incharge' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'contact_no' => 'required|unique:schedule_demos',
            'meeting_date' => 'required',
            'meeting_time' => 'required',
        ];
    }
}
