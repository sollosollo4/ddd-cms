<?php

namespace App\Models\Core;

use App\Models\Core\Element;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    public function elements(): HasMany
    {
        return $this->hasMany(Element::class);
    }
}
