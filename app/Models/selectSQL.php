<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class SelectSql
{
  // wbs一覧取得
  public function selectWbsData()
  {
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
    return $res;
  }

  // wbs詳細取得
  public function selectDetailWbsData($req)
  {
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
    $res = DB::select($sql, [$req]);
    return $res;
  }
  // コメント一覧取得
  public function selectWbsComment($id)
  {
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
    return $res;
  }
}
