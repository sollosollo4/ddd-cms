<?php

use App\Models\Core\Element;
use App\Models\Core\ElementType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create((new ElementType())->getTable(), function(Blueprint $table){
            $table->id();

            $table->string('name');

            $table->foreignIdFor(Element::class)
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
        Schema::dropIfExists((new ElementType())->getTable());
    }
};
