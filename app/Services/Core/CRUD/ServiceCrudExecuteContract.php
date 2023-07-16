<?php

namespace App\Services\Core\CRUD;

use App\Contracts\DataContract;
use App\Http\Request\Forms\BaseForm;

interface ServiceCrudExecuteContract
{
    public function execute(BaseForm $request): DataContract;
}
