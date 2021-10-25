<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryIdOnPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //* Definizione della colonna
            // $table->unsignedBigInteger('category_id')->after('id')->nullable();

            //* Definizione della foreign key
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            //| Voglio che mi crei una relazione sulla colonna category_id che fa riferimento alla colonna id della tabella category. Se cancello una categoria metti 'null' sulla categoria

            //# Forma Compatta
            $table->foreignId('category_id')->after('id')->nullable()->onDelete('set null')->constrained();
            //| Possiamo usarla solo se rispettiamo le convenzioni
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //* Eliminiamo il vincolo (foreign key). 'NomeDellaTabella_NomeDellaColonna_NomeDell'Indice'
            $table->dropForeign('posts_category_id_foreign');

            //* Dopo il vincolo si elimina la colonna: 'NomeDellaColonna'
            $table->dropColumn('category_id');
        });
    }
}
