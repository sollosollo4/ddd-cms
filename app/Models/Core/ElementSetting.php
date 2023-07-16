<?php

namespace App\Models\Core;

use App\Models\Core\Element;
use App\Models\Core\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElementSetting extends Model
{
    public function element(): BelongsTo
    {
        return $this->belongsTo(Element::class);
    }

    public function setting(): BelongsTo
    {
        return $this->belongsTo(Setting::class);
    }
}
