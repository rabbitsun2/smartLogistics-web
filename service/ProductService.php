<?php
/*
 * Created Date: 2022-06-12 (Sun)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: ProductService
 * Filename: ProductService.php
 * Description:
 *
 */

interface ProductService{

    public function selectProduct($productVO);
    public function selectAllProductCountFind($productVO);
    public function selectPagingProductFind($startNum, $endNum, $productVO);

    public function selectAllProductCount();
    public function selectPagingProduct($startNum, $endNum);

    public function selectFullProductQry($productVO);
    public function insertProduct($productVO);
    public function insertProductFile($productFileVO);

    public function selectFindUUIDProductFile($productFileVO);
    public function selectFindIDProduct($productVO);
    public function selectFindIDProductFile($productFileVO);

}

?>