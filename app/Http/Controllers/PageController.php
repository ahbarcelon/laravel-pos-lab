<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $customers = CustomerController::sampleCustomers();
        $users = UserController::sampleUsers();

        return view('pages.home', [
            'customerCount' => count($customers),
            'userCount' => count($users),
            'activeCount' => count(array_filter($customers, fn (array $customer): bool => $customer['status'] === 'Active'))
                + count(array_filter($users, fn (array $user): bool => $user['status'] === 'Active')),
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }
}
