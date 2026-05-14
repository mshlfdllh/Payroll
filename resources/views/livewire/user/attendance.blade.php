<div style="min-height:100vh; background:#242424;">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Force full dark coverage */
        body, .content, main { background: #242424 !important; }

        :root {
            --surface:    #1F1F1F;
            --surface-2:  #262626;
            --surface-3:  #2C2C2C;
            --border:     rgba(255,255,255,0.07);
            --accent:     #E8FF47;
            --accent-dim: rgba(232,255,71,0.1);
            --text-1:     #F0F0F0;
            --text-2:     #888;
            --text-3:     #444;
            --success:    #4ADE80;
            --danger:     #FF5C5C;
            --warning:    #FBBF24;
            --info:       #60A5FA;
            --r:          10px;
        }

        .kdr-wrap {
            padding: 24px;
            font-family: 'Inter', 'DM Sans', sans-serif;
            color: var(--text-1);
            width: 100%;
        }

        /* ── Header ── */
        .kdr-header {
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }
        .kdr-header-left h1 {
            font-family: 'Syne', sans-serif;
            font-size: 1.3rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: var(--text-1);
            line-height: 1.1;
        }
        .kdr-header-left p {
            font-size: 0.73rem;
            color: var(--text-2);
            margin-top: 4px;
        }

        /* Logout button */
        .kdr-logout-btn {
            background: transparent;
            border: 1px solid var(--border);
            padding: 8px 16px;
            border-radius: 8px;
            color: var(--text-2);
            font-size: 0.75rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.15s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .kdr-logout-btn:hover {
            background: rgba(255,255,255,0.05);
            border-color: rgba(232,255,71,0.3);
            color: var(--accent);
        }

        /* ── Today card ── */
        .kdr-today-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--r);
            padding: 18px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }
        .kdr-today-left {}
        .kdr-today-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-3);
            font-weight: 600;
            margin-bottom: 4px;
        }
        .kdr-today-date {
            font-family: 'Syne', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-1);
        }

        /* Select + button row */
        .kdr-input-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .kdr-select-wrap {
            position: relative;
        }
        .kdr-select-wrap svg {
            position: absolute;
            right: 10px; top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: var(--text-2);
        }
        .kdr-select {
            background: var(--surface-3);
            border: 1px solid var(--border);
            color: var(--text-1);
            padding: 9px 34px 9px 12px;
            border-radius: 8px;
            font-size: 0.81rem;
            font-family: inherit;
            appearance: none;
            cursor: pointer;
            outline: none;
            transition: border-color 0.15s;
            min-width: 190px;
        }
        .kdr-select:focus { border-color: rgba(232,255,71,0.35); }
        .kdr-select option { background: #2C2C2C; }

        .kdr-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 9px 16px;
            background: var(--accent);
            color: #0D0D0D;
            border: none;
            border-radius: 8px;
            font-size: 0.81rem;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            transition: opacity 0.14s, transform 0.12s;
            white-space: nowrap;
        }
        .kdr-btn:hover  { opacity: 0.88; transform: translateY(-1px); }
        .kdr-btn:active { transform: translateY(0); }

        /* ── Table card ── */
        .kdr-table-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--r);
            overflow: hidden;
        }
        .kdr-table-top {
            padding: 13px 16px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .kdr-table-top h2 {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-1);
        }
        .kdr-table-top span {
            font-size: 0.68rem;
            color: var(--text-2);
        }

        .kdr-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.79rem;
        }
        .kdr-table thead tr { border-bottom: 1px solid var(--border); }
        .kdr-table thead th {
            padding: 9px 16px;
            text-align: left;
            font-size: 0.62rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-3);
        }
        .kdr-table tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background 0.12s;
        }
        .kdr-table tbody tr:last-child { border-bottom: none; }
        .kdr-table tbody tr:hover { background: rgba(255,255,255,0.02); }
        .kdr-table tbody td {
            padding: 11px 16px;
            color: var(--text-2);
        }
        .kdr-table td:first-child { color: var(--text-3); font-size: 0.7rem; }
        .kdr-table td.td-name { color: var(--text-1); font-weight: 500; }
        .kdr-table td.td-date { font-variant-numeric: tabular-nums; font-size: 0.78rem; }

        /* Status badge */
        .sbadge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 9px 3px 7px;
            border-radius: 999px;
            font-size: 0.68rem;
            font-weight: 600;
        }
        .sbadge::before {
            content: '';
            width: 5px; height: 5px;
            border-radius: 50%;
            flex-shrink: 0;
        }
        .sbadge.present { background:rgba(74,222,128,0.1);  color:var(--success); }
        .sbadge.present::before { background:var(--success); }
        .sbadge.absent  { background:rgba(255,92,92,0.1);   color:var(--danger);  }
        .sbadge.absent::before  { background:var(--danger);  }
        .sbadge.sick    { background:rgba(251,191,36,0.1);  color:var(--warning); }
        .sbadge.sick::before    { background:var(--warning); }
        .sbadge.permit  { background:rgba(96,165,250,0.1);  color:var(--info);    }
        .sbadge.permit::before  { background:var(--info);    }

        /* Empty state */
        .kdr-empty {
            padding: 44px 16px;
            text-align: center;
            color: var(--text-3);
        }
        .kdr-empty svg { margin: 0 auto 10px; display:block; }
        .kdr-empty p { font-size: 0.8rem; }

        /* SweetAlert dark overrides */
        .swal-kdr {
            background: #1A1A1A !important;
            border: 1px solid rgba(255,255,255,0.08) !important;
            border-radius: 14px !important;
            color: #F0F0F0 !important;
        }
        .swal-kdr .swal2-title       { color:#F0F0F0 !important; font-family:'Syne',sans-serif !important; font-size:1.05rem !important; }
        .swal-kdr .swal2-html-container { color:#888 !important; font-size:0.83rem !important; }
        .swal-kdr .swal2-confirm     { background:#E8FF47 !important; color:#0D0D0D !important; font-weight:700 !important; border-radius:8px !important; font-size:0.8rem !important; box-shadow:none !important; }
        .swal-kdr .swal2-cancel      { background:rgba(255,255,255,0.05) !important; color:#888 !important; border-radius:8px !important; font-size:0.8rem !important; box-shadow:none !important; }
        .swal-kdr .swal2-icon.swal2-question { border-color:rgba(232,255,71,0.25) !important; color:var(--accent) !important; }
        .swal-kdr .swal2-icon.swal2-success  { border-color:rgba(74,222,128,0.25) !important; }
        .swal-kdr .swal2-icon.swal2-warning  { border-color:rgba(251,191,36,0.25) !important; }
        .swal-kdr .swal2-success-ring        { border-color:rgba(74,222,128,0.2)  !important; }
        .swal-kdr .swal2-timer-progress-bar  { background:var(--accent) !important; }
    </style>

    <div class="kdr-wrap" style="min-height:100vh; background:#242424;">

        {{-- Header with logout button --}}
<div class="kdr-header">
    <div class="kdr-header-left">
        <h1>Kehadiran Saya</h1>
        <p>Catat kehadiran harian kamu di sini</p>
    </div>

    <a href="{{ route('logout') }}" class="kdr-logout-btn" onclick="return confirm('Yakin ingin logout?')">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
            <polyline points="16 17 21 12 16 7" />
            <line x1="21" y1="12" x2="9" y2="12" />
        </svg>
        Logout
    </a>
</div>

        {{-- Today input card --}}
        <div class="kdr-today-card">
            <div class="kdr-today-left">
                <div class="kdr-today-label">Hari ini</div>
                <div class="kdr-today-date">{{ now()->translatedFormat('l, d F Y') }}</div>
            </div>

            <div class="kdr-input-row">
                <div class="kdr-select-wrap">
                    <select class="kdr-select" wire:model="status">
                        <option value="">— Pilih Status</option>
                        <option value="present">Hadir</option>
                        <option value="absent">Tidak Hadir</option>
                        <option value="sick">Sakit</option>
                        <option value="permit">Izin</option>
                    </select>
                    <svg width="11" height="11" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M2 4l4 4 4-4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <button type="button" class="kdr-btn" wire:click="store">
                    <svg width="12" height="12" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path d="M6.5 1v11M1 6.5h11" stroke-linecap="round"/>
                    </svg>
                    Simpan
                </button>
            </div>
        </div>

        {{-- Table --}}
        <div class="kdr-table-card">
            <div class="kdr-table-top">
                <h2>Riwayat Kehadiran</h2>
                <span>{{ $attendances->count() }} data</span>
            </div>

            <div style="overflow-x:auto;">
                <table class="kdr-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendances as $att)
                            @php
                                $map = [
                                    'present' => ['Hadir',        'present'],
                                    'absent'  => ['Tidak Hadir',  'absent'],
                                    'sick'    => ['Sakit',        'sick'],
                                    'permit'  => ['Izin',         'permit'],
                                ];
                                [$lbl, $cls] = $map[$att->status] ?? [ucfirst($att->status), 'absent'];
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="td-name">{{ $att->user->name ?? '-' }}</td>
                                <td class="td-date">{{ $att->date }}</td>
                                <td><span class="sbadge {{ $cls }}">{{ $lbl }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="kdr-empty">
                                        <svg width="36" height="36" viewBox="0 0 40 40" fill="none" stroke="#555" stroke-width="1.5">
                                            <rect x="6" y="8" width="28" height="26" rx="3"/>
                                            <path d="M13 4v8M27 4v8M6 18h28M14 27h12M14 22h8"/>
                                        </svg>
                                        <p>Belum ada riwayat kehadiran</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- SweetAlert logic --}}
    <script>
        const _statusLabel = {
            present : 'Hadir',
            absent  : 'Tidak Hadir',
            sick    : 'Sakit',
            permit  : 'Izin',
        };

        document.addEventListener('livewire:initialized', () => {
            Livewire.on('confirm-store', (data) => {
                const status = data[0]?.status || '';
                const label  = _statusLabel[status] || '';

                if (!label) {
                    Swal.fire({
                        title      : 'Pilih Status',
                        html       : 'Silakan pilih status kehadiran terlebih dahulu.',
                        icon       : 'warning',
                        confirmButtonText: 'OK',
                        customClass: { popup: 'swal-kdr' },
                    });
                    return;
                }

                Swal.fire({
                    title            : 'Konfirmasi Kehadiran',
                    html             : `Catat kehadiran hari ini sebagai<br><strong style="color:#E8FF47;font-size:1rem;">${label}</strong>?`,
                    icon             : 'question',
                    showCancelButton : true,
                    confirmButtonText: 'Ya, Simpan',
                    cancelButtonText : 'Batal',
                    reverseButtons   : true,
                    customClass      : { popup: 'swal-kdr' },
                }).then(res => {
                    if (res.isConfirmed) @this.call('store');
                });
            });

            Livewire.on('showSuccess', (data) => {
                const label = _statusLabel[data[0]?.status] || '';
                Swal.fire({
                    title            : 'Tercatat!',
                    html             : `Kehadiran kamu hari ini dicatat sebagai <strong style="color:#E8FF47">${label}</strong>.`,
                    icon             : 'success',
                    timer            : 2000,
                    timerProgressBar : true,
                    showConfirmButton : false,
                    customClass      : { popup: 'swal-kdr' },
                });
            });

            Livewire.on('showError', (data) => {
                Swal.fire({
                    title      : 'Gagal',
                    html       : data[0]?.message || 'Terjadi kesalahan.',
                    icon       : 'error',
                    confirmButtonText: 'OK',
                    customClass: { popup: 'swal-kdr' },
                });
            });
        });
    </script>
</div>