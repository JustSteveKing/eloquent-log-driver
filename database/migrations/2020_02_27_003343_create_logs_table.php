<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogsTable extends Migration {
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('database_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('env');
            $table->string('message', 500);
            $table->enum('level', [
                'DEBUG',
                'INFO',
                'NOTICE',
                'WARNING',
                'ERROR',
                'CRITICAL',
                'ALERT',
                'EMERGENCY'
            ])->default('INFO');
            $table->text('context');
            $table->text('extra');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }
}