@extends('layouts.app')

@section('title', 'Rekapan Embalase | RSIA Andini Pekanbaru')

@section('content')
<div class="container-fluid py-3">

    {{-- Filter Section --}}
    <div class="mb-4 border-0 rounded-3">
        <div class="card-body">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label for="start_date" class="form-label fw-semibold">Tanggal Awal</label>
                    <input type="date" id="start_date" class="form-control rounded-2">
                </div>
                <div class="col-md-3">
                    <label for="end_date" class="form-label fw-semibold">Tanggal Akhir</label>
                    <input type="date" id="end_date" class="form-control rounded-2">
                </div>
                <div class="col-md-3">
                    <label for="status" class="form-label fw-semibold">Status</label>
                    <select id="status" class="form-select rounded-2">
                        <option value="Semua" selected>Semua</option>
                        <option value="Ralan">Ralan</option>
                        <option value="Ranap">Ranap</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-outline-secondary w-100 rounded-2" id="resetFilter">Reset</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="">
        <div class="card-body rounded-md p-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="tabel-obat">
                    <thead class="table-light text-muted small text-uppercase">
                        <tr>
                            <th>No</th>
                            <th>Tgl Perawatan</th>
                            <th>No Rawat</th>
                            <th>Nama Pasien</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Biaya Obat</th>
                            <th>Subtotal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Total Embalase Cards --}}
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card shadow-sm rounded-3 p-3 border-0" style="background-color:#f8f9fa;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-muted mb-1 small">Total Embalase</p>
                        <h2 class="fw-bold mb-0" id="totalEmbalase">0</h2>
                        <small id="periodeEmb" class="text-muted">Semua Periode</small>
                    </div>
                    <i class="bi bi-prescription fs-1 text-primary"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm rounded-3 p-3 border-0" style="background-color:#fef9f0;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-muted mb-1 small">Ralan</p>
                        <h2 class="fw-bold mb-0" id="ralanEmbalase">0</h2>
                    </div>
                    <i class="bi bi-heart-pulse fs-1 text-success"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm rounded-3 p-3 border-0" style="background-color:#f0f8ff;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-muted mb-1 small">Ranap</p>
                        <h2 class="fw-bold mb-0" id="ranapEmbalase">0</h2>
                    </div>
                    <i class="bi bi-hospital fs-1 text-info"></i>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {
    const table = $('#tabel-obat').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 10,
        ajax: {
            url: "{{ route('home.dataKeuangan') }}",
            data: d => {
                d.start_date = $('#start_date').val();
                d.end_date = $('#end_date').val();
                d.status = $('#status').val();
            }
        },
        columns: [
            { data: null, render: (data,type,row,meta)=>meta.row+meta.settings._iDisplayStart+1 },
            { data: 'tgl_perawatan' },
            { data: 'no_rawat' },
            { data: 'nm_pasien' },
            { data: 'kode_brng' },
            { data: 'nama_brng' },
            { data: 'jml' },
            { data: 'biaya_obat', render: d=> d? Number(d).toLocaleString():'0' },
            { data: 'subtotal', render: d=> d? Number(d).toLocaleString():'0' },
            { data: 'status', render: d=> `<span class="badge rounded-pill text-bg-${d==='Ralan'?'success':'info'}">${d}</span>` }
        ]
    });

    function loadEmbalase() {
        const start_date = $('#start_date').val();
        const end_date = $('#end_date').val();
        $('#periodeEmb').text(`${start_date||'Awal'} s/d ${end_date||'Akhir'}`);

        $.get("{{ route('home.totalEmbalase') }}",{start_date,end_date}, res=> {
            $('#totalEmbalase').text(res.total_embalase.toLocaleString());
        });
        $.get("{{ route('home.embalaseRalan') }}",{start_date,end_date}, res=> {
            $('#ralanEmbalase').text(res.total_embalase.toLocaleString());
        });
        $.get("{{ route('home.embalaseRanap') }}",{start_date,end_date}, res=> {
            $('#ranapEmbalase').text(res.total_embalase.toLocaleString());
        });
    }

    $('#start_date,#end_date,#status').on('change', function(){
        table.ajax.reload();
        loadEmbalase();
    });
    $('#resetFilter').on('click', function(){
        $('#start_date,#end_date').val('');
        $('#status').val('Semua');
        table.ajax.reload();
        loadEmbalase();
    });

    loadEmbalase();
});
</script>
@endpush
