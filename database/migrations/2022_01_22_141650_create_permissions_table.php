<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('organization_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->tinyInteger('active')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        DB::table('permissions')->insert([
            ['id' => Str::uuid()->toString(), 'title' => 'Create', 'slug' => 'create'],
            ['id' => Str::uuid()->toString(), 'title' => 'Read', 'slug' => 'read'],
            ['id' => Str::uuid()->toString(), 'title' => 'Update', 'slug' => 'update'],
            ['id' => Str::uuid()->toString(), 'title' => 'Delete', 'slug' => 'delete']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
