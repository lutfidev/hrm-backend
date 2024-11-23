<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //username
            $table->string('username')->unique()->after('id');
            //company id
            $table->unsignedBigInteger('company_id')->after('username');
            //is super admin
            $table->boolean('is_superadmin')->default(false)->after('company_id');
            // role id
            $table->unsignedBigInteger('role_id')->after('is_superadmin');
            // user type
            $table->string('user_type')->after('role_id')->default('employee');
            // login enabled
            $table->boolean('login_enabled')->default(true)->after('user_type');
            // profile image
            $table->string('profile_image')->nullable()->after('login_enabled');
            // string status
            $table->string('status')->default('Enable')->after('profile_image');
            // phone
            $table->string('phone')->nullable()->after('status');
            // address
            $table->text('address')->nullable()->after('phone');
            // department id
            $table->unsignedBigInteger('department_id')->nullable()->after('address');
            // designation id
            $table->unsignedBigInteger('designation_id')->nullable()->after('department_id');
            // shift id
            $table->unsignedBigInteger('shift_id')->nullable()->after('designation_id');

            //foreign keys
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            $table->foreign('shift_id')->references('id')->on('shifts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
