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
    $sql = <<<EOT
    SELECT 
      wbsId,user,comment,created_at 
    FROM wbs_comment
    WHERE wbsId = {$id}
    EOT;
    return $sql;
  }

  // WBS更新
  public function updateWbsData($req, $id)
  {
    $sql = '
    UPDATE wbs
    SET 
      mainItem = ?,
      subItem = ?,
      plansStartDay=CONVERT(?,DATETIME),
      plansFinishDay=CONVERT(?,DATETIME),
      resultStartDay=CONVERT(?,DATETIME),
      resultsFinishDay=CONVERT(?,DATETIME),
      progress=?,
      productionCost=?,
      rep-?
    WHERE id = ?
    ';
    DB::update($sql, [
      $req->mainItem, $req->subItem, $req->plansStartDay, $req->plansFinishDay, $req->resultStartDay, $req->resultsFinishDay,
      $req->progress, $req->productionCost, $req->rep, $id
    ]);
  }
}
