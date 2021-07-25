<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

class ReviewFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->redirect = url()->previous() . "#review-div";
        return [
            'review' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'review.required' => 'هذا الحقل إلزامي',
            'review.min' => 'حقل المراجعة يحب أن يتعدى طوله خمسة أحرف'
        ];
    }

    public function failedAuthorization ()
    {
        throw new AuthorizationException('لإضافة مراجعةالرجاء تسجيل الدخول أولاً');
    }
}
