<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wbs;
use App\Models\SelectSql;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        try {
            $update = [
                'mainItem' => $req->mainItem,
                'subItem' => $req->subItem,
                'plansStartDay' => $req->plansStartDay,
                'plansFinishDay' => $req->plansFinishDay,
                'resultStartDay' => $req->resultStartDay,
                'resultsFinishDay' => $req->resultsFinishDay,
                'progress' => $req->progress,
                'productionCost' => $req->productionCost,
                'rep' => $req->rep
            ];
            Wbs::where('id', $id)->update($update);

            return response()->json(
                '更新しました。',
                200
            );
        } catch (\Throwable $th) {
            throw $th;
            return response()->json(
                $th,
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $wbs = Wbs::where('id', $id)->delete();
            if ($wbs) {
                return response()->json(
                    ['message' => '削除しました。'],
                    200
                );
            } else {
                return response()->json([
                    'message' => '削除対象が見つかりませんでした。',
                ], 404);
            }
        } catch (\Throwable $th) {
            throw $th;
            return response()->json(
                $th,
                500
            );
        }
    }
}
