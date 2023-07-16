<?php

use App\Models\Core\Element;
use App\Models\Core\ElementSetting;
use App\Models\Core\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('element_settings', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Element::class)
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignIdFor(Setting::class)
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('element_settings');
    }
};
