<?php

namespace App\Http\Requests\OfflinePaymentSetting;

use App\Http\Requests\CoreRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SuperAdminUpdateRequest extends CoreRequest
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
            'name' => [
                'required',
                Rule::unique('offline_payment_methods')->where(function ($query) {
                    return $query->whereNull('company_id');
                })->ignore($this->route('offline_payment_setting')),
            ],
            'description' => 'required'
        ];
    }

}
