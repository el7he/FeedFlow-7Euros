<?php

namespace App\Http\Requests\Organization;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganization extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = auth()->user();

        if ($user) {

            $current_organization = session('current_organization_id');

            if ($user->id === $current_organization) {
                return true;
            }

            $adminRelation = \DB::table('organization_user')
                ->where('organization_id', $current_organization)
                ->where('user_id', $user->id)
                ->where('role', 'admin')
                ->first();

            if ($adminRelation) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
