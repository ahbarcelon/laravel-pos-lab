@extends('layouts.app')

@section('title', 'Customer Accounts')

@section('content')
<div class="container page-stack">
    <div class="page-intro"><div><p class="eyebrow"><span class="eyebrow-line"></span> Account directory</p><h1>Customer accounts</h1><p class="intro-copy">A simple, searchable view of your customer community.</p></div><span class="read-only-note"><span class="note-dot"></span> Sample records · Read only</span></div>

    <div class="directory-summary"><div class="summary-icon" aria-hidden="true">◎</div><div><span class="summary-label">Total customers</span><strong>{{ count($customers) }}</strong></div><div class="summary-separator"></div><div><span class="summary-label">Active accounts</span><strong>{{ $activeCount }}</strong></div><p>Customer details are stored in a static PHP array for this laboratory activity.</p></div>

    <section class="table-card" aria-labelledby="customer-list-title" data-search-table>
        <div class="table-toolbar"><div><p class="eyebrow">Directory</p><h2 id="customer-list-title">All customers <span class="title-count">{{ count($customers) }}</span></h2><p>Browse the records or filter them by any visible detail.</p></div><div class="search-wrap"><label class="sr-only" for="customer-search">Search customers</label><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="10.8" cy="10.8" r="6.3" stroke="currentColor" stroke-width="1.8"/><path d="m16 16 4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg><input id="customer-search" type="search" placeholder="Search customers..." autocomplete="off" data-search-input></div></div>
        <div class="table-scroll"><table class="account-table"><thead><tr><th scope="col">Customer ID</th><th scope="col">Customer</th><th scope="col">Email address</th><th scope="col">Contact number</th><th scope="col">Address</th><th scope="col">Status</th></tr></thead><tbody>
            @foreach ($customers as $customer)
                <tr data-search-row><td data-label="Customer ID"><span class="record-id">{{ $customer['id'] }}</span></td><td data-label="Customer"><span class="person-cell"><span class="avatar avatar-indigo" aria-hidden="true">{{ strtoupper(substr($customer['name'], 0, 1)) }}</span><strong>{{ $customer['name'] }}</strong></span></td><td data-label="Email"><a class="table-email" href="mailto:{{ $customer['email'] }}">{{ $customer['email'] }}</a></td><td data-label="Contact">{{ $customer['contact'] }}</td><td data-label="Address">{{ $customer['address'] }}</td><td data-label="Status"><span class="status-badge {{ $customer['status'] === 'Active' ? 'status-active' : 'status-inactive' }}"><i aria-hidden="true"></i>{{ $customer['status'] }}</span></td></tr>
            @endforeach
        </tbody></table></div>
        <div class="empty-search" data-search-empty hidden><span class="empty-icon" aria-hidden="true">⌕</span><h3>No customers found</h3><p>Try another name, ID, email, contact number, address, or status.</p></div>
        <div class="table-footer"><span data-search-count role="status" aria-live="polite">Showing {{ count($customers) }} of {{ count($customers) }} customers</span><span>Sample data · No changes are saved</span></div>
    </section>
</div>
@endsection
