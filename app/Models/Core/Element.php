<?php

namespace App\Models\Core;
use App\Models\Core\ElementType;
use App\Models\Core\Section;
use App\Models\Core\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Element extends Model
{
    public function settings(): HasMany
    {
        return $this->hasMany(Setting::class);
    }

    public function elementType():BelongsTo
    {
        return $this->belongsTo(ElementType::class);
    }

    public function section():BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}