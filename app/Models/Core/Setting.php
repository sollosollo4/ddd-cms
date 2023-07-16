<?php

namespace App\Models\Core;

use App\Models\Core\Element;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Setting extends Model
{
    public function elements(): BelongsToMany
    {
        return $this->belongsToMany(Element::class);
    }
}
