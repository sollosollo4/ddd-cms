<?php

namespace App\Services\Core\CRUD\DataTransferObjects;
use App\Contracts\DataContract;
use Carbon\Carbon;

class ElementCreateData extends DataContract
{
    public function __construct(
        public int $id,
        public Carbon $created_at,
        public Carbon $updated_at
    ) {

    }
}