<?php

namespace App\Http\Requests;

use App\Enum\TaskStatus;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'status' => $this->status ?? TaskStatus::New->value,
        ]);
    }

    protected function passedValidation(): void
    {
        $this->merge([
            'date_deadline' => Carbon::make($this->date_deadline)
        ]);
    }


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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => [
                Rule::enum(TaskStatus::class)
            ],
            'date_deadline' => 'required|date_format:d.m.Y H:i',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
            'status' => 'Статус',
            'date_deadline' => 'Дедлайн',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле ":attribute" должно быть заполнено',
            'max' => 'Поле ":attribute" должно быть длиной не более :max',
            'date_format' => 'Поле ":attribute" не соответствует формату дате',
        ];
    }

}
