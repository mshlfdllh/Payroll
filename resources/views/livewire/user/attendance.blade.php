<div>
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="mb-4 flex gap-2">
        <select name="" wire:model.live='status' >
            <option value="">--- Pilih status</option>
            <option value="present">Hadir</option>
            <option value="absent">Tidak Hadir</option>
            <option value="sick">Sakit</option>
            <option value="permit">Izin</option>
        </select>
        <button type="button" wire:click='save'>Save</button>
        @if (session('message'))
            <p>{{ session('message') }}</p>
        @endif
        
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border">
                <thead>
                    <tr class="bg-gray-100 text-xs uppercase text-gray-600">
                        <th class="p-3">#</th>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Tanggal</th>
                        <th class="p-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="p-3">1</td>
                        <td class="p-3">Jaka</td>
                        <td class="p-3">07/05/2026</td>
                        <td class="p-3">Sick</td>
                    </tr>
                </tbody>
        </table>
    </div>
</div>
