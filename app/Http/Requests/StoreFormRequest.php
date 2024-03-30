<?php

namespace App\Http\Requests;

use Illuminate\Support\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Closure;

class StoreFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // $new_date1 = Carbon::parse($this->date_from)->addDays(7);
        // $new_date1 = $new_date1->format('Y-m-d');
        // $new_date2 = Carbon::parse($this->date_from)->addDays(14);
        // $new_date2 = $new_date2->format('Y-m-d');
        // $new_date3 = Carbon::parse($this->date_from)->addDays(21);
        // $new_date3 = $new_date3->format('Y-m-d');

        // $new_date2->toDateString();
        // $new_date3->toDateString();

        // dd($new_date1);
        return [
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'date_from' => 'required|date|date_format:Y-m-d',
            'date_to' => [
                'required',
                'date',
                // function (string $attribute, mixed $value, Closure $fail) use ($new_date1, $new_date2, $new_date3) {
                //     if ($value != $new_date1 && $value != $new_date2 && $value != $new_date3) {
                //         $fail("The Freezing End Date should be ( {$new_date1} ) or ( {$new_date2} ) or ( {$new_date3} ).");
                //     }
                // },
            ],
        ];
    }
}
