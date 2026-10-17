<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class CustomerController extends Controller
{
    /**
     * Temporary sample data for TFA5. The page never queries a database.
     *
     * @return array<int, array{id: string, name: string, email: string, contact: string, address: string, status: string}>
     */
    public static function sampleCustomers(): array
    {
        return [
            ['id' => 'CUS-1001', 'name' => 'Alyssa Mendoza', 'email' => 'alyssa.mendoza@example.com', 'contact' => '+63 917 555 0101', 'address' => 'Quezon City, Metro Manila', 'status' => 'Active'],
            ['id' => 'CUS-1002', 'name' => 'Marco Reyes', 'email' => 'marco.reyes@example.com', 'contact' => '+63 918 555 0102', 'address' => 'Makati City, Metro Manila', 'status' => 'Active'],
            ['id' => 'CUS-1003', 'name' => 'Bianca Santos', 'email' => 'bianca.santos@example.com', 'contact' => '+63 919 555 0103', 'address' => 'Pasig City, Metro Manila', 'status' => 'Active'],
            ['id' => 'CUS-1004', 'name' => 'Daniel Cruz', 'email' => 'daniel.cruz@example.com', 'contact' => '+63 920 555 0104', 'address' => 'Cebu City, Cebu', 'status' => 'Inactive'],
            ['id' => 'CUS-1005', 'name' => 'Camille Garcia', 'email' => 'camille.garcia@example.com', 'contact' => '+63 921 555 0105', 'address' => 'Taguig City, Metro Manila', 'status' => 'Active'],
            ['id' => 'CUS-1006', 'name' => 'Nathan Villanueva', 'email' => 'nathan.villanueva@example.com', 'contact' => '+63 922 555 0106', 'address' => 'Davao City, Davao del Sur', 'status' => 'Active'],
            ['id' => 'CUS-1007', 'name' => 'Isabel Lim', 'email' => 'isabel.lim@example.com', 'contact' => '+63 923 555 0107', 'address' => 'Iloilo City, Iloilo', 'status' => 'Inactive'],
            ['id' => 'CUS-1008', 'name' => 'Rafael Navarro', 'email' => 'rafael.navarro@example.com', 'contact' => '+63 924 555 0108', 'address' => 'Baguio City, Benguet', 'status' => 'Active'],
        ];
    }

    public function index(): View
    {
        $customers = self::sampleCustomers();

        return view('pages.customers', [
            'customers' => $customers,
            'activeCount' => count(array_filter($customers, fn (array $customer): bool => $customer['status'] === 'Active')),
        ]);
    }
}
