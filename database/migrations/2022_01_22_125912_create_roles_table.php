<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('organization_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->tinyInteger('active')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        DB::table('roles')->insert([
            ['id' => Str::uuid()->toString(), 'title' => 'Owner', 'slug' => 'owner'],
            ['id' => Str::uuid()->toString(), 'title' => 'Admin', 'slug' => 'admin'],
            ['id' => Str::uuid()->toString(), 'title' => 'HR', 'slug' => 'hr'],
            ['id' => Str::uuid()->toString(), 'title' => 'Accountant', 'slug' => 'accountant'],
            ['id' => Str::uuid()->toString(), 'title' => 'Manager', 'slug' => 'manager']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
