<?php

namespace App\Models;

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
    return $sql;
  }

  // wbs詳細取得
  public function selectDetailWbsData($id)
  {
    $sql = <<<EOT
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
    WHERE a.id = {$id}
    EOT;
  }

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
}
