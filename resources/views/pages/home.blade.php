@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container page-stack">
    <div class="page-intro">
        <div><p class="eyebrow"><span class="eyebrow-line"></span> Workspace overview</p><h1>Good to see you.</h1><p class="intro-copy">A clear view of the people behind your point of sale.</p></div>
        <span class="read-only-note"><span class="note-dot"></span> Demo data · Read only</span>
    </div>

    <section class="hero" aria-labelledby="hero-title">
        <div class="hero-glow hero-glow-one" aria-hidden="true"></div><div class="hero-glow hero-glow-two" aria-hidden="true"></div>
        <div class="hero-content">
            <span class="hero-kicker"><span class="hero-kicker-dot"></span> Welcome to your workspace</span>
            <h2 id="hero-title">Manage people.<br><em>Keep things moving.</em></h2>
            <p>Explore customer and team accounts in a focused POS dashboard built with Laravel's routes, controllers, and Blade views.</p>
            <div class="hero-actions">
                <a class="button button-light" href="{{ route('customers.index') }}">View customers <span aria-hidden="true">↗</span></a>
                <a class="button button-outline-light" href="{{ route('users.index') }}">View team <span aria-hidden="true">→</span></a>
            </div>
        </div>
        <div class="hero-preview" aria-hidden="true">
            <div class="preview-top"><span><i></i><i></i><i></i></span><strong>Account overview</strong><small>LIVE PREVIEW</small></div>
            <div class="preview-body">
                <div class="preview-head"><span>Today at a glance</span><span class="preview-status"><b></b> All systems ready</span></div>
                <div class="preview-number">{{ $customerCount + $userCount }} <small>total accounts</small></div>
                <div class="preview-bars"><span style="width:76%"></span><span style="width:48%"></span><span style="width:61%"></span></div>
                <div class="preview-foot"><span>Customers <strong>{{ $customerCount }}</strong></span><span>Team members <strong>{{ $userCount }}</strong></span></div>
            </div>
        </div>
    </section>

    <section aria-labelledby="overview-title" class="section-block">
        <div class="section-heading"><div><p class="eyebrow">At a glance</p><h2 id="overview-title">Your workspace in numbers</h2></div><p>Counts from the sample account records.</p></div>
        <div class="stats-grid">
            <article class="stat-card"><div class="stat-icon stat-icon-indigo" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.8"/><path d="M3.5 19v-1.5A5.5 5.5 0 0 1 9 12a5.5 5.5 0 0 1 5.5 5.5V19H3.5Z" stroke="currentColor" stroke-width="1.8"/><path d="M16 5.5a3 3 0 0 1 0 5.8M17 13a5 5 0 0 1 3.5 4.8V19H17" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div><span class="stat-label">Total customers</span><strong class="stat-value">{{ $customerCount }}</strong><span class="stat-caption">Customer profiles on record</span><a href="{{ route('customers.index') }}" class="stat-link">View customers <span aria-hidden="true">↗</span></a></article>
            <article class="stat-card"><div class="stat-icon stat-icon-violet" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><rect x="3.5" y="4" width="17" height="16" rx="3" stroke="currentColor" stroke-width="1.8"/><circle cx="9" cy="10" r="2" stroke="currentColor" stroke-width="1.8"/><path d="M6.5 16c.2-1.4 1.1-2.2 2.5-2.2s2.3.8 2.5 2.2M14 9h3.5M14 13h3.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div><span class="stat-label">Total users</span><strong class="stat-value">{{ $userCount }}</strong><span class="stat-caption">People on the POS team</span><a href="{{ route('users.index') }}" class="stat-link">View team <span aria-hidden="true">↗</span></a></article>
            <article class="stat-card"><div class="stat-icon stat-icon-green" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="1.8"/><path d="m8 12 2.5 2.5L16 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><span class="stat-label">Active accounts</span><strong class="stat-value">{{ $activeCount }}</strong><span class="stat-caption">Across customers and users</span><span class="stat-link stat-link-muted">Updated from sample data</span></article>
        </div>
    </section>

    <section aria-labelledby="explore-title" class="section-block bottom-section">
        <div class="section-heading"><div><p class="eyebrow">Explore the platform</p><h2 id="explore-title">Everything in its place</h2></div><p>Four simple pages, one consistent workspace.</p></div>
        <div class="feature-grid">
            <a class="feature-card" href="{{ route('customers.index') }}"><span class="feature-glyph feature-glyph-indigo" aria-hidden="true">◎</span><span><strong>Customer accounts</strong><small>Browse contact details and account status.</small></span><span class="feature-arrow" aria-hidden="true">↗</span></a>
            <a class="feature-card" href="{{ route('users.index') }}"><span class="feature-glyph feature-glyph-violet" aria-hidden="true">▦</span><span><strong>User accounts</strong><small>See team roles and account activity.</small></span><span class="feature-arrow" aria-hidden="true">↗</span></a>
            <a class="feature-card" href="{{ route('about') }}"><span class="feature-glyph feature-glyph-blue" aria-hidden="true">◇</span><span><strong>About this project</strong><small>Learn how Laravel powers the experience.</small></span><span class="feature-arrow" aria-hidden="true">↗</span></a>
        </div>
    </section>
</div>
@endsection
