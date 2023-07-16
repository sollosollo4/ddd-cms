<?php

namespace App\Models\Core;

use App\Models\Core\ElementType;
use App\Models\Core\Section;
use App\Models\Core\Setting;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Element
 * @property int $id
 * @property Carbon $updated_at
 * @property Carbon $created_at
 * @property Carbon $deleted_at
 * @property-read Setting $settings
 * @property ElementType $elementType
 * @property Section $section
 */
class Element extends Model
{
    public function settings(): HasMany
    {
        return $this->hasMany(Setting::class);
    }

    public function elementType(): BelongsTo
    {
        return $this->belongsTo(ElementType::class);
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
