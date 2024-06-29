<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
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
            'gender' => 'required',
            'email' => 'required|email',
            'first_number' => 'required',
            'middle_number' => 'required',
            'last_number' => 'required',
            'address' => 'required',
            'category_id' => 'required',
            'detail' => 'required|max:120',
        ];
    }

    public function messages(){
        return [
            'first_name.required' => '姓を入力してください',
            'last_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください',
        ];
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();

        // $validator->after(function ($validator) {
        //     if ($this->hasInvalidPhoneNumber()) {
        //         $validator->errors()->add('phone_number_format', '電話番号は5桁までの数字で入力してください');
        //     }
        // });

        $validator->after(function ($validator) {
            if ($this->hasInvalidPhoneInput()) {
                $validator->errors()->add('phone_number_input', '電話番号を入力してください');
            }
        });
        return $validator;
    }

    protected function hasInvalidPhoneInput()
    {
        $result = $this->failed('first_number', 'Required') ||
               $this->failed('middle_number', 'Required') ||
               $this->failed('last_number', 'Required');
    \Log::info('hasInvalidPhoneInput result: ' . ($result ? 'true' : 'false'));
        // return $this->failed('first-number', 'Required') ||
        //        $this->failed('middle-number', 'Required') ||
        //        $this->failed('last-number', 'Required');
    }

    // protected function hasInvalidPhoneNumber()
    // {
    //     return $this->failed('first-number', 'Digits') ||
    //            $this->failed('middle-number', 'Digits') ||
    //            $this->failed('last-number', 'Digits');
    // }

    protected function failed($field, $rule)
    {
        $result = $this->validator->failed()[$field][$rule] ?? false;
    \Log::info('failed result for ' . $field . ' with rule ' . $rule . ': ' . ($result ? 'true' : 'false'));
    return $result;
        return $this->validator->failed()[$field][$rule] ?? false;
    }
}
