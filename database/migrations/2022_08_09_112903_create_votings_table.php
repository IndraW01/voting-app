<?php

use App\Models\Admin\Calon;
use App\Models\Admin\Pemilih;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pemilih::class, 'pemilih_id')->unique()->constrained('pemilihs', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(Calon::class, 'calon_id')->constrained('calons', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votings');
    }
};
