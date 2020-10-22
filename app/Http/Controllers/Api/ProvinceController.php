<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceResource;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\SubdistrictResource;
use Illuminate\Http\Request;

use App\Model\Province;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function province()
    {
        $provinces = Province::select('ch_id', 'changwat_t')
            ->orderBy('changwat_t', 'asc')
            ->distinct()
            ->get();

        return ProvinceResource::collection($provinces);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function district($id)
    {
        $districts = Province::select('am_id', 'amphoe_t')
            ->where('ch_id', $id)
            ->orderBy('amphoe_t', 'asc')
            ->distinct()
            ->get();
        
        return DistrictResource::collection($districts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subdistrict($id)
    {
        $subdistricts = Province::select('ta_id', 'tambon_t')
            ->where('am_id', $id)
            ->orderBy('tambon_t', 'asc')
            ->distinct()
            ->get();
        
        return SubdistrictResource::collection($subdistricts);
    }
}
