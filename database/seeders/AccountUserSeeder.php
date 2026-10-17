<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['user_id' => 'USR-1001', 'full_name' => 'Sofia Delgado', 'email' => 'sofia.delgado@example.com', 'role' => 'Admin', 'status' => 'Active', 'created_at' => '2026-01-12 09:00:00'],
            ['user_id' => 'USR-1002', 'full_name' => 'Paolo Bautista', 'email' => 'paolo.bautista@example.com', 'role' => 'Cashier', 'status' => 'Active', 'created_at' => '2026-02-03 09:00:00'],
            ['user_id' => 'USR-1003', 'full_name' => 'Jasmine Tan', 'email' => 'jasmine.tan@example.com', 'role' => 'Staff', 'status' => 'Active', 'created_at' => '2026-02-18 09:00:00'],
            ['user_id' => 'USR-1004', 'full_name' => 'Luis Fernandez', 'email' => 'luis.fernandez@example.com', 'role' => 'Cashier', 'status' => 'Inactive', 'created_at' => '2026-03-07 09:00:00'],
            ['user_id' => 'USR-1005', 'full_name' => 'Mikaela Ramos', 'email' => 'mikaela.ramos@example.com', 'role' => 'Staff', 'status' => 'Active', 'created_at' => '2026-04-21 09:00:00'],
            ['user_id' => 'USR-1006', 'full_name' => 'Adrian Flores', 'email' => 'adrian.flores@example.com', 'role' => 'Admin', 'status' => 'Active', 'created_at' => '2026-05-15 09:00:00'],
        ];

        DB::table('account_users')->upsert(
            array_map(fn (array $user): array => $user + ['updated_at' => $user['created_at']], $users),
            ['user_id'],
            ['full_name', 'email', 'role', 'status', 'updated_at']
        );
    }
}
