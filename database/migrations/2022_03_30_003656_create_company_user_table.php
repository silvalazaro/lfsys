<?php

use App\Models\Register\Company;
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
        Schema::create('company_user', function (Blueprint $table) {
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Company::class);
        });

        Schema::create('company_user_owner', function (Blueprint $table) {
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Company::class);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_user');
        Schema::dropIfExists('company_user_owner');
    }
};
