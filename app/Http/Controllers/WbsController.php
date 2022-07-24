<?php

namespace App\Http\Controllers;

use App\Models\Wbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SelectSql;

class WbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $select = new SelectSql;
            $resWbs = DB::select($select->selectWbsData());

            // ddしてるとReact側にResponceが渡せないので注意
            // dd($resWbs);
            return response()->json(
                $resWbs,
                200
            );
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $select = new SelectSql;
        $resDetailWbs = DB::select($select->selectDetailWbsData($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
