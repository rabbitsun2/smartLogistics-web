<?php
/*
 * Created Date: 2022-06-13 (Mon)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: WarehouseDAOImpl
 * Filename: WarehouseDAOImpl.php
 * Description:
 * 1. 재고 현황 기능 구현 시작, 정도윤, 2022-06-14(Tue)
 * 2. 로그 타입 출하시스템 구현, 정도윤, 2022-06-15(Wed)
 * 3. updateBeforeWarehouseLog() 출하 후 마감처리 기능, 정도윤, 2022-06-15(Wed)
 * 4. 입출고 일자별 현황 조회 쿼리 반영, 정도윤, 2022-06-16(Thu)
 * 5. 검색(키워드) 반영, 정도윤, 2022-06-27(Mon)
 * 
*/

class WarehouseDAOImpl implements WarehouseDAO{

    private $conn;

    private $INSERT_WAREHOUSE_QRY;
    private $SELECT_WAREHOUSE_ALL_COUNT_QRY;
    private $SELECT_WAREHOUSE_PAGING_QRY;
    private $SELECT_WAREHOUSE_QRY;
   
    private $INSERT_WAREHOUSE_LOG_QRY;
    private $SELECT_WAREHOUSE_LOG_ALL_COUNT_QRY;
    private $SELECT_WAREHOUSE_LOG_PAGING_QRY;
    private $SELECT_WAREHOUSE_LOG_QRY;

    private $SELECT_WAREHOUSE_LOG_VIEW_PAGING_QRY;
    private $SELECT_WAREHOUSE_LOG_VIEW_ALL_COUNT_QRY;

    private $UPDATE_WAREHOUSE_LOG_BEFORE_QRY;

    private $SELECT_WAREHOUSE_INPUT_DATE_SUM_QRY;
    private $SELECT_WAREHOUSE_OUTPUT_DATE_SUM_QRY;

    private $SELECT_WAREHOUSE_LOG_VIEW_KEYWORD_PAGING_QRY;
    private $SELECT_WAREHOUSE_LOG_VIEW_KEYWORD_ALL_COUNT_QRY;


    private function loadQuery(){

        $this->INSERT_WAREHOUSE_QRY = "INSERT INTO smart_factory_warehouse
                                    (product_no, product_cnt, create_date, create_type, ip) 
                                    VALUES(?, ?, ?, ?, ?)";

        $this->SELECT_WAREHOUSE_ALL_COUNT_QRY = "SELECT COUNT(*) as 'cnt' FROM smart_factory_warehouse";
                
        $this->SELECT_WAREHOUSE_PAGING_QRY = "SELECT * FROM smart_factory_warehouse 
                                        WHERE ORDER by id desc 
                                        LIMIT ? OFFSET ?";

        $this->SELECT_WAREHOUSE_QRY = "SELECT * from smart_factory_warehouse 
                                    WHERE product_no = ? and product_cnt = ? 
                                    and create_date = ? and create_type = ? 
                                    and ip = ?";

        $this->INSERT_WAREHOUSE_LOG_QRY = "INSERT INTO smart_factory_warehouse_log
                                        (w_id, prev_w_id, prev_cnt, release_cnt,
                                        current_cnt, current_type, release_type, release_date, ip) 
                                        VALUES(?, ?, ?, ?, ?, 
                                            ?, ?, ?, ?)";

        $this->SELECT_WAREHOUSE_LOG_ALL_COUNT_QRY = "SELECT COUNT(*) as 'cnt' FROM smart_factory_warehouse_log";

        $this->SELECT_WAREHOUSE_LOG_PAGING_QRY = "SELECT * FROM smart_factory_warehouse_log 
                                                WHERE current_type = ? OR current_type = ? ORDER by id desc 
                                                LIMIT ? OFFSET ?";

        $this->SELECT_WAREHOUSE_LOG_QRY = "SELECT smart_factory_warehouse_log.id AS 'id', smart_factory_warehouse_log.w_id, 
                                        smart_factory_warehouse.product_no, smart_product.product_name, 
                                        smart_factory_warehouse_log.prev_w_id, smart_factory_warehouse_log.prev_cnt, 
                                        smart_factory_warehouse_log.release_cnt, smart_factory_warehouse_log.current_cnt, 
                                        smart_factory_warehouse_log.current_type, smart_factory_warehouse_log.release_type,
                                        smart_factory_warehouse_log.release_date, smart_factory_warehouse_log.ip 
                                        FROM smart_product, smart_factory_warehouse, smart_factory_warehouse_log 
                                        WHERE smart_factory_warehouse.id = smart_factory_warehouse_log.w_id 
                                        AND smart_factory_warehouse.product_no = smart_product.product_no 
                                        AND smart_factory_warehouse_log.id = ?";

        $this->SELECT_WAREHOUSE_LOG_VIEW_PAGING_QRY = "SELECT smart_factory_warehouse_log.id, w_id, 
                                                smart_product.product_no as 'product_no', 
                                                smart_product.project_no as 'project_no',  
                                                smart_project.project_name as 'project_name', 
                                                product_name, 
                                                smart_product.description as 'product_description', 
                                                prev_w_id, create_date, prev_cnt, release_cnt, 
                                                current_cnt, current_type, release_type, release_date, 
                                                smart_factory_warehouse_log.ip 
                                                FROM smart_factory_warehouse_log, smart_factory_warehouse, 
                                                     smart_product, smart_project 
                                                WHERE (smart_factory_warehouse.id = smart_factory_warehouse_log.w_id) 
                                                AND (smart_factory_warehouse.product_no = smart_product.product_no) 
                                                AND (smart_product.project_no = smart_project.project_id) 
                                                AND (current_type = ? OR current_type = ?) 
                                                ORDER BY smart_factory_warehouse_log.w_id DESC LIMIT ? OFFSET ?";

        $this->SELECT_WAREHOUSE_LOG_VIEW_ALL_COUNT_QRY = "SELECT COUNT(*) as 'cnt' FROM smart_factory_warehouse_log 
                                                        WHERE current_type = ? OR current_type = ?";

        $this->UPDATE_WAREHOUSE_LOG_BEFORE_QRY = "UPDATE smart_factory_warehouse_log 
                                                SET current_type = ?, release_type = ? WHERE id = ?";

        $this->SELECT_WAREHOUSE_INPUT_DATE_SUM_QRY = "SELECT SUM(smart_factory_warehouse.product_cnt) AS 'cnt'
                                            FROM smart_factory_warehouse, smart_product 
                                            WHERE smart_factory_warehouse.product_no = smart_product.product_no AND 
                                            create_date BETWEEN CAST(? AS DATE) AND CAST(? AS DATE)";

        $this->SELECT_WAREHOUSE_OUTPUT_DATE_SUM_QRY = "SELECT SUM(smart_factory_warehouse_log.release_cnt) AS 'cnt'
                                            FROM smart_factory_warehouse_log 
                                            WHERE release_date BETWEEN CAST(? AS DATE) AND CAST(? AS DATE) 
                                            AND (current_type = ? OR current_type = ?)";

        $this->SELECT_WAREHOUSE_LOG_VIEW_KEYWORD_PAGING_QRY = "SELECT smart_factory_warehouse_log.id, w_id, 
                                                    smart_product.product_no as 'product_no', 
                                                    smart_product.project_no as 'project_no',  
                                                    smart_project.project_name as 'project_name', 
                                                    smart_product.product_name as 'product_name', 
                                                    smart_product.description as 'product_description', 
                                                    prev_w_id, create_date, prev_cnt, release_cnt, 
                                                    current_cnt, current_type, release_type, release_date, 
                                                    smart_factory_warehouse_log.ip 
                                                    FROM smart_factory_warehouse_log, smart_factory_warehouse, 
                                                        smart_product, smart_project 
                                                    WHERE (smart_factory_warehouse.id = smart_factory_warehouse_log.w_id) 
                                                    AND (smart_factory_warehouse.product_no = smart_product.product_no) 
                                                    AND (smart_product.project_no = smart_project.project_id) 
                                                    AND (current_type = ? OR current_type = ?) 
                                                    AND (smart_project.project_name like ? 
                                                    OR smart_product.product_name like ?)
                                                    ORDER BY smart_factory_warehouse_log.w_id DESC LIMIT ? OFFSET ?";

        $this->SELECT_WAREHOUSE_LOG_VIEW_KEYWORD_ALL_COUNT_QRY = "SELECT COUNT(*) as 'cnt' 
                                                    FROM smart_factory_warehouse_log, smart_factory_warehouse, 
                                                        smart_product, smart_project 
                                                    WHERE (smart_factory_warehouse.id = smart_factory_warehouse_log.w_id) 
                                                    AND (smart_factory_warehouse.product_no = smart_product.product_no) 
                                                    AND (smart_product.project_no = smart_project.project_id) 
                                                    AND (current_type = ? OR current_type = ?)
                                                    AND (smart_project.project_name like ? 
                                                    OR smart_product.product_name like ?)";

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
        //echo "특: <br>";
        //print_r($this->conn);
    }

    public function insertWarehouse($warehouseVO){
        
        $my_conn = $this->getConn();
        $result = null;
        
        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            //echo $this->INSERT_QRY;
            $stmt = $mysqlConn->prepare($this->INSERT_WAREHOUSE_QRY);

            //echo $this->INSERT_GOODS_QRY;

            $stmt->bind_param("iisss", 
                            $product_no, 
                            $product_cnt,
                            $create_date,
                            $create_type,
                            $ip);

            $product_no = $warehouseVO->getProduct_no();
            $product_cnt = $warehouseVO->getProduct_cnt();
            $create_date = $warehouseVO->getCreate_date();
            $create_type = $warehouseVO->getCreate_type();
            $ip = $warehouseVO->getIp();

            //echo $ip;

            $stmt->execute();
            //$stmt->close();
            
            return 1;
        }

        return 0;

    }

    public function selectAllWarehouseCount(){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_WAREHOUSE_ALL_COUNT_QRY);
            
            $stmt->execute();

            $result = $stmt->get_result();
            
            if ( $result->num_rows == 1 ){
                $rows = $result->fetch_assoc();
            }

            $stmt->close();

        }

        return $rows;

    }

    public function selectPagingWarehouse($startNum, $endNum){

        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
    
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_WAREHOUSE_PAGING_QRY);

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

    public function selectWarehouse($warehouseVO){

        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
    
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_WAREHOUSE_QRY);

            //print_r($boardFileVO);

            $stmt->bind_param("iisss", 
                            $product_no, 
                            $product_cnt,
                            $create_date,
                            $create_type,
                            $ip);

            $product_no = $warehouseVO->getProduct_no();
            $product_cnt = $warehouseVO->getProduct_cnt();
            $create_date = $warehouseVO->getCreate_date();
            $create_type = $warehouseVO->getCreate_type();
            $ip = $warehouseVO->getIp();


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

    public function insertWarehouseLog($warehouseLogVO){

        $my_conn = $this->getConn();
        $result = null;
        
        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            //echo $this->INSERT_QRY;
            $stmt = $mysqlConn->prepare($this->INSERT_WAREHOUSE_LOG_QRY);

            //echo $this->INSERT_GOODS_QRY;

            $stmt->bind_param("iiiiissss", 
                            $w_id, 
                            $prev_w_id,
                            $prev_cnt,
                            $release_cnt,
                            $current_cnt,
                            $current_type,
                            $release_type,
                            $release_date,
                            $ip);

            $w_id = $warehouseLogVO->getW_id();
            $prev_w_id = $warehouseLogVO->getPrev_w_id();
            $prev_cnt = $warehouseLogVO->getPrev_cnt();
            $release_cnt = $warehouseLogVO->getRelease_cnt();
            $current_cnt = $warehouseLogVO->getCurrent_cnt();
            $current_type = $warehouseLogVO->getCurrent_type();
            $release_type = $warehouseLogVO->getRelease_type();
            $release_date = $warehouseLogVO->getRelease_date();
            $ip = $warehouseLogVO->getIp();
            

            //echo $ip;

            $stmt->execute();
            //$stmt->close();
            
            return 1;
        }

        return 0;

    }

    public function selectAllWarehouseLogCount(){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_WAREHOUSE_LOG_ALL_COUNT_QRY);
            
            $stmt->execute();

            $result = $stmt->get_result();
            
            if ( $result->num_rows == 1 ){
                $rows = $result->fetch_assoc();
            }

            $stmt->close();

        }

        return $rows;

    }

    public function selectPagingWarehouseLog($startNum, $endNum){

        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
    
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_WAREHOUSE_LOG_PAGING_QRY);

            //print_r($boardFileVO);

            $stmt->bind_param("ssii", 
                                $current_type1, 
                                $current_type2, 
                                $_limnum, 
                                $_startnum);

            $current_type1 = "신규";
            $current_type2 = "최근";

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

    public function selectOneWarehouseLog($warehouseLogVO){

        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
    
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_WAREHOUSE_LOG_QRY);

            //print_r($boardFileVO);

            $stmt->bind_param("i", $id);

            $id = $warehouseLogVO->getId();


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

    public function selectPagingWarehouseLogView($startNum, $endNum){

        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
    
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_WAREHOUSE_LOG_VIEW_PAGING_QRY);

            //print_r($boardFileVO);

            $stmt->bind_param("ssii", 
                                $current_type1, 
                                $current_type2, 
                                $_limnum, 
                                $_startnum);

            $current_type1 = "신규";
            $current_type2 = "최근";

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

    public function selectAllWarehouseLogViewCount(){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_WAREHOUSE_LOG_VIEW_ALL_COUNT_QRY);
            
            $stmt->bind_param("ss", 
                                $current_type1, 
                                $current_type2);

            $current_type1 = "신규";
            $current_type2 = "최근";

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
            
            if ( $result->num_rows == 1 ){
                $rows = $result->fetch_assoc();
            }

            $stmt->close();

        }

        return $rows;

    }

    public function updateBeforeWarehouseLog($warehouseLogVO){

        $my_conn = $this->getConn();

        $this->loadQuery();
        
        //echo "참3 <br>";
        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            
            // 트랜젝션
            $mysqlConn->begin_transaction();

            //echo "참4 - mysqlConn<br>";
            //echo "참5 - " . $this->UPDATE_WAREHOUSE_LOG_BEFORE_QRY . "<br>";
                            
            try{
                //echo $this->DELETE_QRY;
                $stmt = $mysqlConn->prepare($this->UPDATE_WAREHOUSE_LOG_BEFORE_QRY);

                //print_r($boardVO);

                $stmt->bind_param("ssi", 
                                $current_type,
                                $release_type,
                                $id);

                $current_type = $warehouseLogVO->getCurrent_type();
                $release_type = $warehouseLogVO->getRelease_type();
                $id = $warehouseLogVO->getId();


                $stmt->execute();

                $mysqlConn->commit();

            }catch(mysqli_sql_exception $exception){

                $mysqlConn->rollback();
                throw $exception;

                //echo "참7 - 오류 <br>";

                return 0;
            }

        }

        //echo "참7 - 성공 <br>";

        return 1;

    }

    public function selectWarehouseBetweenSumOfInputCnt($startDate, $endDate){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_WAREHOUSE_INPUT_DATE_SUM_QRY);
            
            $stmt->bind_param("ss", 
                                $_startDate, 
                                $_endDate);

            $_startDate = $startDate;
            $_endDate = $endDate;

            $stmt->execute();

            $result = $stmt->get_result();
            
            if ( $result->num_rows == 1 ){
                $rows = $result->fetch_assoc();
            }

            $stmt->close();

        }

        return $rows;

    }

    public function selectWarehouseBetweenSumOfOutputCnt($startDate, $endDate){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_WAREHOUSE_OUTPUT_DATE_SUM_QRY);
            
            $stmt->bind_param("ssss", 
                                $_startDate, 
                                $_endDate,
                                $current_type1,
                                $current_type2);

            $_startDate = $startDate;
            $_endDate = $endDate;
            $current_type1 = "신규";
            $current_type2 = "최근";

            $stmt->execute();

            $result = $stmt->get_result();
            
            if ( $result->num_rows == 1 ){
                $rows = $result->fetch_assoc();
            }

            $stmt->close();

        }

        return $rows;

    }

    public function selectPagingWarehouseLogKeywordView($startNum, $endNum, $keyword){

        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
    
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_WAREHOUSE_LOG_VIEW_KEYWORD_PAGING_QRY);

            //print_r($boardFileVO);

            $stmt->bind_param("ssssii", 
                                $current_type1, 
                                $current_type2, 
                                $keyword1, 
                                $keyword2, 
                                $_limnum, 
                                $_startnum);

            $current_type1 = "신규";
            $current_type2 = "최근";

            $keyword1 = "%". $keyword . "%";
            $keyword2 = "%". $keyword . "%";

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

    public function selectAllWarehouseLogViewKeywordCount($keyword){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_WAREHOUSE_LOG_VIEW_KEYWORD_ALL_COUNT_QRY);
            
            $stmt->bind_param("ssss", 
                                $current_type1, 
                                $current_type2,
                                $keyword1,
                                $keyword2);

            $current_type1 = "신규";
            $current_type2 = "최근";

            $keyword1 = "%". $keyword . "%";
            $keyword2 = "%". $keyword . "%";

            $stmt->execute();

            $result = $stmt->get_result();
            
            if ( $result->num_rows == 1 ){
                $rows = $result->fetch_assoc();
            }

            $stmt->close();

        }

        return $rows;

    }

}

?>