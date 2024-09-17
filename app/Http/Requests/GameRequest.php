<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required','max:255'],
            'developer' => ['required', 'exists:developers,id'],
            'genres' => ['required', 'array'],
            'genres.*' => ['required', 'exists:genres,id'],
        ];
    }
}
