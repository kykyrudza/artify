<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nameTask' => 'required|min:3|max:255',
            'descriptionTask' => 'required|min:3|max:255',
            'dueDateTask' => 'required|date',
        ];
    }
}
