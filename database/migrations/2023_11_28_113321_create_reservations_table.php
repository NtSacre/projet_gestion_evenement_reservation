<?php

use App\Models\Client;
use App\Models\User;
use App\Models\Evenement;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Client::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Evenement::class)->constrained()->onDelete('cascade');

            $table->integer('nombre_de_place');
            $table->string('reference');
            $table->boolean('is_accepted');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
