<?php
namespace App\Http\Request\Forms;

use Illuminate\Foundation\Http\FormRequest;
abstract class BaseForm extends FormRequest
{
    public abstract function rules(): array;
}