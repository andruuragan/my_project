<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
   public function rules(): array
{
    return [
        'name' => ['required', 'string', 'max:255'],
        'email' => [
            'required',
            'string',
            'lowercase',
            'email',
            'max:255',
            Rule::unique(User::class)->ignore($this->user()->id),
        ],
        'phone' => [
            'required',
            'string',
            'max:255',
            // Додаємо перевірку формату:
            'regex:/^\+38 \(\d{3}\) \d{3}-\d{2}-\d{2}$/',
            Rule::unique(User::class)->ignore($this->user()->id),
        ],
    ];
}

    /**
     * Кастомные сообщения об ошибках на украинском языке
     */
    public function messages(): array
    {
        return [
        'phone.required' => 'Номер телефону є обовʼязковим для заповнення.',
        'phone.unique' => 'Цей номер телефону вже використовується іншим користувачем.',
        'phone.regex' => 'Невірний формат номера. Будь ласка, введіть номер у форматі +38 (0XX) XXX-XX-XX.',
    ];
    }
}