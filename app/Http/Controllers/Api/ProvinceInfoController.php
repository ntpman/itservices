<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\ProvinceInfo;

class ProvinceInfoController extends Controller
{
    public function changwats ()
    {
        $changwats = ProvinceInfo::select('ch_id', 'changwat_t')
            ->orderBy('changwat_t', 'asc')
            ->distinct()
            ->get();
        
        return response()->json($changwats);
        // return $changwats;
    }

    public function amphoes ($id)
    {
        // $data = $request->all();
        // dd($data);
        $amphoes = ProvinceInfo::select('am_id', 'amphoe_t')
            ->where('ch_id', $id)
            ->orderBy('amphoe_t', 'asc')
            ->distinct()
            ->get();
        
        return response()->json($amphoes);
        // return $amphoes;
    }

    public function tambons ($id)
    {
        // $data = $request->all();
        // dd($data);
        $tambons = ProvinceInfo::select('ta_id', 'tambon_t')
            ->where('am_id', $id)
            ->orderBy('tambon_t', 'asc')
            ->distinct()
            ->get();

        return response()->json($tambons);
        // return $tambons;
    }
}
