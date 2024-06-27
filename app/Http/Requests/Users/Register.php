<?php

namespace App\Http\Requests\Users;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Utils\Constants\ResponseMessages;
use App\Utils\Enums\HttpResponseEnum;
class Register extends FormRequest
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
            'document_type_id' => 'required|exists:document_types,id|numeric',
            'doc_number' => 'required|numeric|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
            'c_password' => 'required_with:password|same:password|required'
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            \ResponseHelper::GetErrorFromRequest(
                ResponseMessages::REQUEST_MODEL_ERROR_RESPONSE,
                $validator->errors(),
                HttpResponseEnum::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }
}
