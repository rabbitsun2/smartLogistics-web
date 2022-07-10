<?php
/*
 * Created Date: 2022-06-12 (Sun)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: ProductServiceImpl
 * Filename: ProductServiceImpl.php
 * Description:
 * 1. 제품 품목 찾기 / 페이징 기능 추가, 정도윤(Doyun Jung), 2022-06-13.
 */

class ProductServiceImpl implements ProductService{

    private $productDAO;
    private $conn;

    public function __construct(){
        $this->productDAO = null;
    }

    public function __destruct(){

        if ( $this->productDAO != null ){
            unset($this->productDAO);
        }

    }

    public function getConn(){
        return $this->conn;
    }

    public function setConn($conn){
        $this->conn = $conn;
    }
    
    private function loadDAO(){
        
        $this->productDAO = new ProductDAOImpl();
        
        $my_conn = $this->getConn();
        $this->productDAO->setConn($my_conn);

    }

    public function selectProduct($productVO){
        
        $this->loadDAO();
        return $this->productDAO->selectProduct($productVO);
    }

    public function selectAllProductCountFind($productVO){

        $this->loadDAO();
        return $this->productDAO->selectAllProductCountFind($productVO);
    }

    public function selectPagingProductFind($startNum, $endNum, $productVO){

        $this->loadDAO();
        return $this->productDAO->selectPagingProductFind($startNum, $endNum, $productVO);
    }

    public function selectAllProductCount(){
        $this->loadDAO();
        return $this->productDAO->selectAllProductCount();
    }

    public function selectPagingProduct($startNum, $endNum){
        $this->loadDAO();
        return $this->productDAO->selectPagingProduct($startNum, $endNum);
    }
    
    public function selectFullProductQry($productVO){
        $this->loadDAO();
        return $this->productDAO->selectFullProductQry($productVO);
    }

    public function insertProduct($productVO){
        $this->loadDAO();
        return $this->productDAO->insertProduct($productVO);
    }

    public function insertProductFile($productFileVO){
        $this->loadDAO();
        return $this->productDAO->insertProductFile($productFileVO);
    }

    public function selectFindUUIDProductFile($productFileVO){
        $this->loadDAO();
        return $this->productDAO->selectFindUUIDProductFile($productFileVO);
    }

    public function selectFindIDProduct($productVO){
        $this->loadDAO();
        return $this->productDAO->selectFindIDProduct($productVO);
    }

    public function selectFindIDProductFile($productFileVO){
        $this->loadDAO();
        return $this->productDAO->selectFindIDProductFile($productFileVO);
    }

}

?>