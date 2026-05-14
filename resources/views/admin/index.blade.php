@extends('layouts.app')
@section('content')

<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    :root {
        --bg-base:        #1a1b1e;
        --bg-card:        #222428;
        --bg-elevated:    #2a2d32;
        --bg-input:       #2e3138;
        --border:         #3a3e47;
        --border-focus:   #5b6af0;
        --accent:         #5b6af0;
        --accent-hover:   #4a58e0;
        --accent-soft:    rgba(91,106,240,0.15);
        --danger:         #ef4444;
        --danger-soft:    rgba(239,68,68,0.12);
        --success:        #22c55e;
        --success-soft:   rgba(34,197,94,0.12);
        --warning:        #f59e0b;
        --warning-soft:   rgba(245,158,11,0.12);
        --purple:         #7c3aed;
        --purple-soft:    rgba(124,58,237,0.12);
        --text-primary:   #f0f1f3;
        --text-secondary: #9aa0ad;
        --text-muted:     #5e6472;
        --radius:         10px;
        --radius-lg:      14px;
    }

    .dash-wrapper {
        font-family: 'DM Sans', sans-serif;
        background: var(--bg-base);
        min-height: 100vh;
        padding: 2rem;
        color: var(--text-primary);
    }

    /* ── Welcome Banner ── */
    .welcome-banner {
        background: linear-gradient(135deg, #1e2235 0%, #222428 60%, #1e2030 100%);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 1.75rem 2rem;
        margin-bottom: 1.75rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
        position: relative;
        overflow: hidden;
    }
    .welcome-banner::before {
        content: '';
        position: absolute;
        top: -40px; right: -40px;
        width: 180px; height: 180px;
        background: var(--accent-soft);
        border-radius: 50%;
        pointer-events: none;
    }
    .welcome-title {
        font-family: 'Syne', sans-serif;
        font-size: 1.55rem;
        font-weight: 800;
        color: var(--text-primary);
        letter-spacing: -0.02em;
        margin: 0 0 .25rem;
    }
    .welcome-sub {
        font-size: .88rem;
        color: var(--text-secondary);
        margin: 0;
    }
    .welcome-date {
        font-size: .78rem;
        color: var(--text-muted);
        background: var(--bg-elevated);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: .45rem .9rem;
        white-space: nowrap;
    }

    /* ── Stats Grid ── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-bottom: 1.75rem;
    }
    @media(max-width:900px){ .stats-grid{ grid-template-columns:1fr 1fr; } }
    @media(max-width:480px){ .stats-grid{ grid-template-columns:1fr; } }

    .stat-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 1.35rem 1.5rem;
        display: flex;
        flex-direction: column;
        gap: .6rem;
        transition: border-color .2s, transform .2s;
        position: relative;
        overflow: hidden;
    }
    .stat-card:hover { border-color: var(--border-focus); transform: translateY(-2px); }
    .stat-card::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 3px;
        border-radius: 0 0 var(--radius-lg) var(--radius-lg);
    }
    .stat-card.c-blue::after   { background: var(--accent); }
    .stat-card.c-green::after  { background: var(--success); }
    .stat-card.c-amber::after  { background: var(--warning); }
    .stat-card.c-purple::after { background: var(--purple); }

    .stat-icon {
        width: 40px; height: 40px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
    }
    .stat-icon.c-blue   { background: var(--accent-soft);  border: 1px solid rgba(91,106,240,.25); }
    .stat-icon.c-green  { background: var(--success-soft); border: 1px solid rgba(34,197,94,.25); }
    .stat-icon.c-amber  { background: var(--warning-soft); border: 1px solid rgba(245,158,11,.25); }
    .stat-icon.c-purple { background: var(--purple-soft);  border: 1px solid rgba(124,58,237,.25); }

    .stat-label { font-size: .72rem; font-weight: 600; text-transform: uppercase; letter-spacing: .07em; color: var(--text-muted); }
    .stat-value { font-family: 'Syne', sans-serif; font-size: 2rem; font-weight: 800; color: var(--text-primary); letter-spacing: -0.03em; line-height: 1; }
    .stat-sub   { font-size: .78rem; color: var(--text-muted); }
    .stat-sub b { color: var(--text-secondary); }

    /* ── Bottom Grid ── */
    .bottom-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 1rem;
    }
    @media(max-width:1000px){ .bottom-grid{ grid-template-columns:1fr 1fr; } }
    @media(max-width:640px) { .bottom-grid{ grid-template-columns:1fr; } }

    /* ── Card ── */
    .card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
    }
    .card-header {
        padding: 1rem 1.35rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: .75rem;
    }
    .card-title {
        font-family: 'Syne', sans-serif;
        font-size: .82rem;
        font-weight: 700;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: .07em;
        margin: 0;
    }
    .card-body { padding: 1.25rem 1.35rem; }

    /* ── Chart ── */
    .chart-wrap { position: relative; height: 200px; }

    /* ── Activity List ── */
    .activity-list { display: flex; flex-direction: column; }
    .activity-item {
        display: flex;
        align-items: center;
        gap: .85rem;
        padding: .75rem 1.35rem;
        border-bottom: 1px solid var(--border);
        transition: background .15s;
    }
    .activity-item:last-child { border-bottom: none; }
    .activity-item:hover { background: var(--bg-elevated); }
    .activity-avatar {
        width: 34px; height: 34px;
        border-radius: 9px;
        background: var(--accent-soft);
        border: 1px solid rgba(91,106,240,.2);
        display: flex; align-items: center; justify-content: center;
        font-size: .82rem; font-weight: 700; color: var(--accent);
        flex-shrink: 0;
    }
    .activity-name  { font-size: .875rem; font-weight: 500; color: var(--text-primary); }
    .activity-meta  { font-size: .75rem; color: var(--text-muted); margin-top: 1px; }
    .activity-right { margin-left: auto; text-align: right; flex-shrink: 0; }
    .activity-amount{ font-size: .82rem; font-weight: 600; color: var(--success); }
    .activity-date  { font-size: .72rem; color: var(--text-muted); }

    /* ── Badges ── */
    .badge { display:inline-block; border-radius:6px; padding:2px 8px; font-size:.72rem; font-weight:600; }
    .badge-blue   { background:var(--accent-soft); color:var(--accent); border:1px solid rgba(91,106,240,.25); }
    .badge-green  { background:var(--success-soft); color:var(--success); border:1px solid rgba(34,197,94,.25); }
    .badge-amber  { background:var(--warning-soft); color:var(--warning); border:1px solid rgba(245,158,11,.25); }
    .badge-purple { background:var(--purple-soft); color:#c4b5fd; border:1px solid rgba(124,58,237,.25); }
    .badge-red    { background:var(--danger-soft); color:var(--danger); border:1px solid rgba(239,68,68,.25); }

    /* ── Position list ── */
    .pos-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: .7rem 1.35rem;
        border-bottom: 1px solid var(--border);
        transition: background .15s;
    }
    .pos-item:last-child { border-bottom: none; }
    .pos-item:hover { background: var(--bg-elevated); }
    .pos-name { font-size: .875rem; font-weight: 500; color: var(--text-primary); }
    .pos-count { font-size: .78rem; color: var(--text-muted); }
    .pos-bar-wrap { width: 80px; height: 6px; background: var(--bg-elevated); border-radius: 99px; overflow: hidden; }
    .pos-bar { height: 100%; border-radius: 99px; background: var(--accent); }

    /* ── Attendance badge ── */
    .att-dot { display:inline-flex; align-items:center; gap:.35rem; font-size:.72rem; font-weight:600; letter-spacing:.06em; text-transform:uppercase; }
    .att-dot::before { content:''; width:5px; height:5px; border-radius:50%; background:currentColor; }
    .att-hadir  { color:#4ade80; }
    .att-alpha  { color:#f87171; }
    .att-izin   { color:#a3e635; }
    .att-sakit  { color:#facc15; }
</style>

<div class="dash-wrapper">

    {{-- Welcome Banner --}}
    <div class="welcome-banner">
        <div>
            <h1 class="welcome-title">Admin Dashboard 👋</h1>
            <p class="welcome-sub">Welcome back, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>! Here's what's happening today.</p>
        </div>
        <div class="welcome-date">
            📅 {{ now()->translatedFormat('l, d F Y') }}
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="stats-grid">

        {{-- Total Users --}}
        <div class="stat-card c-blue">
            <div style="display:flex; align-items:center; justify-content:space-between;">
                <span class="stat-label">Total Users</span>
                <div class="stat-icon c-blue">👥</div>
            </div>
            <div class="stat-value">{{ $totalUsers ?? \App\Models\User::count() }}</div>
            <div class="stat-sub">Pengguna terdaftar di sistem</div>
        </div>

        {{-- Total Employees --}}
        <div class="stat-card c-green">
            <div style="display:flex; align-items:center; justify-content:space-between;">
                <span class="stat-label">Total Pegawai</span>
                <div class="stat-icon c-green">🏢</div>
            </div>
            <div class="stat-value">{{ $totalEmployees ?? \App\Models\Employee::count() }}</div>
            <div class="stat-sub"><b>{{ $totalPositions ?? \App\Models\Position::count() }}</b> posisi tersedia</div>
        </div>

        {{-- Total Payroll --}}
        <div class="stat-card c-amber">
            <div style="display:flex; align-items:center; justify-content:space-between;">
                <span class="stat-label">Total Payroll</span>
                <div class="stat-icon c-amber">💰</div>
            </div>
            <div class="stat-value">{{ $totalPayrolls ?? \App\Models\Payroll::count() }}</div>
            <div class="stat-sub">Rp <b>{{ number_format($totalNetSalary ?? \App\Models\Payroll::sum('net_salary'), 0, ',', '.') }}</b> total net</div>
        </div>

        {{-- Attendance Today --}}
        <div class="stat-card c-purple">
            <div style="display:flex; align-items:center; justify-content:space-between;">
                <span class="stat-label">Hadir Hari Ini</span>
                <div class="stat-icon c-purple">📅</div>
            </div>
            <div class="stat-value">{{ $hadirToday ?? \App\Models\Attendance::whereDate('date', today())->where('status','Hadir')->count() }}</div>
            <div class="stat-sub">dari <b>{{ $totalEmployees ?? \App\Models\Employee::count() }}</b> pegawai</div>
        </div>

    </div>

    {{-- Bottom Grid --}}
    <div class="bottom-grid">

        {{-- Chart: Payroll per bulan --}}
        <div class="card" style="grid-column: span 2;">
            <div class="card-header">
                <p class="card-title">📊 Net Salary per Bulan</p>
                <span class="badge badge-blue">{{ now()->year }}</span>
            </div>
            <div class="card-body">
                <div class="chart-wrap">
                    <canvas id="payrollChart"></canvas>
                </div>
            </div>
        </div>

        {{-- Attendance Today breakdown --}}
        <div class="card">
            <div class="card-header">
                <p class="card-title">📋 Absensi Hari Ini</p>
                <span class="badge badge-green">{{ today()->format('d M') }}</span>
            </div>
            <div class="card-body">
                <div class="chart-wrap" style="height:160px;">
                    <canvas id="attChart"></canvas>
                </div>
                @php
                    $attToday    = \App\Models\Attendance::whereDate('date', today())->get();
                    $cHadir      = $attToday->where('status','Hadir')->count();
                    $cIzin       = $attToday->where('status','Izin')->count();
                    $cSakit      = $attToday->where('status','Sakit')->count();
                    $cAlpha      = $attToday->whereIn('status',['Alpha','Alfa'])->count();
                @endphp
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:.5rem; margin-top:1rem;">
                    <div style="display:flex; align-items:center; justify-content:space-between; background:var(--bg-elevated); border-radius:8px; padding:.5rem .75rem;">
                        <span class="att-dot att-hadir">Hadir</span>
                        <strong style="font-size:.88rem; color:#4ade80;">{{ $cHadir }}</strong>
                    </div>
                    <div style="display:flex; align-items:center; justify-content:space-between; background:var(--bg-elevated); border-radius:8px; padding:.5rem .75rem;">
                        <span class="att-dot att-alpha">Alpha</span>
                        <strong style="font-size:.88rem; color:#f87171;">{{ $cAlpha }}</strong>
                    </div>
                    <div style="display:flex; align-items:center; justify-content:space-between; background:var(--bg-elevated); border-radius:8px; padding:.5rem .75rem;">
                        <span class="att-dot att-izin">Izin</span>
                        <strong style="font-size:.88rem; color:#a3e635;">{{ $cIzin }}</strong>
                    </div>
                    <div style="display:flex; align-items:center; justify-content:space-between; background:var(--bg-elevated); border-radius:8px; padding:.5rem .75rem;">
                        <span class="att-dot att-sakit">Sakit</span>
                        <strong style="font-size:.88rem; color:#facc15;">{{ $cSakit }}</strong>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent Payroll --}}
        <div class="card" style="grid-column: span 2;">
            <div class="card-header">
                <p class="card-title">💸 Payroll Terbaru</p>
                <span class="badge badge-amber">5 terakhir</span>
            </div>
            <div class="activity-list">
                @php $recentPayrolls = \App\Models\Payroll::with('employee.user')->latest()->take(5)->get(); @endphp
                @forelse($recentPayrolls as $p)
                <div class="activity-item">
                    <div class="activity-avatar">{{ strtoupper(substr($p->employee->user->name ?? '?', 0, 1)) }}</div>
                    <div>
                        <div class="activity-name">{{ $p->employee->user->name ?? '—' }}</div>
                        <div class="activity-meta">{{ $p->employee->position->name ?? '—' }} &middot; Periode {{ $p->period }}</div>
                    </div>
                    <div class="activity-right">
                        <div class="activity-amount">Rp {{ number_format($p->net_salary, 0, ',', '.') }}</div>
                        <div class="activity-date">
                            @if($p->allowance > 0)<span style="color:#4ade80; font-size:.7rem;">+{{ number_format($p->allowance,0,',','.') }}</span>@endif
                            @if($p->deduction > 0)<span style="color:#f87171; font-size:.7rem; margin-left:4px;">-{{ number_format($p->deduction,0,',','.') }}</span>@endif
                        </div>
                    </div>
                </div>
                @empty
                <div style="padding:2rem; text-align:center; color:var(--text-muted); font-size:.875rem;">
                    <div style="font-size:1.75rem; margin-bottom:.5rem;">💸</div>
                    Belum ada data payroll
                </div>
                @endforelse
            </div>
        </div>

        {{-- Employees per Position --}}
        <div class="card">
            <div class="card-header">
                <p class="card-title">🏷 Pegawai per Posisi</p>
            </div>
            @php
                $posStats = \App\Models\Position::withCount('employees')->orderByDesc('employees_count')->get();
                $maxCount = $posStats->max('employees_count') ?: 1;
            @endphp
            <div class="activity-list">
                @forelse($posStats as $pos)
                <div class="pos-item">
                    <div>
                        <div class="pos-name">{{ $pos->name }}</div>
                        <div class="pos-count">{{ $pos->employees_count }} pegawai</div>
                    </div>
                    <div style="display:flex; align-items:center; gap:.75rem;">
                        <div class="pos-bar-wrap">
                            <div class="pos-bar" style="width:{{ $maxCount > 0 ? ($pos->employees_count / $maxCount * 100) : 0 }}%;"></div>
                        </div>
                        <span class="badge badge-blue">{{ $pos->employees_count }}</span>
                    </div>
                </div>
                @empty
                <div style="padding:2rem; text-align:center; color:var(--text-muted); font-size:.875rem;">
                    <div style="font-size:1.75rem; margin-bottom:.5rem;">🏷</div>
                    Belum ada posisi
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>

<script>
    // ── Payroll Chart (bar per month) ──────────────────────────────────────
    @php
        $payrollByMonth = \App\Models\Payroll::selectRaw("CAST(strftime('%m', period) AS INTEGER) as month, SUM(net_salary) as total")
            ->whereRaw("strftime('%Y', period) = ?", [now()->year])
            ->groupByRaw("strftime('%m', period)")
            ->orderByRaw("strftime('%m', period)")
            ->pluck('total', 'month');

        $months    = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
        $chartData = [];
        for ($m = 1; $m <= 12; $m++) {
            $chartData[] = (int) ($payrollByMonth[$m] ?? 0);
        }
    @endphp

    const payrollCtx = document.getElementById('payrollChart').getContext('2d');
    new Chart(payrollCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: 'Net Salary',
                data: {!! json_encode($chartData) !!},
                backgroundColor: 'rgba(91,106,240,0.25)',
                borderColor: '#5b6af0',
                borderWidth: 2,
                borderRadius: 6,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#222428',
                    borderColor: '#3a3e47',
                    borderWidth: 1,
                    titleColor: '#f0f1f3',
                    bodyColor: '#9aa0ad',
                    callbacks: {
                        label: ctx => ' Rp ' + ctx.parsed.y.toLocaleString('id-ID')
                    }
                }
            },
            scales: {
                x: { grid: { color: '#2a2d32' }, ticks: { color: '#5e6472', font: { size: 11 } } },
                y: { grid: { color: '#2a2d32' }, ticks: { color: '#5e6472', font: { size: 11 }, callback: v => 'Rp ' + (v/1000000).toFixed(1) + 'M' } }
            }
        }
    });

    // ── Attendance Doughnut ────────────────────────────────────────────────
    const attCtx = document.getElementById('attChart').getContext('2d');
    new Chart(attCtx, {
        type: 'doughnut',
        data: {
            labels: ['Hadir','Alpha','Izin','Sakit'],
            datasets: [{
                data: [{{ $cHadir }}, {{ $cAlpha }}, {{ $cIzin }}, {{ $cSakit }}],
                backgroundColor: ['rgba(74,222,128,.25)','rgba(248,113,113,.25)','rgba(163,230,53,.25)','rgba(250,204,21,.25)'],
                borderColor:     ['#4ade80','#f87171','#a3e635','#facc15'],
                borderWidth: 2,
                hoverOffset: 6,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#222428',
                    borderColor: '#3a3e47',
                    borderWidth: 1,
                    titleColor: '#f0f1f3',
                    bodyColor: '#9aa0ad',
                }
            }
        }
    });
</script>

@endsection