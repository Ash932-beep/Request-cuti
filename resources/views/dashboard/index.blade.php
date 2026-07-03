@extends('layouts.app')

@section('content')

<style>
    .hrms-wrapper {
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        color: #e2e8f0;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 25px;
    }

    .dashboard-title {
        font-size: 26px;
        font-weight: 700;
        margin: 0;
        color: #f1f5f9;
    }

    .dashboard-subtitle {
        font-size: 14px;
        color: #94a3b8;
        margin-top: 4px;
    }

    /* Welcome box */
    .welcome-box {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        padding: 20px 24px;
        border-radius: 14px;
        border: 1px solid #334155;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 25px;
    }

    .welcome-info p {
        margin: 4px 0;
        color: #cbd5e1;
        font-size: 14px;
    }

    .welcome-info strong {
        color: #f8fafc;
    }

    .role-badge {
        display: inline-block;
        background: rgba(244, 63, 94, 0.15);
        color: #fb7185;
        padding: 2px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .btn-logout {
        background: #dc2626;
        color: white;
        padding: 9px 16px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.2s ease, transform 0.1s ease;
    }

    .btn-logout:hover {
        background: #b91c1c;
        transform: translateY(-1px);
    }

    /* Stat cards */
    .card-row {
        display: flex;
        gap: 15px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }

    .card {
        flex: 1;
        min-width: 180px;
        background: #1e293b;
        padding: 20px;
        border-radius: 14px;
        border: 1px solid #334155;
        transition: transform 0.15s ease, border-color 0.15s ease;
    }

    .card:hover {
        transform: translateY(-2px);
        border-color: #475569;
    }

    .card-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        margin-bottom: 12px;
    }

    .card h3 {
        font-size: 28px;
        font-weight: 700;
        margin: 0 0 4px 0;
        color: #f8fafc;
    }

    .card p {
        margin: 0;
        color: #94a3b8;
        font-size: 13px;
    }

    .card.pending .card-icon { background: rgba(234, 179, 8, 0.15); color: #eab308; }
    .card.pending h3 { color: #eab308; }

    .card.approved .card-icon { background: rgba(34, 197, 94, 0.15); color: #22c55e; }
    .card.approved h3 { color: #22c55e; }

    .card.rejected .card-icon { background: rgba(244, 63, 94, 0.15); color: #f43f5e; }
    .card.rejected h3 { color: #f43f5e; }

    /* Quick actions */
    .quick-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 11px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: background 0.2s ease, transform 0.1s ease;
    }

    .btn-primary {
        background: #f43f5e;
        color: white;
    }

    .btn-primary:hover {
        background: #e11d48;
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: #334155;
        color: #e2e8f0;
    }

    .btn-secondary:hover {
        background: #475569;
        transform: translateY(-1px);
    }

    @media (max-width: 640px) {
        .card-row { flex-direction: column; }
        .welcome-box { flex-direction: column; align-items: flex-start; }
    }
</style>

<div class="hrms-wrapper">

    <div class="dashboard-header">
        <div>
            <h2 class="dashboard-title">HRMS Dashboard</h2>
            <p class="dashboard-subtitle">Overview of leave activity and quick actions</p>
        </div>
    </div>

    <!-- WELCOME -->
    <div class="welcome-box">
        <div class="welcome-info">
            <p>Welcome back, <strong>{{ Auth::user()->name }}</strong> 👋</p>
            <p>Role: <span class="role-badge">{{ ucfirst(Auth::user()->role) }}</span></p>
        </div>

        <form action="/logout" method="POST">
            @csrf
            <button class="btn-logout">Logout</button>
        </form>
    </div>

    @php
        use App\Models\LeaveRequest;

        $pending = LeaveRequest::where('status', 'Pending')->count();
        $approved = LeaveRequest::where('status', 'Approved')->count();
        $rejected = LeaveRequest::where('status', 'Rejected')->count();
    @endphp

    <!-- STATS -->
    <div class="card-row">

        <div class="card pending">
            <div class="card-icon">⏳</div>
            <h3>{{ $pending }}</h3>
            <p>Pending Leave</p>
        </div>

        <div class="card approved">
            <div class="card-icon">✅</div>
            <h3>{{ $approved }}</h3>
            <p>Approved Leave</p>
        </div>

        <div class="card rejected">
            <div class="card-icon">❌</div>
            <h3>{{ $rejected }}</h3>
            <p>Rejected Leave</p>
        </div>

    </div>

    <!-- QUICK ACTIONS -->
    <div class="quick-actions">
        <a href="/leave/create" class="btn-action btn-primary">+ Apply Leave</a>
        <a href="/leave" class="btn-action btn-secondary">📋 View All Requests</a>
    </div>

</div>

@endsection