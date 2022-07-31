<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wbs;
use App\Models\WbsComment;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
                'wbsId' => $req->wbsId,
                'user' => $req->user,
                'comment' => $req->comment,
                'confirmFlag' => $req->confirmFlag
            ];
            $comment = WbsComment::create($create);
            return response()->json(
                $comment,
                200
            );
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $sql = '
            SELECT 
              wbsId,
              user,
              comment,
              DATE_FORMAT(created_at ,\'%Y-%m-%d\') as createdTime,
              confirmFlag
            FROM wbs_comment
            ';
            $res = DB::select($sql);
            return response()->json(
                $res,
                200
            );
        } catch (\Throwable $th) {
            return $th;
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
                'wbsItem' => $req->wbsId,
                'user' => $req->user,
                'comment' => $req->comment,
            ];
            WbsComment::where('id', $id)->update($update);
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
            $comment = WbsComment::where('id', $id)->delete();
            if ($comment) {
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
