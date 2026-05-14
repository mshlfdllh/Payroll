{{-- An unexamined life is not worth living. - Socrates --}}

<style>
  @import url('https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Syne:wght@600;700&display=swap');

  .att-wrapper {
    background: #111213;
    min-height: 100vh;
    padding: 2.5rem;
    font-family: 'DM Mono', monospace;
  }

  .att-header {
    display: flex;
    align-items: baseline;
    gap: 1rem;
    margin-bottom: 2rem;
  }

  .att-title {
    font-family: 'Syne', sans-serif;
    font-size: 1.5rem;
    font-weight: 700;
    color: #f0f0f0;
    letter-spacing: -0.02em;
  }

  .att-title span {
    color: #5b5f63;
    font-size: 0.75rem;
    font-family: 'DM Mono', monospace;
    font-weight: 400;
    letter-spacing: 0.1em;
    text-transform: uppercase;
  }

  .att-card {
    background: #18191b;
    border: 1px solid #2a2c2f;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 40px rgba(0,0,0,0.5);
  }

  .att-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.8rem;
  }

  .att-table thead {
    background: #1f2123;
    border-bottom: 1px solid #2a2c2f;
  }

  .att-table th {
    padding: 0.9rem 1.25rem;
    text-align: left;
    font-family: 'DM Mono', monospace;
    font-size: 0.65rem;
    font-weight: 500;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: #5b5f63;
  }

  .att-table th:first-child {
    width: 56px;
    text-align: center;
    color: #3a3d40;
  }

  .att-table tbody tr {
    border-bottom: 1px solid #1f2123;
    transition: background 0.15s ease;
    animation: rowIn 0.3s ease both;
  }

  .att-table tbody tr:last-child {
    border-bottom: none;
  }

  .att-table tbody tr:hover {
    background: #1f2123;
  }

  @keyframes rowIn {
    from { opacity: 0; transform: translateY(4px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .att-table td {
    padding: 0.85rem 1.25rem;
    color: #c9cacc;
    vertical-align: middle;
  }

  .att-table td:first-child {
    text-align: center;
    color: #3a3d40;
    font-size: 0.7rem;
  }

  .att-name {
    color: #e8e9ea;
    font-weight: 500;
  }

  .att-date {
    color: #7a7e83;
    font-size: 0.75rem;
  }

  .att-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.25rem 0.7rem;
    border-radius: 999px;
    font-size: 0.65rem;
    font-weight: 500;
    letter-spacing: 0.08em;
    text-transform: uppercase;
  }

  .att-badge::before {
    content: '';
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: currentColor;
  }

  .badge-hadir    { background: #0d2b1a; color: #4ade80; border: 1px solid #166534; }
  .badge-izin     { background: #1a1f0d; color: #a3e635; border: 1px solid #3f6212; }
  .badge-sakit    { background: #1a1500; color: #facc15; border: 1px solid #854d0e; }
  .badge-alpha    { background: #2b0d0d; color: #f87171; border: 1px solid #7f1d1d; }
  .badge-default  { background: #1f2123; color: #6b7280; border: 1px solid #374151; }

  .overflow-x-auto { overflow-x: auto; }
</style>

<div class="att-wrapper">
  <div class="att-header">
    <h1 class="att-title">Attendance <span>// log</span></h1>
  </div>

  <div class="att-card overflow-x-auto">
    <table class="att-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Tanggal</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($attendances as $attendance)
        @php
          $status = strtolower($attendance->status ?? '');
          $badgeClass = match(true) {
            str_contains($status, 'hadir')  => 'badge-hadir',
            str_contains($status, 'izin')   => 'badge-izin',
            str_contains($status, 'sakit')  => 'badge-sakit',
            str_contains($status, 'alpha') || str_contains($status, 'alfa') => 'badge-alpha',
            default => 'badge-default',
          };
        @endphp
        <tr style="animation-delay: {{ $loop->index * 40 }}ms">
          <td>{{ $loop->iteration }}</td>
          <td><span class="att-name">{{ $attendance->user->name ?? '—' }}</span></td>
          <td><span class="att-date">{{ $attendance->date }}</span></td>
          <td>
            <span class="att-badge {{ $badgeClass }}">
              {{ $attendance->status }}
            </span>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>