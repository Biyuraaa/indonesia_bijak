<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreVoteRequest extends FormRequest
{
    protected $model = 'App\Models\Vote';
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'candidate_id' => 'required|exists:candidates,id',
            'voted_at' => 'required|date',
        ];
    }
}
