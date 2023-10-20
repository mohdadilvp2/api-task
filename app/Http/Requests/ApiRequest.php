<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;
use Illuminate\Http\JsonResponse;
use App\Http\Constants\ErrorCodes;

class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country_code' => ['required', Rule::in(array_keys(config('constants.supported_countries')))],
            'page_token' => 'string',
            'per_page' => 'required|numeric|min:1|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'country_code.in' => 'The selected country code is invalid. Valid list is ' . Arr::join(array_keys(config('constants.supported_countries')), ', ', ' and '),
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => trans('error_messages.' . ErrorCodes::VALIDATION_ERROR),
            'error_code' => ErrorCodes::VALIDATION_ERROR,
            'data'      => $validator->errors()
        ], JsonResponse::HTTP_BAD_REQUEST));
    }
}
