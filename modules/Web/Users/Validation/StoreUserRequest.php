<?php
namespace BasicDashboard\Web\Users\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

/**
 * Summary of StoreUserRequest
 * @property string $password
 */
class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->offsetUnset('_token');
    }

    /**
     * Rules To Store User
     * @return array<string|mixed>
     */
    public function rules(): array
    {
        return [
            "name"              => "required",
            "email"             => ["required", "email", Rule::unique('users', 'email')->where(fn($query) => $query->whereNull('deleted_at'))],
            "password"          => "required",
            "status"            => "required",
            "role_id"           => "required",
            "name_other"        => "",
            "phone"             => "",
            "id_number"         => "",
            "date_of_birth"     => "",
            "father_name"       => "",
            "father_name_other" => "",
            "gender"            => "",
            "martial_status"    => "",
            "education_status"  => "",
            "occupation"        => "",
        ];
    }

    protected function passedValidation(): void
    {
        $this->merge([
            'password' => Hash::make($this->password),
        ]);
    }

    public function messages(): array
    {
        return [
            'name.required'      => __('user.username_validation'),
            'email.required'     => __('user.email_validation'),
            'password.required'  => __('user.password_validation'),
            'country_id.numeric' => __('user.country_id_validation'),
            'role_id.numeric'    => __('user.role_id_validation'),
        ];
    }
}
