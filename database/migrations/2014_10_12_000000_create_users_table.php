<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('fname');
            $table->string('rollnumber');
            $table->string('bloodgroup');
            $table->string('address');
            $table->string('mobile_no');
            $table->string('batch');
            $table->string('department');
            $table->string('semester');
            $table->string('profile_image');
            $table->tinyInteger('can_add_donor')->default(0);
            $table->tinyInteger('can_delete_donors')->default(0);
            $table->tinyInteger('can_edit_donors')->default(0);
            $table->tinyInteger('can_send_sms')->default(0);
            $table->tinyInteger('can_promote_users')->default(0);
            $table->tinyInteger('can_answer_chat')->default(0);
            $table->tinyInteger('can_departments')->default(0);
            $table->tinyInteger('can_batches')->default(0);
            $table->tinyInteger('can_add_post')->default(0);
            $table->tinyInteger('can_edit_post')->default(0);
            $table->tinyInteger('can_delete_post')->default(0);
            $table->tinyInteger('is_super_admin')->default(0);
            $table->tinyInteger('is_donor')->default(0);
            $table->tinyInteger('can_change_frontend')->default(0);
            $table->tinyInteger('is_admin_group')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
