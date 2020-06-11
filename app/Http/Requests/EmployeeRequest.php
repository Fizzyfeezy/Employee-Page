<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
        switch($this->method()){
            case'POST':
                return [
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'email' => 'required|email|max:255|unique:users,email',
                    'phone' => 'required|numeric',
                    'occupation' => 'nullable|string|max:255',
                    'status' => 'required|string|max:255|',
                    'salary' => 'required|numeric',
                    'status_time' => 'required|string|max:20',
                    'classification' => 'required|max:255'
                ];
            case 'GET':
                return [
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'phone' => 'required|numeric',
                    'occupation' => 'nullable|string|max:255',
                    'status' => 'required|string|max:255|',
                    'salary' => 'required|numeric',
                    'status_time' => 'required|string|max:20',
                    'classification' => 'required|max:255'
                ];
            default:
                break;
        }
    }
}
