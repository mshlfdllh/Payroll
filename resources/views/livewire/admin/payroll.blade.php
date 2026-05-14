<div class="payroll-wrapper">

    {{-- SweetAlert2 CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-base:      #1a1b1e;
            --bg-card:      #222428;
            --bg-elevated:  #2a2d32;
            --bg-input:     #2e3138;
            --border:       #3a3e47;
            --border-focus: #5b6af0;
            --accent:       #5b6af0;
            --accent-hover: #4a58e0;
            --accent-soft:  rgba(91, 106, 240, 0.15);
            --danger:       #ef4444;
            --danger-soft:  rgba(239, 68, 68, 0.12);
            --success:      #22c55e;
            --warning:      #f59e0b;
            --text-primary: #f0f1f3;
            --text-secondary: #9aa0ad;
            --text-muted:   #5e6472;
            --radius:       10px;
            --radius-lg:    14px;
        }

        .payroll-wrapper {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg-base);
            min-height: 100vh;
            padding: 2rem;
            color: var(--text-primary);
        }

        /* ── Header ── */
        .page-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .page-header-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            background: var(--accent-soft);
            border: 1px solid var(--border-focus);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.25rem;
        }
        .page-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -0.02em;
            margin: 0;
        }
        .page-subtitle {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin: 0;
        }

        /* ── Alerts ── */
        .alert-error {
            background: rgba(239,68,68,.08);
            border: 1px solid rgba(239,68,68,.3);
            border-radius: var(--radius);
            padding: 0.75rem 1rem;
            margin-bottom: 1.25rem;
        }
        .alert-error li {
            color: #f87171;
            font-size: 0.85rem;
            list-style: none;
        }
        .alert-success {
            background: rgba(34,197,94,.08);
            border: 1px solid rgba(34,197,94,.3);
            border-radius: var(--radius);
            padding: 0.75rem 1rem;
            margin-bottom: 1.25rem;
            color: #4ade80;
            font-weight: 500;
            font-size: 0.88rem;
        }

        /* ── Card ── */
        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 1.75rem;
            margin-bottom: 1.5rem;
        }
        .card-title {
            font-family: 'Syne', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin: 0 0 1.25rem;
        }

        /* ── Form ── */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        @media (max-width: 640px) {
            .form-grid { grid-template-columns: 1fr; }
        }
        .form-group { display: flex; flex-direction: column; gap: 0.4rem; }
        .form-group.full { grid-column: 1 / -1; }

        label {
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            background: var(--bg-input);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            color: var(--text-primary);
            padding: 0.6rem 0.85rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            width: 100%;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
            appearance: none;
        }
        input:focus, select:focus {
            border-color: var(--border-focus);
            box-shadow: 0 0 0 3px var(--accent-soft);
        }
        input::placeholder { color: var(--text-muted); }
        select option { background: var(--bg-elevated); color: var(--text-primary); }

        /* ── Buttons ── */
        .btn {
            display: inline-flex; align-items: center; gap: 0.45rem;
            padding: 0.6rem 1.2rem;
            border-radius: var(--radius);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.88rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all 0.18s;
            white-space: nowrap;
        }
        .btn-primary {
            background: var(--accent);
            color: #fff;
        }
        .btn-primary:hover { background: var(--accent-hover); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(91,106,240,.35); }

        .btn-update {
            background: #7c3aed;
            color: #fff;
        }
        .btn-update:hover { background: #6d28d9; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(124,58,237,.35); }

        .btn-danger {
            background: var(--danger-soft);
            color: var(--danger);
            border: 1px solid rgba(239,68,68,.25);
            padding: 0.45rem 0.9rem;
            font-size: 0.8rem;
        }
        .btn-danger:hover { background: rgba(239,68,68,.22); }

        .btn-edit {
            background: var(--accent-soft);
            color: var(--accent);
            border: 1px solid rgba(91,106,240,.25);
            padding: 0.45rem 0.9rem;
            font-size: 0.8rem;
        }
        .btn-edit:hover { background: rgba(91,106,240,.25); }

        .btn-clear {
            background: rgba(245,158,11,.1);
            color: var(--warning);
            border: 1px solid rgba(245,158,11,.25);
            padding: 0.45rem 0.9rem;
            font-size: 0.8rem;
        }
        .btn-clear:hover { background: rgba(245,158,11,.2); }

        .form-actions { display: flex; align-items: center; gap: 0.75rem; margin-top: 0.5rem; }

        /* ── Search ── */
        .search-bar {
            position: relative;
            margin-bottom: 1.25rem;
        }
        .search-bar svg {
            position: absolute;
            left: 0.85rem; top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            pointer-events: none;
        }
        .search-bar input {
            padding-left: 2.5rem;
        }

        /* ── Table ── */
        .table-wrap {
            overflow-x: auto;
            border-radius: var(--radius);
            border: 1px solid var(--border);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }
        thead {
            background: var(--bg-elevated);
        }
        thead th {
            padding: 0.75rem 1rem;
            color: var(--text-muted);
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            white-space: nowrap;
            text-align: left;
        }
        tbody tr {
            border-top: 1px solid var(--border);
            transition: background 0.15s;
        }
        tbody tr:hover { background: var(--bg-elevated); }
        tbody td {
            padding: 0.75rem 1rem;
            color: var(--text-primary);
            white-space: nowrap;
        }
        .badge-period {
            display: inline-block;
            background: var(--accent-soft);
            color: var(--accent);
            border: 1px solid rgba(91,106,240,.2);
            border-radius: 6px;
            padding: 0.2rem 0.55rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .net-salary {
            font-weight: 700;
            color: var(--success);
        }
        .action-group { display: flex; gap: 0.45rem; align-items: center; }

        /* SweetAlert custom dark theme overrides */
        .swal-dark-popup {
            background: var(--bg-card) !important;
            color: var(--text-primary) !important;
            border: 1px solid var(--border) !important;
            border-radius: var(--radius-lg) !important;
            font-family: 'DM Sans', sans-serif !important;
        }
        .swal-dark-title { color: var(--text-primary) !important; font-family: 'Syne', sans-serif !important; }
        .swal-dark-content { color: var(--text-secondary) !important; }

        /* Calendar container */
        .flatpickr-calendar {
            background: #1f232b !important;
            border: 1px solid #343a46 !important;
            border-radius: 16px !important;
            box-shadow: 0 10px 40px rgba(0,0,0,.45) !important;
            overflow: hidden;
            font-family: 'DM Sans', sans-serif;
        }

        /* Month header */
        .flatpickr-months {
            background: linear-gradient(135deg, #808398, #39383c);
            padding: 10px 0;
        }

        .flatpickr-current-month {
            color: white !important;
            font-weight: 700;
        }

        .flatpickr-prev-month svg,
        .flatpickr-next-month svg {
            fill: white !important;
        }

        /* Weekdays */
        .flatpickr-weekdays {
            background: #262b33;
        }

        .flatpickr-weekday {
            color: #9aa0ad !important;
            font-weight: 600;
        }

        /* Days */
        .flatpickr-day {
            color: #f0f1f3;
            border-radius: 10px;
            transition: all .15s ease;
        }

        /* Hover */
        .flatpickr-day:hover {
            background: rgba(91,106,240,.2);
            color: white;
        }

        /* Selected */
        .flatpickr-day.selected {
            background: #918f8f !important;
            border-color: #ffffff !important;
            color: white !important;
            box-shadow: 0 0 12px rgba(91,106,240,.45);
        }

        /* Today */
        .flatpickr-day.today {
            border-color: #abaaaa !important;
        }

        /* Input */
        #periodPicker {
            background: #2e3138;
            border: 1px solid #3a3e47;
            color: #f0f1f3;
            border-radius: 12px;
            padding: 12px 16px;
            width: 100%;
        }
    </style>

    {{-- Page Header --}}
    <div class="page-header">
        <div class="page-header-icon">💼</div>
        <div>
            <h1 class="page-title">Payroll</h1>
            <p class="page-subtitle">Manage employee salary & deductions</p>
        </div>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Session Message --}}
    @if (session('message'))
        <div class="alert-success">✓ {{ session('message') }}</div>
    @endif

    {{-- Form Card --}}
    <div class="card">
        <p class="card-title">{{ $editCheck ? '✏ Edit Payroll Entry' : '＋ New Payroll Entry' }}</p>

        <form wire:submit.prevent='store' id="payrollForm">
            <div class="form-grid">
                <div class="form-group full">
                    <label>Employee</label>
                    <select wire:model='employee_id'>
                        <option value="">— Select Employee —</option>
                        @foreach ($employees as $item)
                            <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Period</label>
                    <input type="text" id="periodPicker" wire:model="period" placeholder="2000-01-01" >
                </div>

                <div class="form-group">
                    <label>Allowance</label>
                    <input type="number" wire:model='allowance' placeholder="0">
                </div>

                <div class="form-group full">
                    <label>Deduction</label>
                    <input type="number" wire:model='deduction' placeholder="0">
                </div>
            </div>

            <div class="form-actions" style="margin-top:1.25rem;">
                @if ($editCheck == false)
                    <button type="submit" class="btn btn-primary">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                        Simpan
                    </button>
                @endif

                @if ($editCheck == true)
                    <button type="button" wire:click='update({{ $idEdit }})' class="btn btn-update" id="updateBtn" data-id="{{ $idEdit }}">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Update
                    </button>
                    <button type="button" wire:click='clear()' class="btn btn-clear">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Cancel
                    </button>
                @endif
            </div>
        </form>
    </div>

    {{-- Table Card --}}
    <div class="card">
        <p class="card-title">📋 Payroll Records</p>

        <div class="search-bar">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" placeholder="Search payroll..." wire:model.live='keyword'>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Period</th>
                        <th>Base Salary</th>
                        <th>Allowance</th>
                        <th>Deduction</th>
                        <th>Net Salary</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payrolls as $item)
                    <tr>
                        <td style="color:var(--text-muted);">{{ $loop->iteration }}</td>
                        <td style="font-weight:500;">{{ $item->employee->user->name }}</td>
                        <td><span class="badge-period">{{ $item->period }}</span></td>
                        <td>Rp {{ number_format($item->employee->salary) }}</td>
                        <td style="color:#4ade80;">+{{ number_format($item->allowance) }}</td>
                        <td style="color:#f87171;">-{{ number_format($item->deduction) }}</td>
                        <td class="net-salary">Rp {{ number_format($item->net_salary) }}</td>
                        <td>
                            <div class="action-group">
                                <button class="btn btn-danger" 
                                    onclick="confirmDelete({{ $item->id }})">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                                    Hapus
                                </button>

                                @if ($editCheck == false)
                                    <button wire:click='edit({{ $item->id }})' class="btn btn-edit">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                        Edit
                                    </button>
                                @endif

                                @if ($editCheck == true)
                                    <button wire:click='clear()' class="btn btn-clear">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                        Clear
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    @if($payrolls->isEmpty())
                    <tr>
                        <td colspan="8" style="text-align:center; padding:2.5rem; color:var(--text-muted);">
                            No payroll records found.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- ── SweetAlert Logic ── --}}
<script>
    const swalDark = Swal.mixin({
        customClass: {
            popup:   'swal-dark-popup',
            title:   'swal-dark-title',
            htmlContainer: 'swal-dark-content',
        },
        background: '#222428',
        color: '#f0f1f3',
        confirmButtonColor: '#5b6af0',
        cancelButtonColor:  '#3a3e47',
    });

    /* ── Delete Confirm ── */
    function confirmDelete(id) {
        swalDark.fire({
            title: 'Hapus Data?',
            text:  'Data payroll ini akan dihapus permanen.',
            icon:  'warning',
            iconColor: '#ef4444',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText:  'Batal',
            confirmButtonColor: '#ef4444',
        }).then(result => {
            if (result.isConfirmed) {
                @this.destroy(id);
            }
        });
    }

    /* ── Listen to Livewire events ── */
    document.addEventListener('livewire:initialized', () => {

        /* After store (add) */
        Livewire.on('payroll-stored', () => {
            swalDark.fire({
                title: 'Tersimpan!',
                text:  'Data payroll berhasil ditambahkan.',
                icon:  'success',
                iconColor: '#22c55e',
                timer: 2000,
                showConfirmButton: false,
            });
        });

        /* After update */
        Livewire.on('payroll-updated', () => {
            swalDark.fire({
                title: 'Diperbarui!',
                text:  'Data payroll berhasil diupdate.',
                icon:  'success',
                iconColor: '#22c55e',
                timer: 2000,
                showConfirmButton: false,
            });
        });

        /* After delete */
        Livewire.on('payroll-deleted', () => {
            swalDark.fire({
                title: 'Terhapus!',
                text:  'Data payroll berhasil dihapus.',
                icon:  'success',
                iconColor: '#ef4444',
                timer: 2000,
                showConfirmButton: false,
            });
        });
    });

    /* ── Initialize Flatpickr on date inputs ── */
    flatpickr("#periodPicker", {
    dateFormat: "Y-m-d",
    });
</script>