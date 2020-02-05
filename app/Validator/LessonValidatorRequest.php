<?php
declare(strict_types=1);

namespace App\Validator\Request;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LessonValidatorRequest
 * @package App\Validator\Request
 */
class LessonValidatorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'catId' => 'required:numeric|max:5'
        ];
    }
}