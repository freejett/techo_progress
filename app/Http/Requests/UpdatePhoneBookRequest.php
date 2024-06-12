<?php

namespace App\Http\Requests;

use App\Models\PhoneBook;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdatePhoneBookRequest
 * @package App\Http\Requests
 *
 * @property integer $phone
 * @property string $name
 * @property boolean $is_favorites
 */
class UpdatePhoneBookRequest extends FormRequest
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
            'phone' => 'required|numeric',
            'name' => 'required|min:3',
            'is_favorites' => 'nullable|numeric',
        ];
    }
}
