<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMatchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        Hier den check machen ob admin oder nicht
        return $this->user()->isAdministrator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'played_at'=>'date',
            'home-team' => 'string|different:away-team-slug',
            'home-team-goals' => 'numeric|max:20',
            'away-team' => 'string',
            'away-team-goals' => 'numeric|max:20'
        ];
    }
}
