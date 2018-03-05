<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ButtonRequest extends FormRequest
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

        switch ($this->method()) {
            case 'POST': {
                return [
                    'company_id' => 'required',
                    'branch_id' => 'required',
                    'button_type_id' => 'required',
                    'serial_number' => 'required|unique:buttons',
                    'identifier' => 'required',

                ];
            }

            case 'PUT': {
                return [
                    'company_id' => 'required',
                    'branch_id' => 'required',
                    'button_type_id' => 'required',
                    'serial_number' => 'required|unique:buttons,id,'.$this->segments(2),
                    'identifier' => 'required',
                ];
            }
            case 'PATCH':{
                return [
                    'company_id' => 'required',
                    'branch_id' => 'required',
                    'button_type_id' => 'required',
                    'serial_number' => 'required|unique:buttons,id,'.$this->segment(2),
                    'identifier' => 'required',
                ];            }
            default:
                break;
        }


    }
}
