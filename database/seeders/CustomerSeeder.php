<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $customers = [
            ['customer_id' => 'CUS-1001', 'full_name' => 'Alyssa Mendoza', 'email' => 'alyssa.mendoza@example.com', 'contact_number' => '+63 917 555 0101', 'address' => 'Quezon City, Metro Manila', 'status' => 'Active'],
            ['customer_id' => 'CUS-1002', 'full_name' => 'Marco Reyes', 'email' => 'marco.reyes@example.com', 'contact_number' => '+63 918 555 0102', 'address' => 'Makati City, Metro Manila', 'status' => 'Active'],
            ['customer_id' => 'CUS-1003', 'full_name' => 'Bianca Santos', 'email' => 'bianca.santos@example.com', 'contact_number' => '+63 919 555 0103', 'address' => 'Pasig City, Metro Manila', 'status' => 'Active'],
            ['customer_id' => 'CUS-1004', 'full_name' => 'Daniel Cruz', 'email' => 'daniel.cruz@example.com', 'contact_number' => '+63 920 555 0104', 'address' => 'Cebu City, Cebu', 'status' => 'Inactive'],
            ['customer_id' => 'CUS-1005', 'full_name' => 'Camille Garcia', 'email' => 'camille.garcia@example.com', 'contact_number' => '+63 921 555 0105', 'address' => 'Taguig City, Metro Manila', 'status' => 'Active'],
            ['customer_id' => 'CUS-1006', 'full_name' => 'Nathan Villanueva', 'email' => 'nathan.villanueva@example.com', 'contact_number' => '+63 922 555 0106', 'address' => 'Davao City, Davao del Sur', 'status' => 'Active'],
            ['customer_id' => 'CUS-1007', 'full_name' => 'Isabel Lim', 'email' => 'isabel.lim@example.com', 'contact_number' => '+63 923 555 0107', 'address' => 'Iloilo City, Iloilo', 'status' => 'Inactive'],
            ['customer_id' => 'CUS-1008', 'full_name' => 'Rafael Navarro', 'email' => 'rafael.navarro@example.com', 'contact_number' => '+63 924 555 0108', 'address' => 'Baguio City, Benguet', 'status' => 'Active'],
        ];

        DB::table('customers')->upsert(
            array_map(fn (array $customer): array => $customer + ['created_at' => $now, 'updated_at' => $now], $customers),
            ['customer_id'],
            ['full_name', 'email', 'contact_number', 'address', 'status', 'updated_at']
        );
    }
}
