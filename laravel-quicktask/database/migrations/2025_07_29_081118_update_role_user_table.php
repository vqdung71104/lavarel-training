<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Đổi tên bảng
        Schema::rename('role_user_pivot', 'role_user');

        // Thêm cột mới
        Schema::table('role_user', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn(['role_id', 'user_id']);
        });

        // Khôi phục tên bảng cũ (nếu rollback)
        Schema::rename('role_user', 'role_user_pivot');
    }
};