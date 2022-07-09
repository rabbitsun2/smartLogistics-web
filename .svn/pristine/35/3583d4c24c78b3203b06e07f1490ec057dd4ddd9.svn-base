<?php
/*
 * Created Date: 2022-06-17 (Fri)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: Controller
 * Filename: ConfigController.php
 * Description:
 * 1. 사용자 계정 수정 처리 프로세스 추가, 정도윤, 2022-07-02 (Sat).
 * 
 */

class ConfigController extends Controller {
 
    private $employee_service;

    public function __construct(){
        
    }
    
    public function __destruct(){
        
    }
    
    private function templateDir(){

        $smarty = $this->getSmarty();
        $root_dir = $this->getRootDir();
        $smarty->setTemplateDir($root_dir . '/view/main/core');

        $this->setSmarty($smarty);
        
    }

    private function loadService(){
        
        $this->employee_service = new EmployeeServiceImpl();
        
        $my_conn = $this->getConn();
        $this->employee_service->setConn($my_conn);

        //print_r($this->warehouse_service);

    }
    

    public function employee_register(){
        
        $this->templateDir();
        $this->loadService();

        $smarty = $this->getSmarty();
        $smarty->clearAllCache();

        $empAuthList = $this->employee_service->selectEmployeeAuth();

        //echo "참";
        //print_r($empAuthList);

        $smarty->assign("emp_auth_list", $empAuthList);
        $smarty->assign("title", "계정/사용자 등록:::Smart Logistics");
        $smarty->assign("session_emp_no", $_SESSION['emp_no']);
        $smarty->assign("session_auth_name", $_SESSION['auth_name']);
        $smarty->assign("session_usrname", $_SESSION['usrname']);
        $smarty->assign("option_selected", "NE");
        $smarty->assign("today", date("Y-m-d H:i:s"));
        $smarty->display('emp_register.tpl');

    }

    public function employee_register_ok($employeeVO){

        $status = 1;

        $this->loadService();

        //print_r($employeeVO);

        // 권한 입력 여부 상태
        if ($employeeVO->getEmp_auth() !== -1 &&
            $status === 1){
            $status = 1;
        }else{
            $status = -1;
        }

        // 사용자명 입력 상태
        if ($employeeVO->getUsrname() !== -1 &&
            $status === 1){
            $status = 1;
        }else{
            $status = -2;
        }

        // 비밀번호 입력 상태
        if ( ( $employeeVO->getPasswd() !== -1 && 
            $employeeVO->getPasswd() !== -2 &&
            $employeeVO->getPasswd() !== -3 ) &&
            $status === 1){
            $status = 1;

        }else if ( $employeeVO->getPasswd() === -1 &&
                    $status === 1){
            $status = -3;

        }else if ( $employeeVO->getPasswd() === -2 &&
                    $status === 1){
            $status = -4;

        }else if ( $employeeVO->getPasswd() === -3 &&
                    $status === 1){
            $status = -5;

        }

        //echo "참3 /" . $status . "<br>";

        // 입력 프로세스
        if ($status === 1){
            //echo "참4<br>";
            $result = $this->employee_service->insertEmployee($employeeVO);

            if ($result === 1){
                echo "<script>";
                echo "alert ('성공적으로 등록되었습니다.');";
                echo "location.replace('../portal/employee?func=register');";
                echo "</script>";
                exit;
            }

            //echo "참5<br>";

        }
        else if ($status === -1){

            echo "<script>";
            echo "alert ('권한을 입력해주세요.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else if ($status === -2){

            echo "<script>";
            echo "alert ('사용자명을 입력해주세요.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else if ($status === -3){

            echo "<script>";
            echo "alert ('비밀번호를 올바르게 입력해주세요.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else if ($status === -4){

            echo "<script>";
            echo "alert ('비밀번호를 입력해주세요.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else if ($status === -5){

            echo "<script>";
            echo "alert ('비밀번호가 일치하지 않습니다.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else{

            echo "<script>";
            echo "alert ('비정상적인 접근입니다.');";
            echo "history.back();";
            echo "</script>";
            exit;

        }

    }

    public function employee_list($pageCri){
        
        $this->templateDir();
        $this->loadService();

        $smarty = $this->getSmarty();
        $smarty->clearAllCache();


        //echo "참";
        //print_r($empAuthList);
        $paging = new Paging();

        $result = $this->employee_service->selectAllEmployeeCount();
        $total_cnt = $result['cnt'];


        $page_no = $pageCri->getPage();
        $page_size = $pageCri->getPerPageNum();

        $paging->setPageNo($page_no);
        $paging->setPageSize($page_size);
        $paging->setTotalCount($total_cnt);

        $pagingObj = $paging->getObject();

        $startnum = $paging->getDbStartNum();
        $endnum = $paging->getDbEndNum();

        //$resultProductVO = $this->product_service->selectProduct($productVO);

        $employeeList = $this->employee_service->selectPagingEmployee($startnum, $endnum);


        $var_fn = "&func=list";

        $smarty->assign("employeeList", $employeeList);
        $smarty->assign("pagingObj", $pagingObj);
        $smarty->assign("fn", $var_fn);
        $smarty->assign("title", "계정/사용자 관리:::Smart Logistics");
        $smarty->assign("session_emp_no", $_SESSION['emp_no']);
        $smarty->assign("session_auth_name", $_SESSION['auth_name']);
        $smarty->assign("session_usrname", $_SESSION['usrname']);
        $smarty->assign("option_selected", "NE");
        $smarty->assign("today", date("Y-m-d H:i:s"));
        $smarty->display('emp_list.tpl');

    }

    public function employee_modify(){
        
        $this->templateDir();
        $this->loadService();

        $smarty = $this->getSmarty();
        $smarty->clearAllCache();

        $empVO = new EmployeeVO();
        $empVO->setEmp_no($_GET['idx']);

        $empAuthList = $this->employee_service->selectEmployeeAuth();
        $resultEmpVO = $this->employee_service->selectEmployee($empVO);

        if ( isset($resultEmpVO) ){

            // 버그 개선(결과값 출력)
            if ( ArrayUtil::getDimensionArray($resultEmpVO) !== -1 ||
                ArrayUtil::getDimensionArray($resultEmpVO) !== 1 ){
                $resultEmpVO = array(0 => $resultEmpVO);
            }

            $smarty->assign("emp_item", $resultEmpVO);
            $smarty->assign("emp_auth_list", $empAuthList);

            $smarty->assign("title", "계정/사용자 수정:::Smart Logistics");
            $smarty->assign("session_emp_no", $_SESSION['emp_no']);
            $smarty->assign("session_auth_name", $_SESSION['auth_name']);
            $smarty->assign("session_usrname", $_SESSION['usrname']);
            $smarty->assign("option_selected", "NE");
            $smarty->assign("today", date("Y-m-d H:i:s"));
            $smarty->display('emp_modify.tpl');

        }

        else if ( !isset($resultEmpVO) ){
            
            echo "<script>";
            echo "alert('사용자 계정이 존재하지 않습니다.');";
            echo "location.replace('../portal/employee?func=list');";
            echo "</script>";
            exit;

        }

    }

    public function employee_modify_ok($curEmpVO, $updateEmpVO){

        $this->loadService();

        $status = -1;
        $resultEmpVO = $this->employee_service->selectEmployee($curEmpVO);

        if ( isset ( $resultEmpVO ) ){

            if ( strcmp( $resultEmpVO['passwd'], $curEmpVO->getPasswd() ) === 0 ){
                $status = 1;
            }

        }else{
            $status = -6;
        }

        // 사용자 계정이 존재할 때, 기존 비밀번호가 일치할 때
        if ( $status === 1 ){

            // 권한 입력 여부 상태
            if ($updateEmpVO->getEmp_auth() !== -1 &&
                $status === 1){
                $status = 1;
            }else{
                $status = -1;
            }

            // 사용자명 입력 상태
            if ($updateEmpVO->getUsrname() !== -1 &&
                $status === 1){
                $status = 1;
            }else{
                $status = -2;
            }

            // 비밀번호 입력 상태
            if ( ( $updateEmpVO->getPasswd() !== -1 && 
                $updateEmpVO->getPasswd() !== -2 &&
                $updateEmpVO->getPasswd() !== -3 ) &&
                $status === 1){
                $status = 1;

            }else if ( $updateEmpVO->getPasswd() === -1 &&
                    $status === 1){
                
                $status = -3;

            }else if ( $updateEmpVO->getPasswd() === -2 &&
                    $status === 1){
                $status = -4;

            }else if ( $updateEmpVO->getPasswd() === -3 &&
                    $status === 1){
                $status = -5;

            }

        }

        // 수정 프로세스
        if ($status === 1){
            
            $result = $this->employee_service->updateEmployee($updateEmpVO);

            if ($result === 1){
                echo "<script>";
                echo "alert ('성공적으로 수정하였습니다.');";
                echo "location.replace('../portal/employee?func=list');";
                echo "</script>";
                exit;
            }

            //echo "참5<br>";

        }
        else if ($status === -1){

            echo "<script>";
            echo "alert ('권한을 입력해주세요.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else if ($status === -2){

            echo "<script>";
            echo "alert ('사용자명을 입력해주세요.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else if ($status === -3){

            echo "<script>";
            echo "alert ('비밀번호를 올바르게 입력해주세요.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else if ($status === -4){

            echo "<script>";
            echo "alert ('비밀번호를 입력해주세요.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else if ($status === -5){

            echo "<script>";
            echo "alert ('비밀번호가 일치하지 않습니다.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else if ($status === -6){

            echo "<script>";
            echo "alert ('사용자 계정을 찾을 수 없습니다.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else{

            echo "<script>";
            echo "alert ('비정상적인 접근입니다.');";
            echo "history.back();";
            echo "</script>";
            exit;

        }

    }

    
    public function employee_delete(){
        
        $this->templateDir();
        $this->loadService();

        $smarty = $this->getSmarty();
        $smarty->clearAllCache();

        $empVO = new EmployeeVO();
        $empVO->setEmp_no($_GET['idx']);

        $empAuthList = $this->employee_service->selectEmployeeAuth();
        $resultEmpVO = $this->employee_service->selectEmployee($empVO);

        if ( isset($resultEmpVO) ){

            // 버그 개선(결과값 출력)
            if ( ArrayUtil::getDimensionArray($resultEmpVO) !== -1 ){
                $resultEmpVO = array(0 => $resultEmpVO);
            }

            $smarty->assign("emp_item", $resultEmpVO);
            $smarty->assign("emp_auth_list", $empAuthList);

            $smarty->assign("title", "계정/사용자 삭제:::Smart Logistics");
            $smarty->assign("session_emp_no", $_SESSION['emp_no']);
            $smarty->assign("session_auth_name", $_SESSION['auth_name']);
            $smarty->assign("session_usrname", $_SESSION['usrname']);
            $smarty->assign("option_selected", "NE");
            $smarty->assign("today", date("Y-m-d H:i:s"));
            $smarty->display('emp_delete.tpl');

        }

        else if ( !isset($resultEmpVO) ){
            
            echo "<script>";
            echo "alert('사용자 계정이 존재하지 않습니다.');";
            echo "location.replace('../portal/employee?func=list');";
            echo "</script>";
            exit;

        }

    }

    public function employee_delete_ok($curEmpVO){

        $this->loadService();

        $status = -1;
        $resultEmpVO = $this->employee_service->selectEmployee($curEmpVO);

        if ( isset ( $resultEmpVO ) ){

            if ( strcmp( $resultEmpVO['passwd'], $curEmpVO->getPasswd() ) === 0 ){
                $status = 1;
            }else{
                $status = -2;
            }

        }

        // 비밀번호 길이가 일치하지 않을 때
        if ( $curEmpVO->getPasswd() === -1
             && $status === 1 ){
            $status = -3;
        }


        // 삭제 프로세스
        if ($status === 1){
                
            $result = $this->employee_service->deleteEmployee($curEmpVO);

            if ($result === 1){
                echo "<script>";
                echo "alert ('성공적으로 삭제하였습니다.');";
                echo "location.replace('../portal/employee?func=list');";
                echo "</script>";
                exit;
            }

        }

        else if ($status === -1){

            echo "<script>";
            echo "alert ('사용자 계정을 찾을 수 없습니다.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else if ($status === -2){

            echo "<script>";
            echo "alert ('비밀번호가 일치하지 않습니다.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else if ($status === -3){

            echo "<script>";
            echo "alert ('비밀번호 길이가 작습니다.');";
            echo "history.back();";
            echo "</script>";
            exit;
        }
        else{

            echo "<script>";
            echo "alert ('비정상적인 접근입니다.');";
            echo "history.back();";
            echo "</script>";
            exit;

        }

    }


}

?>