<div class="employee-wrapper">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            --warning:        #f59e0b;
            --text-primary:   #f0f1f3;
            --text-secondary: #9aa0ad;
            --text-muted:     #5e6472;
            --radius:         10px;
            --radius-lg:      14px;
        }

        .employee-wrapper {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg-base);
            min-height: 100vh;
            padding: 2rem;
            color: var(--text-primary);
        }

        /* ── Header ── */
        .page-header { display:flex; align-items:center; gap:1rem; margin-bottom:2rem; }
        .page-header-icon {
            width:44px; height:44px; border-radius:12px;
            background:var(--accent-soft); border:1px solid var(--border-focus);
            display:flex; align-items:center; justify-content:center; font-size:1.2rem;
        }
        .page-title { font-family:'Syne',sans-serif; font-size:1.6rem; font-weight:800; color:var(--text-primary); letter-spacing:-0.02em; margin:0; }
        .page-subtitle { font-size:0.8rem; color:var(--text-muted); margin:0; }

        /* ── Alerts ── */
        .alert-error  { background:rgba(239,68,68,.08); border:1px solid rgba(239,68,68,.3); border-radius:var(--radius); padding:.75rem 1rem; margin-bottom:1.25rem; color:#f87171; font-size:.85rem; }
        .alert-success{ background:rgba(34,197,94,.08); border:1px solid rgba(34,197,94,.3);  border-radius:var(--radius); padding:.75rem 1rem; margin-bottom:1.25rem; color:#4ade80; font-weight:500; font-size:.88rem; }

        /* ── Card ── */
        .card { background:var(--bg-card); border:1px solid var(--border); border-radius:var(--radius-lg); padding:1.75rem; margin-bottom:1.5rem; }
        .card-title { font-family:'Syne',sans-serif; font-size:.85rem; font-weight:700; color:var(--text-secondary); text-transform:uppercase; letter-spacing:.07em; margin:0 0 1.25rem; }

        /* ── Form ── */
        .form-grid { display:grid; grid-template-columns:1fr 1fr 1fr; gap:1rem; }
        @media(max-width:768px){ .form-grid{ grid-template-columns:1fr 1fr; } }
        @media(max-width:480px){ .form-grid{ grid-template-columns:1fr; } }
        .form-group { display:flex; flex-direction:column; gap:.4rem; }

        .field-label { font-size:.75rem; font-weight:600; color:var(--text-secondary); text-transform:uppercase; letter-spacing:.05em; display:block; margin-bottom:.4rem; }

        input[type="text"], input[type="number"], input[type="email"], input[type="password"], select {
            background:var(--bg-input); border:1px solid var(--border); border-radius:var(--radius);
            color:var(--text-primary); padding:.65rem 1rem;
            font-family:'DM Sans',sans-serif; font-size:.9rem; width:100%;
            transition:border-color .2s, box-shadow .2s; outline:none; appearance:none;
        }
        input:focus, select:focus { border-color:var(--border-focus); box-shadow:0 0 0 3px var(--accent-soft); }
        input::placeholder { color:var(--text-muted); }
        select option { background:var(--bg-input); color:var(--text-primary); }

        .divider { border:none; border-top:1px solid var(--border); margin:1.5rem 0; }

        /* ── Buttons ── */
        .btn { display:inline-flex; align-items:center; gap:.4rem; padding:.62rem 1.2rem; border-radius:var(--radius); font-family:'DM Sans',sans-serif; font-size:.875rem; font-weight:600; cursor:pointer; border:none; transition:all .18s; white-space:nowrap; }
        .btn-primary { background:var(--accent); color:#fff; }
        .btn-primary:hover { background:var(--accent-hover); transform:translateY(-1px); box-shadow:0 4px 14px rgba(91,106,240,.35); }
        .btn-update { background:#7c3aed; color:#fff; }
        .btn-update:hover { background:#6d28d9; transform:translateY(-1px); box-shadow:0 4px 14px rgba(124,58,237,.35); }
        .btn-danger { background:var(--danger-soft); color:var(--danger); border:1px solid rgba(239,68,68,.25); padding:.45rem .9rem; font-size:.8rem; }
        .btn-danger:hover { background:rgba(239,68,68,.22); }
        .btn-edit { background:var(--accent-soft); color:var(--accent); border:1px solid rgba(91,106,240,.25); padding:.45rem .9rem; font-size:.8rem; }
        .btn-edit:hover { background:rgba(91,106,240,.25); }
        .btn-clear { background:rgba(245,158,11,.1); color:var(--warning); border:1px solid rgba(245,158,11,.25); padding:.45rem .9rem; font-size:.8rem; }
        .btn-clear:hover { background:rgba(245,158,11,.2); }

        /* ── Table ── */
        .table-wrap { overflow-x:auto; border-radius:var(--radius); border:1px solid var(--border); }
        table { width:100%; border-collapse:collapse; font-size:.875rem; }
        thead { background:var(--bg-elevated); }
        thead th { padding:.75rem 1rem; color:var(--text-muted); font-size:.72rem; font-weight:700; text-transform:uppercase; letter-spacing:.07em; white-space:nowrap; text-align:left; }
        tbody tr { border-top:1px solid var(--border); transition:background .15s; }
        tbody tr:hover { background:var(--bg-elevated); }
        tbody td { padding:.75rem 1rem; color:var(--text-primary); white-space:nowrap; }

        /* ── Badges ── */
        .badge { display:inline-block; border-radius:6px; padding:3px 10px; font-size:.78rem; font-weight:600; }
        .badge-position { background:rgba(91,106,240,.12); color:#a5a0ff; border:1px solid rgba(91,106,240,.22); }
        .badge-salary   { background:rgba(34,197,94,.12);  color:#4ade80; border:1px solid rgba(34,197,94,.22); }

        /* ── Avatar ── */
        .avatar { width:32px; height:32px; border-radius:8px; background:var(--accent-soft); border:1px solid rgba(91,106,240,.2); display:flex; align-items:center; justify-content:center; font-size:.82rem; font-weight:700; color:var(--accent); flex-shrink:0; }

        .action-group { display:flex; gap:.5rem; align-items:center; }

        /* ── SweetAlert overrides ── */
        .swal2-popup { background:#222428 !important; border:1px solid #3a3e47 !important; border-radius:16px !important; font-family:'DM Sans',sans-serif !important; }
        .swal2-title { color:#f0f1f3 !important; font-family:'Syne',sans-serif !important; font-size:1.2rem !important; }
        .swal2-html-container { color:#9aa0ad !important; }
        .swal2-confirm { background:#5b6af0 !important; border-radius:8px !important; font-family:'DM Sans',sans-serif !important; font-weight:600 !important; padding:10px 24px !important; }
        .swal2-cancel  { background:#2e3138 !important; color:#9aa0ad !important; border-radius:8px !important; font-family:'DM Sans',sans-serif !important; font-weight:600 !important; padding:10px 24px !important; }
        .swal2-icon.swal2-warning { border-color:#f59e0b !important; color:#f59e0b !important; }
        .swal2-icon.swal2-success { border-color:#22c55e !important; }
        .swal2-icon.swal2-success [class^='swal2-success-line'] { background:#22c55e !important; }
        .swal2-icon.swal2-success .swal2-success-ring { border-color:rgba(34,197,94,.3) !important; }
        .swal2-icon.swal2-error { border-color:#ef4444 !important; color:#ef4444 !important; }
        .swal2-icon.swal2-error [class^='swal2-x-mark-line'] { background:#ef4444 !important; }
    </style>

    {{-- Page Header --}}
    <div class="page-header">
        <div class="page-header-icon">👤</div>
        <div>
            <h1 class="page-title">Data Pegawai</h1>
            <p class="page-subtitle">Kelola data pegawai, posisi, dan gaji</p>
        </div>
    </div>

    {{-- Alerts --}}
    @if ($errors->any())
        <div class="alert-error">
            <ul style="margin:0; padding-left:1rem; list-style:disc;">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif
    @if (session('message'))
        <div class="alert-success">✓ {{ session('message') }}</div>
    @endif

    {{-- Form Card --}}
    <div class="card">
        <p class="card-title">{{ $editCheck ? '✏ Edit Pegawai' : '＋ Tambah Pegawai' }}</p>

        <form wire:submit.prevent='store' id="form-pegawai">
            <div class="form-grid">
                <div class="form-group">
                    <label class="field-label">User</label>
                    <select wire:model='user_id'>
                        <option value="">--- Pilih User ---</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="field-label">Posisi</label>
                    <select wire:model='position_id'>
                        <option value="">--- Pilih Posisi ---</option>
                        @foreach ($positions as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="field-label">Gaji</label>
                    <input type="number" wire:model='salary' placeholder="Masukkan nominal gaji">
                </div>
            </div>

            <hr class="divider">

            <div style="display:flex; gap:.75rem; align-items:center;">
                @if ($editCheck == false)
                    <button type="button" class="btn btn-primary" onclick="confirmStore()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16"><path d="M8 1a.5.5 0 0 1 .5.5v6h6a.5.5 0 0 1 0 1h-6v6a.5.5 0 0 1-1 0v-6h-6a.5.5 0 0 1 0-1h6v-6A.5.5 0 0 1 8 1z"/></svg>
                        Simpan Data
                    </button>
                @endif
                @if ($editCheck == true)
                    <button type="button" class="btn btn-update" onclick="confirmUpdate({{ $idEdit }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/></svg>
                        Update Data
                    </button>
                    <button type="button" class="btn btn-clear" wire:click='clear'>
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Batal
                    </button>
                @endif
            </div>
        </form>
    </div>

    {{-- Table Card --}}
    <div class="card" style="padding:0; overflow:hidden;">
        <div style="padding:1.1rem 1.5rem; border-bottom:1px solid var(--border); display:flex; justify-content:space-between; align-items:center; gap:1rem; flex-wrap:wrap;">
            <p class="card-title" style="margin:0;">📋 Daftar Pegawai</p>
            <span style="background:var(--accent-soft); color:var(--accent); border:1px solid rgba(91,106,240,.25); border-radius:20px; padding:3px 12px; font-size:.78rem; font-weight:600;">
                {{ $employees->count() }} pegawai
            </span>
        </div>

        <div class="table-wrap" style="border:none; border-radius:0;">
            <table>
                <thead>
                    <tr>
                        <th style="width:50px;">#</th>
                        <th>Nama Pegawai</th>
                        <th>Posisi</th>
                        <th>Gaji</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $item)
                    <tr>
                        <td style="color:var(--text-muted); font-size:.8rem;">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                        <td>
                            <div style="display:flex; align-items:center; gap:10px;">
                                <div class="avatar">{{ strtoupper(substr($item->user->name, 0, 1)) }}</div>
                                <span style="font-weight:500;">{{ $item->user->name }}</span>
                            </div>
                        </td>
                        <td><span class="badge badge-position">{{ $item->position->name }}</span></td>
                        <td><span class="badge badge-salary">Rp {{ number_format($item->salary) }}</span></td>
                        <td>
                            <div class="action-group">
                                <button class="btn btn-danger" onclick="confirmDelete({{ $item->id }}, '{{ addslashes($item->user->name) }}')">
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
                                    <button class="btn btn-clear" wire:click='clear'>
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                        Clear
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align:center; padding:2.5rem; color:var(--text-muted);">
                            <div style="font-size:2rem; margin-bottom:.5rem;">📋</div>
                            Belum ada data pegawai
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    function confirmStore() {
        Swal.fire({
            title: 'Simpan Data?',
            text: 'Data pegawai baru akan ditambahkan ke sistem.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Simpan',
            cancelButtonText: 'Batal',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-pegawai').dispatchEvent(new Event('submit', { bubbles: true, cancelable: true }));
            }
        });
    }

    function confirmUpdate(id) {
        Swal.fire({
            title: 'Update Data?',
            text: 'Perubahan akan disimpan ke sistem.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Update',
            cancelButtonText: 'Batal',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                @this.update(id).then(() => {
                    Swal.fire({ title: 'Diperbarui!', text: 'Data pegawai berhasil diperbarui.', icon: 'success', timer: 1800, showConfirmButton: false });
                });
            }
        });
    }

    function confirmDelete(id, name) {
        Swal.fire({
            title: 'Hapus Pegawai?',
            html: `Data <strong style="color:#f0f1f3;">${name}</strong> akan dihapus secara permanen.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            confirmButtonColor: '#ef4444',
        }).then((result) => {
            if (result.isConfirmed) {
                @this.destroy(id).then(() => {
                    Swal.fire({ title: 'Dihapus!', text: `Data ${name} berhasil dihapus.`, icon: 'success', timer: 1800, showConfirmButton: false });
                });
            }
        });
    }

    document.addEventListener('livewire:initialized', () => {
        Livewire.on('employee-stored', () => {
            Swal.fire({ title: 'Tersimpan!', text: 'Data pegawai berhasil ditambahkan.', icon: 'success', timer: 1800, showConfirmButton: false });
        });
        Livewire.on('employee-updated', () => {
            Swal.fire({ title: 'Diperbarui!', text: 'Data pegawai berhasil diupdate.', icon: 'success', timer: 1800, showConfirmButton: false });
        });
        Livewire.on('employee-deleted', () => {
            Swal.fire({ title: 'Dihapus!', text: 'Data pegawai berhasil dihapus.', icon: 'success', timer: 1800, showConfirmButton: false });
        });
    });
</script>