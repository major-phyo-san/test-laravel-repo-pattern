<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCarRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [];
    }
}