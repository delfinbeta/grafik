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
      $table->string('lastname')->after('firstname');
      $table->string('phone')->nullable()->after('lastname');
      $table->text('address')->nullable()->after('phone');
      $table->foreignId('type_id')->nullable()->after('address')->constrained()->onUpdate('cascade')->onDelete('cascade');
      $table->unsignedBigInteger('role_id')->after('type_id');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn('lastname');
      $table->dropColumn('phone');
      $table->dropColumn('address');
      $table->dropColumn('type_id');
      $table->dropColumn('role_id');
    });
  }
};
