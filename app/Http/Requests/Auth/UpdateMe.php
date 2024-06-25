<?php

namespace App\Http\Requests\Auth;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Utils\Constants\ResponseMessages;
use App\Utils\Enums\HttpResponseEnum;
class UpdateMe extends FormRequest
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
            'name'              => 'required',
            'username'          => 'required',
            'new_password'      => 'nullable',
            'c_new_password'    => 'nullable|same:new_password'
        ];
    }

    public function messages()
    {
        return[
            'name.required'         => 'Full name is required',
            'username.required'     => 'Username is required',
            'c_new_password.same'   => 'New password confirmation must be match with new password'
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
