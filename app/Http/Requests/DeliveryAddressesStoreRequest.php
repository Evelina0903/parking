<?php

namespace App\Http\Requests;

use App\Models\DeliveryAddresses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeliveryAddressesStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'region' => 'required|max:255',
            'locality' => 'required|max:255',
            'street' => 'required|max:255',
            'house' => 'required|max:255',
            'postcode' => 'required|max:50',
            'users_id' => ['required', 'exists:users,id'],
        ];
    }
}
