<?php

namespace App\Http\Request\Forms;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseForm extends FormRequest
{
    abstract public function rules(): array;
}
