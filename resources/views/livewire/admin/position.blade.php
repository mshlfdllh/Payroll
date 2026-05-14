<div class="position-wrapper">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-base:       #1a1b1e;
            --bg-card:       #222428;
            --bg-elevated:   #2a2d32;
            --bg-input:      #2e3138;
            --border:        #3a3e47;
            --border-focus:  #5b6af0;
            --accent:        #5b6af0;
            --accent-hover:  #4a58e0;
            --accent-soft:   rgba(91,106,240,0.15);
            --danger:        #ef4444;
            --danger-soft:   rgba(239,68,68,0.12);
            --success:       #22c55e;
            --warning:       #f59e0b;
            --text-primary:  #f0f1f3;
            --text-secondary:#9aa0ad;
            --text-muted:    #5e6472;
            --radius:        10px;
            --radius-lg:     14px;
        }

        .position-wrapper {
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
            font-size: 1.2rem;
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
            color: #f87171;
            font-size: 0.85rem;
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
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.07em;
            margin: 0 0 1.25rem;
        }

        /* ── Form ── */
        .input-row {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }
        .input-row input {
            flex: 1;
        }

        label.field-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: block;
            margin-bottom: 0.4rem;
        }

        input[type="text"] {
            background: var(--bg-input);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            color: var(--text-primary);
            padding: 0.65rem 1rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            width: 100%;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }
        input[type="text"]:focus {
            border-color: var(--border-focus);
            box-shadow: 0 0 0 3px var(--accent-soft);
        }
        input[type="text"]::placeholder { color: var(--text-muted); }

        /* ── Buttons ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.62rem 1.2rem;
            border-radius: var(--radius);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
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
        .btn-primary:hover {
            background: var(--accent-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(91,106,240,.35);
        }
        .btn-update {
            background: #7c3aed;
            color: #fff;
        }
        .btn-update:hover {
            background: #6d28d9;
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(124,58,237,.35);
        }
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

        /* ── Search ── */
        .search-wrap {
            position: relative;
            margin-bottom: 1.25rem;
        }
        .search-wrap svg {
            position: absolute;
            left: 0.85rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            pointer-events: none;
        }
        .search-wrap input {
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
        .row-num { color: var(--text-muted); font-size: 0.8rem; }
        .position-name { font-weight: 500; }
        .action-group { display: flex; gap: 0.5rem; align-items: center; }

        .empty-state {
            text-align: center;
            padding: 2.5rem;
            color: var(--text-muted);
            font-size: 0.875rem;
        }
        .empty-state span { font-size: 1.75rem; display: block; margin-bottom: 0.5rem; }
    </style>

    {{-- Page Header --}}
    <div class="page-header">
        <div class="page-header-icon">🏷</div>
        <div>
            <h1 class="page-title">Position</h1>
            <p class="page-subtitle">Manage job positions in your organization</p>
        </div>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $item)
                <div>⚠ {{ $item }}</div>
            @endforeach
        </div>
    @endif

    {{-- Session Message --}}
    @if (session('message'))
        <div class="alert-success">✓ {{ session('message') }}</div>
    @endif

    {{-- Form Card --}}
    <div class="card">
        <p class="card-title">{{ $editCheck ? '✏ Edit Position' : '＋ New Position' }}</p>

        <form wire:submit.prevent='{{ $editCheck ? "update($idEdit)" : "store" }}'>
            <label class="field-label">Position Name</label>
            <div class="input-row">
                <input
                    type="text"
                    wire:model='name'
                    placeholder="e.g. Frontend Developer, HR Manager..."
                >
                @if ($editCheck == false)
                    <button type="submit" class="btn btn-primary">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                        Save
                    </button>
                @endif
            </div>
        </form>

        @if ($editCheck == true)
            <div style="display:flex; gap:0.75rem; margin-top:1rem;">
                <button wire:click='update({{ $idEdit }})' class="btn btn-update">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    Update
                </button>
                <button wire:click='clear()' class="btn btn-clear">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    Cancel
                </button>
            </div>
        @endif
    </div>

    {{-- Table Card --}}
    <div class="card">
        <p class="card-title">📋 Position List</p>

        <div class="search-wrap">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" placeholder="Search position..." wire:model.live='keyword'>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($positions as $item)
                    <tr>
                        <td class="row-num">{{ $loop->iteration }}</td>
                        <td class="position-name">{{ $item->name }}</td>
                        <td>
                            <div class="action-group">
                                <button class="btn btn-danger" wire:click='destroy({{ $item->id }})'>
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

                    @if($positions->isEmpty())
                    <tr>
                        <td colspan="3">
                            <div class="empty-state">
                                <span>🗂</span>
                                No positions found.
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- SweetAlert2 CDN & Custom Confirmation Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('livewire:initialized', () => {

        // SUCCESS ADD
        Livewire.on('position-added', () => {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Position berhasil ditambahkan.',
                background: '#222428',
                color: '#f0f1f3',
                confirmButtonColor: '#5b6af0',
                timer: 2000,
                showConfirmButton: false
            });
        });

        // SUCCESS UPDATE
        Livewire.on('position-updated', () => {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Position berhasil diupdate.',
                background: '#222428',
                color: '#f0f1f3',
                confirmButtonColor: '#7c3aed',
                timer: 2000,
                showConfirmButton: false
            });
        });

        // SUCCESS DELETE
        Livewire.on('position-deleted', () => {
            Swal.fire({
                icon: 'success',
                title: 'Terhapus!',
                text: 'Position berhasil dihapus.',
                background: '#222428',
                color: '#f0f1f3',
                confirmButtonColor: '#ef4444',
                timer: 2000,
                showConfirmButton: false
            });
        });

    });
</script>
