<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'company_id' => 'required|exists:master_companies,id',
            'department_id' => 'required|exists:master_departments,id',
            'name' => 'required|max:191',
            'nik' => 'required|digits_between:1,12|unique:employees,nik',
            'active' => 'required|boolean',
            'joined' => 'required|date',
            'dob' => 'required|date'
        ];
    }
}
