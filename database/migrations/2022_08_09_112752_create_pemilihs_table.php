<?php

use App\Models\User;
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
        Schema::create('pemilihs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->unique()->constrained('users', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nama', 50);
            $table->string('nim', 12)->unique();
            $table->string('angkatan', 50);
            $table->string('kelas', 100);
            $table->string('foto_pemilih');
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
        Schema::dropIfExists('pemilihs');
    }
};
