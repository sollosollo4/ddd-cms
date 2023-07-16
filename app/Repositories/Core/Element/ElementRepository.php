<?php

namespace App\Repositories\Core\Element;
use App\Models\Core\Element;
class ElementRepository implements ElementRepositoryContract
{
    public function save(array $data): Element
    {
        $model = new Element($data);
        $model->save();
        
        return $model;
    }
}