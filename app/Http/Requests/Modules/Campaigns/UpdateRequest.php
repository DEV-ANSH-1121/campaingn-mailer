<?php

namespace App\Http\Requests\Modules\Campaigns;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required',
            'subject' => 'nullable',
            'mail_template_id' => 'required|exists:mail_templates,id',
            'start_time' => 'required|date_format:m/d/Y|after_or_equal:' . date('m/d/Y'),
            'campaign_users' => 'required',
        ];
    }
}
