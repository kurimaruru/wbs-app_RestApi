<?php

namespace App\Http\Controllers;

use App\Models\Wbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $sql = '
                SELECT 
                    a.id,
                    a.mainItem,
                    a.subItem,
                    DATE_FORMAT(a.plansStartDay ,\'%Y-%m-%d\')as plansStartDay,
                    DATE_FORMAT(a.plansFinishDay ,\'%Y-%m-%d\') as plansFinishDay,
                    DATE_FORMAT(a.resultStartDay ,\'%Y-%m-%d\')as resultStartDay,
                    DATE_FORMAT(a.resultsFinishDay ,\'%Y-%m-%d\') as resultsFinishDay,
                    a.progress,
                    a.productionCost,
                    a.rep
                FROM wbs a
            ';
            $res = DB::select($sql);
            // ddしてるとReact側にResponceが渡せないので注意
            // dd($resWbs);
            return response()->json(
                $res,
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
    public function store(Request $req)
    {
        try {
            $create = [
                'mainItem' => $req->mainItem,
                'subItem' => $req->subItem,
                'plansStartDay' => $req->plansStartDay,
                'plansFinishDay' => $req->plansFinishDay,
                'resultStartDay' => null,
                'resultsFinishDay' => null,
                'progress' => 0,
                'productionCost' => $req->productionCost,
                'rep' => $req->rep
            ];
            $wbs = Wbs::create($create);
            return response()->json(
                $wbs,
                201
            );
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try {
            $sql = '
            SELECT 
                a.id,
                a.mainItem,
                a.subItem,
                DATE_FORMAT(a.plansStartDay ,\'%Y-%m-%d\')as plansStartDay,
                DATE_FORMAT(a.plansFinishDay ,\'%Y-%m-%d\') as plansFinishDay,
                DATE_FORMAT(a.resultStartDay ,\'%Y-%m-%d\')as resultStartDay,
                DATE_FORMAT(a.resultsFinishDay ,\'%Y-%m-%d\') as resultsFinishDay,
                a.progress,
                a.productionCost,
                a.rep
            FROM wbs a
            WHERE a.rep = ?
            ';
            $res = DB::select($sql, [$request->user]);
            return response()->json(
                $res,
                200
            );
        } catch (\Throwable $th) {
            throw $th;
        }
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
