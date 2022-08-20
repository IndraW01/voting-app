<?php

use App\Models\Admin\Calon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kampanyes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Calon::class, 'calon_id')->unique()->constrained('calons', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('visi');
            $table->text('misi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kampanyes');
    }
};
