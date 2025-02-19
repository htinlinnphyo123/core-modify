<?php

use App\Enums\Gender;
use App\Enums\Status;
use App\Enums\MartialStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name_other')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('id_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_name_other')->nullable();
            $table->enum('gender',Gender::toArray())->nullable();
            $table->enum('martial_status',MartialStatus::toArray())->nullable();
            $table->string('education_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('profile_photo')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->string('oauth_id')->nullable();
            $table->string('oauth_provider')->nullable();
            $table->unsignedInteger('level')->default(0);
            $table->enum('status',Status::toArray());
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('name');
            $table->index('email');
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
};
