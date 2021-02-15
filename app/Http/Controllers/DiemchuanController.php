<?php


namespace App\Http\Controllers;

use App\Tentruong;
use Illuminate\Http\Request;
use App\Diemchuan;
use Illuminate\Support\Facades\DB;


class DiemchuanController extends Controller
{
    //
    public function getDiemchuanWithID($id)
    {
        # code...
        return Diemchuan::where('d_id', '=', $id)->get();
    }

    public function sosanhDiemChuanDuKienTheo01Thamso($diemchuan) {
        # code...
        /*thuc hien truy van tim truong theo diem chuan dat duoc */
        $data = DB::table(DB::raw('tentruongs'))
            ->select('tentruongs.id', 'tentruongs.tr_name')
            ->join('diemchuans', 'tentruongs.id', '=', 'diemchuans.d_id')
            ->where('diemchuans.d_diemchuan', '<=', $diemchuan)
            ->groupBy('tentruongs.id')
            ->paginate(10);
        return $data;
    }

    public function sosanhDiemChuanDuKienTheo02Thamso($diemchuan, $tohopmon)
    {
        # code...
        $temp = "%{$tohopmon}%";
        /*thuc hien truy van tim truong theo diem chuan dat duoc va khoi du thi*/
        $data = DB::table(DB::raw('tentruongs'))
            ->select('tentruongs.id', 'tentruongs.tr_name')
            ->join('diemchuans', 'tentruongs.id', '=', 'diemchuans.d_id')
            ->where('diemchuans.d_diemchuan', '<=', $diemchuan)
            ->where('diemchuans.d_tohopmon', 'LIKE', $temp)
            ->groupBy('tentruongs.id')
            ->paginate(10);
        return $data;
        /*DB::select("
                    SELECT tentruongs.id, tentruongs.tr_name
                    FROM tentruongs, diemchuans
                    WHERE
                        diemchuans.d_diemchuan <= {$diemchuan}
                        AND diemchuans.d_tohopmon LIKE \"{$temp}\"
                        AND tentruongs.id = diemchuans.d_id
                        GROUP BY tentruongs.id
                    ");*/
    }

    public function sosanhDiemChuanDuKienTheo03Thamso($diemchuan, $tohopmon, $truong)
    {
        # code...
        $temp = "%{$tohopmon}%";
        /*thuc hien truy van tim truong theo diem chuan dat duoc va khoi du thi, truong muon thi*/
        $data = DB::table(DB::raw('tentruongs'))
            ->select('tentruongs.tr_name', 'diemchuans.*')
            ->join('diemchuans', 'tentruongs.id', '=', 'diemchuans.d_id')
            ->where('diemchuans.d_diemchuan', '<=', $diemchuan)
            ->where('diemchuans.d_tohopmon', 'LIKE', $temp)
            ->where('tentruongs.id', '=', $truong)
            ->paginate(10);
        return $data;
    }
}

