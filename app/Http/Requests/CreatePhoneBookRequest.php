<?php

namespace App\Http\Requests;

use App\Models\PhoneBook;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreatePhoneBookRequest
 * @package App\Http\Requests
 *
 * @property integer $phone
 * @property string $name
 */
class CreatePhoneBookRequest extends FormRequest
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
        ];
    }
}
