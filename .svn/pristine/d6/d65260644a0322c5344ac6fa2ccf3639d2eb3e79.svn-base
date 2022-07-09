<?php
/*
 * Created Date: 2022-06-13 (Mon)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: WarehouseService
 * Filename: WarehouseService.php
 * Description:
 * 1. 재고 현황 기능 구현 시작, 정도윤, 2022-06-14(Tue)
 * 2. updateBeforeWarehouseLog() 출하 후 마감처리 기능, 정도윤, 2022-06-15(Wed)
 * 3. 검색(키워드) 반영, 정도윤, 2022-06-27(Mon)
 */

interface WarehouseService{

    public function insertWarehouse($warehouseVO);
    public function selectAllWarehouseCount();
    public function selectPagingWarehouse($startNum, $endNum);
    public function selectWarehouse($warehouseVO);

    public function insertWarehouseLog($warehouseLogVO);
    public function selectAllWarehouseLogCount();
    public function selectPagingWarehouseLog($startNum, $endNum);
    public function selectOneWarehouseLog($warehouseLogVO);

    public function selectPagingWarehouseLogView($startNum, $endNum);
    public function selectAllWarehouseLogViewCount();

    public function updateBeforeWarehouseLog($warehouseLogVO);

    public function selectWarehouseBetweenSumOfInputCnt($startDate, $endDate);
    public function selectWarehouseBetweenSumOfOutputCnt($startDate, $endDate);

    public function selectPagingWarehouseLogKeywordView($startNum, $endNum, $keyword);
    public function selectAllWarehouseLogViewKeywordCount($keyword);

}

?>