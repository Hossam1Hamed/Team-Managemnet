<?php

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
        if (Schema::hasColumn('users', 'job','image')) {
            Schema::table('users', function (Blueprint $table){
              $table->dropColumn('job');
              $table->dropColumn('image');
           });
       }
       Schema::table('users', function (Blueprint $table) {
        $table->string('job')->nullable();
        $table->text('image')->nullable();
    });
    }

    public function down()
    {
        
    }
    
};
