<?php
/*
 * Created Date: 2022-06-12 (Sun)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: ProductDAOImpl
 * Filename: ProductDAOImpl.php
 * Description:
 * 1. 제품 페이징 알고리즘 적용, 정도윤(Doyun Jung), 2022-06-12.
 * 
*/

class ProductDAOImpl implements ProductDAO{

    private $conn;

    private $SELECT_PRODUCT_VIEW_QRY;
    private $SELECT_PRODUCT_ALL_COUNT_FIND_QRY;
    private $SELECT_PRODUCT_PAGING_FIND_QRY;

    private $SELECT_PRODUCT_ALL_COUNT_QRY;
    private $SELECT_PRODUCT_PAGING_QRY;

    private function loadQuery(){

        $this->SELECT_PRODUCT_VIEW_QRY = "SELECT * FROM smart_product 
                                    WHERE product_name like ? ORDER BY product_no";

        $this->SELECT_PRODUCT_ALL_COUNT_FIND_QRY = "SELECT COUNT(*) as 'cnt' FROM smart_product
                                         WHERE product_name like ?";
        
        $this->SELECT_PRODUCT_PAGING_FIND_QRY = "SELECT * FROM smart_product 
                                        WHERE product_name like ? 
                                        ORDER BY product_no desc 
                                        LIMIT ? OFFSET ?";

        $this->SELECT_PRODUCT_ALL_COUNT_QRY = "SELECT COUNT(*) as 'cnt' FROM smart_product";

        $this->SELECT_PRODUCT_PAGING_QRY = "SELECT * FROM smart_product 
                                            ORDER BY product_no desc 
                                            LIMIT ? OFFSET ?";

    }

    public function __construct(){

    }

    public function __destruct(){

    }

    public function getConn(){
        return $this->conn;
    }

    public function setConn($conn){
        $this->conn = $conn;
    }

    public function selectProduct($productVO){

        //$boardArr = null;
        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
            //            echo "DB-참<br>";

            $mysqlConn = $my_conn->getMysqli();

            $stmt = $mysqlConn->prepare($this->SELECT_PRODUCT_VIEW_QRY);

            $stmt->bind_param("s", $productName);

            $productName = "%". $productVO->getProduct_name() . "%";

            $stmt->execute();

            $result = $stmt->get_result();

            if ( $result->num_rows == 1 ){
                $rows = $result->fetch_assoc();
            }

            $stmt->close();
            //echo $productName;
            //print_r($rows);

        }else{

        }


        return $rows;

    }

    public function selectAllProductCountFind($productVO){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_PRODUCT_ALL_COUNT_FIND_QRY);
            
            $stmt->bind_param("s", $productName);
            $productName = "%". $productVO->getProduct_name() . "%";

            $stmt->execute();

            $result = $stmt->get_result();
            
            if ( $result->num_rows == 1 ){
                $rows = $result->fetch_assoc();
            }

            $stmt->close();

        }

        return $rows;

    }

    public function selectPagingProductFind($startNum, $endNum, $productVO){


        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
    
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_PRODUCT_PAGING_FIND_QRY);

            //print_r($boardFileVO);

            $stmt->bind_param("sii", $productName, $_limnum, $_startnum);
            $productName = "%". $productVO->getProduct_name() . "%";

            // 오라클 페이징(자바 버전)
	    	//paramMap.put("startnum", startnum);		
    		//paramMap.put("endnum", endnum);			
		
            // mariaDB 페이징
            if ( $startNum === 1) {
                $_startnum = 0;
            }
            else {
                $_startnum = $startNum - 1;
            }
            
            $_limnum = ( $endNum - $startNum ) + 1;

            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            
            
        }else{
            //echo "DB-거짓";
        }

        //return $boardArr;
        return $rows;

    }

    public function selectAllProductCount(){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_PRODUCT_ALL_COUNT_QRY);
            
            $stmt->execute();

            $result = $stmt->get_result();
            
            if ( $result->num_rows == 1 ){
                $rows = $result->fetch_assoc();
            }

            $stmt->close();

        }

        return $rows;

    }

    public function selectPagingProduct($startNum, $endNum){

        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
    
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_PRODUCT_PAGING_QRY);

            //print_r($boardFileVO);

            $stmt->bind_param("ii", $_limnum, $_startnum);
            
            // 오라클 페이징(자바 버전)
	    	//paramMap.put("startnum", startnum);		
    		//paramMap.put("endnum", endnum);			
		
            // mariaDB 페이징
            if ( $startNum === 1) {
                $_startnum = 0;
            }
            else {
                $_startnum = $startNum - 1;
            }
            
            $_limnum = ( $endNum - $startNum ) + 1;

            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            
            
        }else{
            //echo "DB-거짓";
        }

        //return $boardArr;
        return $rows;

    }

}

?>