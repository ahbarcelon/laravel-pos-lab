<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    /**
     * Temporary sample data for TFA5. The page never queries a database.
     *
     * @return array<int, array{id: string, name: string, email: string, role: string, status: string, created_at: string}>
     */
    public static function sampleUsers(): array
    {
        return [
            ['id' => 'USR-1001', 'name' => 'Sofia Delgado', 'email' => 'sofia.delgado@example.com', 'role' => 'Admin', 'status' => 'Active', 'created_at' => '2026-01-12'],
            ['id' => 'USR-1002', 'name' => 'Paolo Bautista', 'email' => 'paolo.bautista@example.com', 'role' => 'Cashier', 'status' => 'Active', 'created_at' => '2026-02-03'],
            ['id' => 'USR-1003', 'name' => 'Jasmine Tan', 'email' => 'jasmine.tan@example.com', 'role' => 'Staff', 'status' => 'Active', 'created_at' => '2026-02-18'],
            ['id' => 'USR-1004', 'name' => 'Luis Fernandez', 'email' => 'luis.fernandez@example.com', 'role' => 'Cashier', 'status' => 'Inactive', 'created_at' => '2026-03-07'],
            ['id' => 'USR-1005', 'name' => 'Mikaela Ramos', 'email' => 'mikaela.ramos@example.com', 'role' => 'Staff', 'status' => 'Active', 'created_at' => '2026-04-21'],
            ['id' => 'USR-1006', 'name' => 'Adrian Flores', 'email' => 'adrian.flores@example.com', 'role' => 'Admin', 'status' => 'Active', 'created_at' => '2026-05-15'],
        ];
    }

    public function index(): View
    {
        $users = self::sampleUsers();

        return view('pages.users', [
            'users' => $users,
            'activeCount' => count(array_filter($users, fn (array $user): bool => $user['status'] === 'Active')),
        ]);
    }
}
