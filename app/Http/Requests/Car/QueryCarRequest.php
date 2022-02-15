<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class QueryCarRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'maker' => 'sometimes',
            'model' => 'sometimes',
            'year' => 'sometimes'
        ];
    }
}