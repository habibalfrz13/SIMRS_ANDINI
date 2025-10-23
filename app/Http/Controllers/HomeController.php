<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Halaman utama (view tabel)
    public function indexKeuangan()
    {
        return view('content.keuangan.embalase');
    }

    // Endpoint data untuk DataTables (AJAX)
    public function getDataKeuangan(Request $request)
    {
        $status = $request->input('status', 'Semua');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = DB::table('resep_obat')
            ->join('reg_periksa', 'resep_obat.no_rawat', '=', 'reg_periksa.no_rawat')
            ->join('pasien', 'reg_periksa.no_rkm_medis', '=', 'pasien.no_rkm_medis')
            ->join('detail_pemberian_obat', function ($join) {
                $join->on('detail_pemberian_obat.no_rawat', '=', 'resep_obat.no_rawat')
                    ->on('detail_pemberian_obat.tgl_perawatan', '=', 'resep_obat.tgl_perawatan')
                    ->on('detail_pemberian_obat.jam', '=', 'resep_obat.jam');
            })
            ->join('databarang', 'detail_pemberian_obat.kode_brng', '=', 'databarang.kode_brng')
            ->where('resep_obat.kd_dokter', '!=', '-')
            ->select(
                'resep_obat.tgl_perawatan',
                'resep_obat.no_rawat',
                'pasien.nm_pasien',
                'databarang.kode_brng',
                'databarang.nama_brng',
                'detail_pemberian_obat.jml',
                'detail_pemberian_obat.biaya_obat',
                DB::raw('(detail_pemberian_obat.total - (detail_pemberian_obat.embalase + detail_pemberian_obat.tuslah)) AS subtotal'),
                'detail_pemberian_obat.status'
            );

        if ($startDate && $endDate) {
            $query->whereBetween('resep_obat.tgl_perawatan', [$startDate, $endDate]);
        }

        if ($status !== 'Semua') {
            $query->where('detail_pemberian_obat.status', $status);
        }

        $draw = intval($request->input('draw'));
        $start = intval($request->input('start'));
        $length = intval($request->input('length'));

        $totalRecords = $query->count();

        $data = $query
            ->offset($start)
            ->limit($length)
            ->orderBy('resep_obat.tgl_perawatan', 'desc')
            ->get();

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }

    // ===============================
    // Fungsi perhitungan embalase
    // ===============================

    // Total embalase
    public function getTotalEmbalase(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = DB::table('resep_obat')
            ->where('resep_obat.kd_dokter', '!=', '-')
            ->join('reg_periksa', 'resep_obat.no_rawat', '=', 'reg_periksa.no_rawat')
            ->join('pasien', 'reg_periksa.no_rkm_medis', '=', 'pasien.no_rkm_medis')
            ->join('detail_pemberian_obat', function ($join) {
                $join->on('detail_pemberian_obat.no_rawat', '=', 'resep_obat.no_rawat')
                    ->on('detail_pemberian_obat.tgl_perawatan', '=', 'resep_obat.tgl_perawatan')
                    ->on('detail_pemberian_obat.jam', '=', 'resep_obat.jam');
                    
            });
            

        if ($startDate && $endDate) {
            $query->whereBetween('resep_obat.tgl_perawatan', [$startDate, $endDate]);
        }

        $total = $query->sum('detail_pemberian_obat.embalase');

        return response()->json([
            'total_embalase' => $total ?? 0,
        ]);
    }

    // Embalase Ralan
    public function getEmbalaseRalan(Request $request)
    {
        return $this->getEmbalaseByStatus($request, 'Ralan');
    }

    // Embalase Ranap
    public function getEmbalaseRanap(Request $request)
    {
        return $this->getEmbalaseByStatus($request, 'Ranap');
    }

    // Fungsi helper
    private function getEmbalaseByStatus(Request $request, $status)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = DB::table('resep_obat')
            ->where('resep_obat.kd_dokter', '!=', '-')
            ->join('reg_periksa', 'resep_obat.no_rawat', '=', 'reg_periksa.no_rawat')
            ->join('pasien', 'reg_periksa.no_rkm_medis', '=', 'pasien.no_rkm_medis')
            ->join('detail_pemberian_obat', function ($join) {
                $join->on('detail_pemberian_obat.no_rawat', '=', 'resep_obat.no_rawat')
                    ->on('detail_pemberian_obat.tgl_perawatan', '=', 'resep_obat.tgl_perawatan')
                    ->on('detail_pemberian_obat.jam', '=', 'resep_obat.jam');
            })
            ->where('detail_pemberian_obat.status', $status);

        if ($startDate && $endDate) {
            $query->whereBetween('resep_obat.tgl_perawatan', [$startDate, $endDate]);
        }

        $total = $query->sum('detail_pemberian_obat.embalase');

        return response()->json([
            'total_embalase' => $total ?? 0,
        ]);
    }
}
