// packages/niharb/my-form/database/migrations/2025_07_22_000001_create_my_form_entries_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyFormEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_form_entries', function (Blueprint $table) {
            $table->id();
            $table->string('field1');
            $table->string('field2');
            $table->text('field3')->nullable();
            $table->integer('field4');
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
        Schema::dropIfExists('my_form_entries');
    }
}