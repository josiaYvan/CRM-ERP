<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->string("collaborateur");
            $table->string("destinataire");
            $table->integer("nb_jour");
            $table->date("date_debut");
            $table->date("date_retour");
            $table->boolean("maternite")->default(0);
            $table->text("motif");
            $table->integer("validité")->default(0);
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
        Schema::dropIfExists('conges');
    }
}
