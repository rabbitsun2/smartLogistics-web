<?php
/*
 * Created Date: 2022-06-09 (Thu)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: Controller
 * Filename: EmployeeController.php
 * Description:
 *
 */

class EmployeeController extends Controller {
    
    private $emp_service;
    
    public function __construct(){
        
    }
    
    public function __destruct(){
        
    }
    
    private function loadService(){
        
        $this->emp_service = new EmployeeServiceImpl();
        
        $my_conn = $this->getConn();
        $this->emp_service->setConn($my_conn);

        // print_r($my_conn);
        // echo "<br>";
        // print_r($this->emp_service);

    }
    
    private function templateDir(){
                
    }
    
    public function login($employeeVO){
        //echo "홈2 / 참";
        //require_once $this->root_dir . "view/home.php";
        
        $status = -1;
        
        $this->loadService();
        
        // print_r($my_conn);
        // echo "<br>";
        // print_r($this->emp_service);
        $resultEmpVO = $this->emp_service->selectEmployee($employeeVO);
        
        // print_r($employeeVO);
        // echo "<br>";
        // print_r($resultEmpVO);
        // echo "<br>";
        
        // echo "--------<br>";
        // echo "출력1:" . $status;
        // echo "<br>";
        
        // 데이터가 존재할 때
        if ( isset($resultEmpVO) ){
                    
            // 아이디 일치 여부
            if ( strcmp($employeeVO->getEmp_no(), $resultEmpVO["emp_no"] ) === 0 ){
                $status = 1;
            }else{
                $status = 2;
            }
            
            // echo "출력2:" . $status;
            // echo "<br>";
            
            // 비밀번호 일치 여부
            if ( strcmp($employeeVO->getPasswd(), $resultEmpVO["passwd"] ) === 0
                 && $status === 1 ){
                $status = 1;
            }else{
                $status = 3;
            }
            
            // echo "출력3:" . $status;
            // echo "<br>";
                        
        }
        
        // 로그인 세션 생성
        if ( $status === 1 ){
            
            $_SESSION['emp_no'] = $resultEmpVO['emp_no'];
            $_SESSION['emp_auth'] = $resultEmpVO['emp_auth'];
            $_SESSION['auth_name'] = $resultEmpVO['auth_name'];
            $_SESSION['usrname'] = $resultEmpVO['usrname'];
            $_SESSION['passwd'] = $resultEmpVO['passwd'];

            
            echo "<script>";
            echo "location.replace('../portal/main');";
            echo "</script>";
            exit;
        }
        else if ( $status === 2 ){
            
            echo "<script>";
            echo "alert('아이디가 일치하지 않습니다.');";
            echo "location.replace('../..');";
            echo "</script>";
            exit;
            
        }
        else if ( $status === 3 ){
            
            echo "<script>";
            echo "alert('비밀번호가 일치하지 않습니다.');";
            echo "location.replace('../..');";
            echo "</script>";
            exit;
            
        }
        else if ( $status === -1 ){
            
            echo "<script>";
            echo "alert('계정 정보를 찾을 수 없습니다.');";
            echo "location.replace('../..');";
            echo "</script>";
            exit;
            
        }
        
        /*
        $this->templateDir();
        $smarty = $this->getSmarty();
        $smarty->clearAllCache();
        
        $smarty->assign("title", "Smart Logistics");
        $smarty->display('index.tpl');
        
        */
        
    }
    
}

?>