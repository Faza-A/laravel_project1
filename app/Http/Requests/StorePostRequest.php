<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePostRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' .$this->route('user'),
            'phone_number' => 'required',
            'gender' => 'required',
            'country_id' => 'required',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'last_name.required' => 'Lastname harus diisi',
            'email.required' => 'Email harus diisi!',
            'email.unique'=>'Email sudah terdaftar',
            'email.email'=>'Email tidak valid',
            'phone_number.required' => 'No Tlpn harus diisi',
            'gender.required'=>'gender harus diisi',
            'country_id.required'=>'Negara harus diisi',
            'password.required'=>'Password tidak boleh kosong',
            'c_password.required'=>'Password harus diisi',
            'c_password.same'=>'Password tidak sama'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
