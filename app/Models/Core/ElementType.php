<?php

namespace App\Models\Core;

use App\Models\Core\Element;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElementType extends Model
{
    public function element(): BelongsTo
    {
        return $this->belongsTo(Element::class);
    }
}
