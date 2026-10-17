<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageRoutesTest extends TestCase
{
    public function test_all_four_pages_render_with_working_navigation(): void
    {
        foreach (['/', '/about', '/customers', '/users'] as $path) {
            $this->get($path)
                ->assertOk()
                ->assertSee('href="'.route('home').'"', false)
                ->assertSee('href="'.route('about').'"', false)
                ->assertSee('href="'.route('customers.index').'"', false)
                ->assertSee('href="'.route('users.index').'"', false);
        }
    }

    public function test_dashboard_counts_match_the_static_account_records(): void
    {
        $this->get('/')
            ->assertViewIs('pages.home')
            ->assertViewHas('customerCount', 8)
            ->assertViewHas('userCount', 6)
            ->assertViewHas('activeCount', 11);
    }

    public function test_customer_and_user_lists_do_not_need_a_database_connection(): void
    {
        config()->set('database.default', 'missing-connection');

        $this->get('/customers')
            ->assertOk()
            ->assertViewIs('pages.customers')
            ->assertSee('Alyssa Mendoza')
            ->assertSee('Rafael Navarro');

        $this->get('/users')
            ->assertOk()
            ->assertViewIs('pages.users')
            ->assertSee('Sofia Delgado')
            ->assertSee('Adrian Flores');
    }
}
