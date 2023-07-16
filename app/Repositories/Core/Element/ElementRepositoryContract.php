<?php

namespace App\Repositories\Core\Element;

use App\Models\Core\Element;

interface ElementRepositoryContract
{
    public function save(array $data): Element;
}
