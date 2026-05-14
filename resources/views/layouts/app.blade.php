<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    display: ['Syne', 'sans-serif'],
                    body: ['DM Sans', 'sans-serif'],
                },
                colors: {
                    ink: '#0D0D0D',
                    slate: '#1A1A2E',
                    panel: '#16213E',
                    accent: '#E8FF47',
                    muted: '#A0A8B8',
                    surface: '#F5F5F0',
                }
            }
        }
    }

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }
</script>
<style>
    * { font-family: 'DM Sans', sans-serif; }

    body {
        background-color: #2A2A2A;
        background-image:
            radial-gradient(circle at 80% 20%, rgba(232,255,71,0.03) 0%, transparent 40%);
    }

    /* Sidebar */
    #sidebar {
        background: #1E1E1E;
        border-right: 1px solid rgba(255,255,255,0.06);
    }

    .nav-logo {
        font-family: 'Syne', sans-serif;
        font-weight: 800;
        letter-spacing: -0.03em;
    }

    .nav-section-label {
        font-size: 0.6rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: #3A3A4A;
        font-weight: 600;
        padding: 0 1rem;
        margin-bottom: 0.25rem;
        margin-top: 1.25rem;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.6rem 0.875rem;
        border-radius: 8px;
        color: #7A7A8A;
        font-size: 0.875rem;
        font-weight: 400;
        transition: all 0.18s ease;
        position: relative;
        text-decoration: none;
        margin-bottom: 1px;
    }

    .nav-link:hover {
        background: rgba(255,255,255,0.05);
        color: #F0F0E8;
    }

    .nav-link.active {
        background: rgba(232,255,71,0.1);
        color: #E8FF47;
    }

    .nav-link.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 20%;
        bottom: 20%;
        width: 3px;
        background: #E8FF47;
        border-radius: 0 4px 4px 0;
    }

    .nav-link .icon {
        width: 16px;
        height: 16px;
        opacity: 0.7;
        flex-shrink: 0;
    }

    .nav-link.active .icon {
        opacity: 1;
    }

    .nav-link.danger {
        color: #FF6B6B;
    }

    .nav-link.danger:hover {
        background: rgba(255,107,107,0.1);
        color: #FF6B6B;
    }

    /* Header */
    header {
        background: rgba(30,30,30,0.95);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(255,255,255,0.06);
    }

    .page-title {
        font-family: 'Syne', sans-serif;
        font-weight: 700;
        letter-spacing: -0.02em;
        color: #F0F0F0;
    }

    /* Avatar */
    .avatar-ring {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: rgba(0,0,0,0.1);
        padding: 2px;
        cursor: pointer;
    }

    .avatar-ring img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    /* Status badge */
    .status-dot {
        width: 7px;
        height: 7px;
        background: #4ADE80;
        border-radius: 50%;
        border: 1.5px solid #1E1E1E;
        position: absolute;
        bottom: 0;
        right: 0;
    }

    /* Mobile toggle */
    .menu-btn {
        width: 36px;
        height: 36px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 5px;
        cursor: pointer;
        border-radius: 8px;
        transition: background 0.15s;
    }

    .menu-btn:hover { background: rgba(255,255,255,0.08); }

    .menu-btn span {
        display: block;
        width: 18px;
        height: 1.5px;
        background: #E0E0E0;
        border-radius: 2px;
        transition: all 0.2s;
    }

    /* Content area */
    main {
        min-height: 0;
    }

    /* Scrollbar */
    ::-webkit-scrollbar { width: 4px; }
    ::-webkit-scrollbar-track { background: transparent; }
    ::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.12); border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: rgba(0,0,0,0.2); }

    /* Mobile overlay */
    #overlay {
        background: rgba(0,0,0,0.5);
        backdrop-filter: blur(2px);
    }

    /* Sidebar scrollbar */
    aside::-webkit-scrollbar { width: 2px; }
    aside::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.08); }

    /* Animate sidebar items on load */
    @keyframes fadeSlideIn {
        from { opacity: 0; transform: translateX(-8px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .nav-link {
        animation: fadeSlideIn 0.3s ease both;
    }

    .nav-link:nth-child(1) { animation-delay: 0.05s; }
    .nav-link:nth-child(2) { animation-delay: 0.1s; }
    .nav-link:nth-child(3) { animation-delay: 0.15s; }
    .nav-link:nth-child(4) { animation-delay: 0.2s; }
    .nav-link:nth-child(5) { animation-delay: 0.25s; }
    .nav-link:nth-child(6) { animation-delay: 0.3s; }
</style>
@livewireStyles
</head>
<body class="bg-surface">

<!-- Mobile Overlay -->
<div id="overlay" class="fixed inset-0 z-40 hidden md:hidden" onclick="toggleSidebar()"></div>

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 w-60 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50 flex flex-col overflow-y-auto">

        <!-- Logo -->
        <div class="flex-shrink-0">
            <div class="flex items-center gap-3 px-5 py-5">
                <div class="w-7 h-7 rounded-lg flex items-center justify-center bg-white bg-opacity-10">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <rect x="1" y="1" width="5" height="5" rx="1" fill="white"/>
                        <rect x="8" y="1" width="5" height="5" rx="1" fill="white"/>
                        <rect x="1" y="8" width="5" height="5" rx="1" fill="white"/>
                        <rect x="8" y="8" width="5" height="5" rx="1" fill="white" opacity="0.35"/>
                    </svg>
                </div>
                <span class="nav-logo text-white text-base">Admin Dashboard</span>
            </div>
            <!-- Yellow accent bar -->
            <div style="height:3px; background: linear-gradient(90deg, #E8FF47 0%, rgba(232,255,71,0.15) 100%); margin: 0 1.25rem; border-radius: 2px;"></div>
        </div>

        <!-- Nav -->
        <nav class="flex-1 px-3 pb-4">

            <p class="nav-section-label">Overview</p>

            <a href="/admin" class="nav-link {{ request()->is('dashboard') || request()->is('/') ? 'active' : '' }}">
                <svg class="icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="1" y="1" width="6" height="6" rx="1.5"/>
                    <rect x="9" y="1" width="6" height="6" rx="1.5"/>
                    <rect x="1" y="9" width="6" height="6" rx="1.5"/>
                    <rect x="9" y="9" width="6" height="6" rx="1.5"/>
                </svg>
                Dashboard
            </a>

            <p class="nav-section-label">Management</p>

            <a href="/user" class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
                <svg class="icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                    <circle cx="8" cy="5" r="3"/>
                    <path d="M2 14c0-3.314 2.686-6 6-6s6 2.686 6 6" stroke-linecap="round"/>
                </svg>
                Users
            </a>

            <a href="/position" class="nav-link {{ request()->is('position*') ? 'active' : '' }}">
                <svg class="icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M3 4h10M3 8h7M3 12h5" stroke-linecap="round"/>
                </svg>
                Position
            </a>

            <a href="/employee" class="nav-link {{ request()->is('employee*') ? 'active' : '' }}">
                <svg class="icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                    <circle cx="6" cy="5" r="2.5"/>
                    <path d="M1 14c0-2.761 2.239-5 5-5" stroke-linecap="round"/>
                    <path d="M11 9v5M9 11l2-2 2 2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Employee
            </a>

            <p class="nav-section-label">Finance & Time</p>

            <a href="/payroll" class="nav-link {{ request()->is('payroll*') ? 'active' : '' }}">
                <svg class="icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="1" y="3" width="14" height="10" rx="1.5"/>
                    <path d="M1 7h14" stroke-linecap="round"/>
                    <circle cx="5" cy="10.5" r="0.75" fill="currentColor"/>
                </svg>
                Payroll
            </a>

            <a href="/admin.attendance" class="nav-link {{ request()->is('admin.attendance*') || request()->is('attendance*') ? 'active' : '' }}">
                <svg class="icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="2" y="3" width="12" height="11" rx="1.5"/>
                    <path d="M11 1v3M5 1v3M2 7h12" stroke-linecap="round"/>
                    <path d="M5.5 10.5l1.5 1.5 3-3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Attendance
            </a>

        </nav>

        <!-- Bottom: user + logout -->
        <div class="px-3 pb-5 border-t border-white border-opacity-5 pt-4">
            <a href="/logout" class="nav-link danger">
                <svg class="icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M6 2H3a1 1 0 00-1 1v10a1 1 0 001 1h3M10 11l3-3-3-3M13 8H6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Logout
            </a>
        </div>
    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col md:ml-60 min-w-0">

        <!-- Header -->
        <header class="sticky top-0 z-30 flex items-center justify-between px-5 py-3.5">

            <!-- Mobile toggle -->
            <button onclick="toggleSidebar()" class="menu-btn md:hidden" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <!-- Page title -->
            <h1 class="page-title text-lg hidden md:block">Dashboard</h1>

            <!-- Right side -->
            <div class="flex items-center gap-3 ml-auto">

                <!-- Notification bell -->
                <button class="relative w-9 h-9 rounded-xl flex items-center justify-center hover:bg-white hover:bg-opacity-8 transition-colors" style="--tw-bg-opacity:0.08;">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" stroke="#A0A0A0" stroke-width="1.5">
                        <path d="M8.5 2a5 5 0 015 5v3l1.5 2h-13L3.5 10V7a5 5 0 015-5z" stroke-linecap="round"/>
                        <path d="M6.5 14a2 2 0 004 0" stroke-linecap="round"/>
                    </svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-400 rounded-full border-2" style="border-color:#1E1E1E;"></span>
                </button>

                <!-- Divider -->
                <div class="w-px h-6 bg-white bg-opacity-10"></div>

                <!-- User -->
                <div class="flex items-center gap-2.5">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs leading-tight font-medium" style="color:#D0D0D0;">{{ Auth::user()->email }}</p>
                        <p class="text-xs leading-tight" style="color:#606060;">Administrator</p>
                    </div>
                    <div class="relative">
                        <div class="avatar-ring">
                            <img src="https://i.pravatar.cc/40" alt="Avatar">
                        </div>
                        <span class="status-dot"></span>
                    </div>
                </div>

            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 overflow-y-auto" style="background:#2A2A2A;">
            @yield('content')
        </main>

    </div>
</div>

@livewireScripts
</body>
</html>