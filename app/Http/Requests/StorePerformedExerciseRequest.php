<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerformedExerciseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
  public function rules()
{
    return [
        'training_session_id' => 'required|exists:training_session,id',
        'exercise_type_id' => 'required|exists:exercise_types,id',
        'weight' => 'nullable|numeric|min:0|max:1000', // kg
        'sets' => 'required|integer|min:1|max:100',
        'reps' => 'required|integer|min:1|max:1000',
        'notes' => 'nullable|string|max:2000',
    ];
}

}
