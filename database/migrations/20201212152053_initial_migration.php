<?php
declare(strict_types=1);

use MyBot\Migrations\Migration;

final class InitialMigration extends Migration
{
    public function up()
    {
        // Create Users table if not exists
        if (!$this->schema->hasTable('users')){
            $this->schema->create('users', function(Illuminate\Database\Schema\Blueprint $table){
                $table->unsignedBigInteger('user_id')->primary();
                $table->string('local_language',3)->default('en');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
//        $this->schema->drop('users');
    }
}
