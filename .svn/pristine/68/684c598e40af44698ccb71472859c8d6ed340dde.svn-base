<?php
/*
 * Created Date: 2022-06-06 (Mon)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: EmployeeDAOImpl
 * Filename: EmployeeDAOImpl.php
 * Description:
 *
*/

class EmployeeDAOImpl implements EmployeeDAO{

    private $conn;

    private $EMPLOYEE_VIEW_QRY;
    private $EMPLOYEE_AUTH_ALL_QRY;
    private $INSERT_EMPLOYEE_QRY;
    private $SELECT_EMPLOYEE_ALL_COUNT_QRY;
    private $SELECT_EMPLOYEE_PAGING_QRY;
    private $UPDATE_EMPLOYEE_QRY;
    private $DELETE_EMPLOYEE_QRY;

    private function loadQuery(){

        $this->EMPLOYEE_VIEW_QRY = "SELECT emp_no, emp_auth, auth_name, usrname, passwd, regidate, modify_date, ip  
                                    FROM smart_employee, smart_employee_auth WHERE smart_employee.emp_auth = smart_employee_auth.id AND 
                                    emp_no = ?";

        $this->EMPLOYEE_AUTH_ALL_QRY = "SELECT * FROM smart_employee_auth ORDER BY id";

        $this->INSERT_EMPLOYEE_QRY = "INSERT INTO smart_employee(emp_auth, usrname, passwd, regidate, modify_date, ip) 
                                    VALUES(?, ?, ?, ?, ?, ?)";

        $this->SELECT_EMPLOYEE_ALL_COUNT_QRY = "SELECT COUNT(*) as 'cnt' FROM smart_employee";

        $this->SELECT_EMPLOYEE_PAGING_QRY = "SELECT emp_no, emp_auth, auth_name, usrname, passwd, regidate, modify_date, ip  
                                            FROM smart_employee, smart_employee_auth 
                                            WHERE smart_employee.emp_auth = smart_employee_auth.id 
                                            ORDER by emp_no desc 
                                            LIMIT ? OFFSET ?";

        $this->UPDATE_EMPLOYEE_QRY = "UPDATE smart_employee SET emp_auth = ?, usrname = ?, passwd = ?, modify_date = ?  
                                    WHERE emp_no = ?";

        $this->DELETE_EMPLOYEE_QRY = "DELETE FROM smart_employee WHERE emp_no = ? AND passwd = ?";

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

    public function selectEmployee($employeeVO){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            //echo $this->INSERT_QRY;

            //echo "참1";
            $stmt = $mysqlConn->prepare($this->EMPLOYEE_VIEW_QRY);

            //echo $this->SELECT_VIEW_QRY;
            //print_r($boardVO);

            //echo "참2";
            $stmt->bind_param("i", $emp_no);
            
            $emp_no = $employeeVO->getEmp_no();

            //echo $id . "할로<br>";

            $stmt->execute();
            //echo "참3";

            $result = $stmt->get_result();
            
            if ( $result->num_rows == 1 ){
                //echo "참";

                /*
                while( $row = $result->fetch_assoc() ){
                    $rows[] = $row;
                }
                */

                $rows = $result->fetch_assoc();
                
                //echo $result->num_rows . "/";
                //print_r($rows);
                //echo "<br>";

            }

            $stmt->close();

            //print_r($rows);

        }
        //echo "참4";
        return $rows;

    }

    public function selectEmployeeAuth(){

        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
    
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->EMPLOYEE_AUTH_ALL_QRY);

            //print_r($boardFileVO);

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

    public function insertEmployee($employeeVO){
        
        $my_conn = $this->getConn();
        $result = null;
        
        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            //echo $this->INSERT_QRY;
            $stmt = $mysqlConn->prepare($this->INSERT_EMPLOYEE_QRY);

            //echo $this->INSERT_GOODS_QRY;

            $stmt->bind_param("isssss", 
                            $emp_auth, 
                            $usrname,
                            $passwd,
                            $regidate,
                            $modify_date, 
                            $ip);

            $emp_auth = $employeeVO->getEmp_auth();
            $usrname = $employeeVO->getUsrname();
            $passwd = $employeeVO->getPasswd();
            $regidate = $employeeVO->getRegidate();
            $modify_date = $employeeVO->getModify_date();
            $ip = $employeeVO->getIp();

            //echo $ip;

            $stmt->execute();
            //$stmt->close();
            
            return 1;
        }

        return 0;

    }

    public function selectAllEmployeeCount(){

        $my_conn = $this->getConn();
        $result = null;
        $rows = null;

        $this->loadQuery();

        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_EMPLOYEE_ALL_COUNT_QRY);
            
            $stmt->execute();

            $result = $stmt->get_result();
            
            if ( $result->num_rows == 1 ){
                $rows = $result->fetch_assoc();
            }

            $stmt->close();

        }

        return $rows;

    }

    public function selectPagingEmployee($startNum, $endNum){

        $rows = null;
        $my_conn = $this->getConn();
        $result = null;

        $this->loadQuery();

        if ( $my_conn != null ){
    
            $mysqlConn = $my_conn->getMysqli();
            $stmt = $mysqlConn->prepare($this->SELECT_EMPLOYEE_PAGING_QRY);

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

    public function updateEmployee($employeeVO){
        
        $my_conn = $this->getConn();

        $this->loadQuery();
        
        //echo "참3 <br>";
        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            
            // 트랜젝션
            $mysqlConn->begin_transaction();

            try{
                //echo $this->DELETE_QRY;
                $stmt = $mysqlConn->prepare($this->UPDATE_EMPLOYEE_QRY);

                //print_r($boardVO);

                $stmt->bind_param("isssi", 
                                $emp_auth,
                                $usrname,
                                $passwd, 
                                $modify_date, 
                                $emp_no);

                $emp_auth = $employeeVO->getEmp_auth();
                $usrname = $employeeVO->getUsrname();
                $passwd = $employeeVO->getPasswd();
                $modify_date = $employeeVO->getModify_date();
                $emp_no = $employeeVO->getEmp_no();


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

    public function deleteEmployee($employeeVO){

        $my_conn = $this->getConn();

        $this->loadQuery();
        
        //echo "참3 <br>";
        if($my_conn != null ){
            
            $mysqlConn = $my_conn->getMysqli();
            
            // 트랜젝션
            $mysqlConn->begin_transaction();

            try{
                //echo $this->DELETE_QRY;
                $stmt = $mysqlConn->prepare($this->DELETE_EMPLOYEE_QRY);

                //print_r($boardVO);

                $stmt->bind_param("ss", 
                                $emp_no, 
                                $passwd);

                $emp_no = $employeeVO->getEmp_no();
                $passwd = $employeeVO->getPasswd();

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

}

?>