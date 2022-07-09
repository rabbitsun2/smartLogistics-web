<?php
/*
 * Created Date: 2022-06-06 (Mon)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: Controller
 * Filename: PortalController.php
 * Description:
 * 1. 제품 현황 페이지 추가 시작, 정도윤, 2022-06-16(Thu)
 * 2. 사용자 관리 페이지 추가 시작, 정도윤, 2022-06-19(Sun)
 * 3. 사용자 수정, 사용자 삭제 기능 추가, 정도윤, 2022-07-02(Sat)
 * 4. 프로젝트 목록 조회, 정도윤, 2022-07-02(Sat)
 * 5. 프로젝트 등록 기능 추가, 정도윤, 2022-07-03(Sun)
 * 6. 프로젝트 등록 기능(파일 첨부) 추가, 정도윤, 2022-07-03 (Sun)
 */

class PortalController extends Controller {
    
    private $factoryController;
    private $productController;
    private $projectController;
    private $configController;

    private $product_service;
    private $warehouse_service;
    private $project_service;

    private $FUNC_INPUT = 1;
    private $FUNC_OUTPUT = 2;

    public function __construct(){

        $this->factoryController = NULL;
        $this->productController = NULL;
        $this->projectController = NULL;
        $this->configController = NULL;

    }
    
    public function __destruct(){
        
        if ( $this->factoryController != NULL ){
            unset( $this->factoryController );
        }

        if ( $this->productController != NULL ){
            unset( $this->productController );
        }

        if ( $this->projectController != NULL ){
            unset( $this->projectController );
        }

        if ( $this->configController != NULL ){
            unset( $this->configController );
        }

    }

    private function loadController(){
        
        $factoryController = new FactoryController();
        $productController = new ProductController();
        $projectController = new ProjectController();
        $configController = new ConfigController();

        // Controller 루트 경로 셋팅
        $factoryController->setRootDir( $this->getRootDir() );
        $productController->setRootDir( $this->getRootDir() );
        $projectController->setRootDir( $this->getRootDir() );
        $configController->setRootDir( $this->getRootDir() );
        
        // Controller 스마티 셋팅
        $factoryController->setSmarty( $this->getSmarty() );
        $productController->setSmarty( $this->getSmarty() );
        $projectController->setSmarty( $this->getSmarty() );
        $configController->setSmarty( $this->getSmarty() );

        // DB 셋팅
        $factoryController->setConn( $this->getConn() );
        $productController->setConn( $this->getConn() );
        $projectController->setConn( $this->getConn() );
        $configController->setConn( $this->getConn() );

        // 업로드 경로 셋팅
        $factoryController->setUploadDir( $this->getUploadDir() );
        $productController->setUploadDir( $this->getUploadDir() );
        $projectController->setUploadDir( $this->getUploadDir() );
        $configController->setUploadDir( $this->getUploadDir() );

        // 업로드 크기 제한 설정
        $factoryController->setUploadSize( $this->getUploadSize() );
        $productController->setUploadSize( $this->getUploadSize() );
        $projectController->setUploadSize( $this->getUploadSize() );
        $configController->setUploadSize( $this->getUploadSize() );

        // 경로 설정
        $factoryController->setRootRoute( $this->getRootRoute() );
        $factoryController->setSecondRoute( $this->getSecondRoute() );
        $factoryController->setThirdRoute( $this->getThirdRoute() );

        $productController->setRootRoute( $this->getRootRoute() );
        $productController->setSecondRoute( $this->getSecondRoute() );
        $productController->setThirdRoute( $this->getThirdRoute() );

        $projectController->setRootRoute( $this->getRootRoute() );
        $projectController->setSecondRoute( $this->getSecondRoute() );
        $projectController->setThirdRoute( $this->getThirdRoute() );

        $configController->setRootRoute( $this->getRootRoute() );
        $configController->setSecondRoute( $this->getSecondRoute() );
        $configController->setThirdRoute( $this->getThirdRoute() );

        $this->factoryController = $factoryController;
        $this->productController = $productController;
        $this->projectController = $projectController;
        $this->configController = $configController;

    }
    
    private function templateDir(){
        $smarty = $this->getSmarty();
        $root_dir = $this->getRootDir();
        $smarty->setTemplateDir($root_dir . '/view/main/mgt');
        

        $this->setSmarty($smarty);
        
    }

    
    private function loadService(){
        
        $this->product_service = new ProductServiceImpl();
        $this->warehouse_service = new WarehouseServiceImpl();
        $this->project_service = new ProjectServiceImpl();
        
        $my_conn = $this->getConn();
        $this->product_service->setConn($my_conn);
        $this->warehouse_service->setConn($my_conn);
        $this->project_service->setConn($my_conn);

        //print_r($this->warehouse_service);

    }
    
    public function main(){
        //echo "홈2 / 참";
        //require_once $this->root_dir . "view/home.php";
        
        $this->templateDir();
        $this->loadService();

        $smarty = $this->getSmarty();
        $smarty->clearAllCache();
        
        //print_r( $smarty->getTemplateDir() );

        $dt = new DateTime('NOW');
        $day_count = date('t', strtotime("2022-06-01"));

        $startDate = $dt->format('Y-m-01');
        $endDate = $dt->format('Y-m-' . $day_count);

        //echo $startDate . "/" . $endDate . "/" . $day_count;
        $result = $this->warehouse_service->selectWarehouseBetweenSumOfInputCnt($startDate, $endDate);
        $sumOfinput = $result['cnt'];

        $result = $this->warehouse_service->selectWarehouseBetweenSumOfOutputCnt($startDate, $endDate);
        $sumOfoutput = $result['cnt'];

        //echo $_SESSION['auth_name'] . "<br>";
        //echo "참" . $_SESSION['emp_no'];
        $smarty->assign("sum_of_input", $sumOfinput);
        $smarty->assign("sum_of_output", $sumOfoutput);
        $smarty->assign("startDate", $startDate);
        $smarty->assign("endDate", $endDate);
        $smarty->assign("title", "메인:::Smart Logistics");
        $smarty->assign("session_emp_no", $_SESSION['emp_no']);
        $smarty->assign("session_auth_name", $_SESSION['auth_name']);
        $smarty->assign("session_usrname", $_SESSION['usrname']);
        $smarty->assign("option_selected", "NE");
        $smarty->assign("today", date("Y-m-d H:i:s"));
        $smarty->display('main_notice.tpl');
        
    }

    public function factory(){

        $this->loadController();
        $this->templateDir();

        //echo "메시지" . $_POST['srtype'] . "/" . isset( $_POST['srtype'] ) . "<br>";
        //echo strcmp( $_POST['srtype'], 'submit') . "<br>";

        if ( strcmp( $_GET['func'], 'input' ) === 0 ){
            #echo "참1" . "/" . isset($_GET['search']);

            if ( !isset($_GET['search']) && 
                !isset($_POST['srtype']) )
            {
                $this->factoryController->input();
            }
            // 품목 코드 찾기
            else if ( isset($_GET['search']) &&
                     strcmp($_GET['search'], 'product') === 0 &&
                     !isset($_GET['keyword']) ){
                $this->factoryController->input_search();
            }
            // 품목 코드 검색 결과 출력
            else if ( isset($_GET['search']) &&
                     strcmp($_GET['search'], 'product') === 0 &&
                      isset($_GET['keyword']) ){

                $pageCri = new PageCriteria();

                // 페이지 설정
                if ($_GET['page'] >= 0 &&
                    is_numeric($_GET['page'])){
                    
                    $pageCri->setPage($_GET['page']);

                }

                $this->factoryController->input_search_result( $pageCri, $_GET['keyword'] );
            }
            // 입고 처리 프로세스
            else if ( isset( $_POST['srtype'] ) &&
                    strcmp( $_POST['srtype'], 'submit') === 0 ){
                
                $dt = new DateTime('NOW');
                $dt = $dt->format('Y-m-d H:i:s');

                //echo $dt;
                
                $warehouseVO = new WarehouseVO();

                // 상품코드 입력
                if ( isset($_POST['productCode']) && 
                    strcmp($_POST['productCode'], "") !== 0){
                    $warehouseVO->setProduct_no($_POST['productCode']);
                }
                else if ( isset($_POST['productCode']) && 
                        strcmp($_POST['productCode'], "") === 0 ){
                    $warehouseVO->setProduct_no(-1);
                }

                // 수량 입력
                if ( isset($_POST['productNum']) &&
                    strcmp($_POST['productNum'], "") !== 0){
                    $warehouseVO->setProduct_cnt($_POST['productNum']);
                }
                else if ( isset($_POST['productNum']) &&
                    strcmp($_POST['productNum'], "") === 0){
                    $warehouseVO->setProduct_cnt(-1);
                }

                //echo isset($_POST['productCode']) . "/" . strcmp($_POST['productCode'], "") . "<br>";
                //echo $warehouseVO->getProduct_no() . "/" . $warehouseVO->getProduct_cnt() . "<br>";

                $warehouseVO->setCreate_date($dt);
                $warehouseVO->setCreate_type("생성");
                $warehouseVO->setIp(Network::get_client_ip());

                //print_r($warehouseVO);

                $this->factoryController->input_submit_ok($warehouseVO);
                
            }

        }

        else if ( strcmp( $_GET['func'], 'output' ) === 0 ){
            #echo "참2";

            // 재고 현황
            if ( !isset($_GET['status']) && 
                !isset($_GET['keyword']) ){

                $pageCri = new PageCriteria();

                // 페이지 설정
                if ($_GET['page'] >= 0 &&
                    is_numeric($_GET['page'])){
                    
                    $pageCri->setPage($_GET['page']);

                }

                $this->factoryController->output($pageCri);
                
            }
            // 재고 현황 키워드 검색
            if ( !isset($_GET['status']) && 
                isset($_GET['keyword']) ){

                $pageCri = new PageCriteria();
                $keyword = $_GET['keyword'];

                // 페이지 설정
                if ($_GET['page'] >= 0 &&
                    is_numeric($_GET['page'])){
                    
                    $pageCri->setPage($_GET['page']);

                }

                $this->factoryController->output_search_result($pageCri, $keyword);
                
            }
            // 출고 입력 페이지
            else if ( isset($_GET['status']) && 
                    strcmp($_GET['status'], "release") === 0 &&
                     isset($_GET['id'])) {
                
                $this->factoryController->output_release();

            }
            
            // 출고 입력 페이지
            else if ( isset($_GET['status']) && 
                    strcmp($_GET['status'], "w_ok") === 0 &&
                     isset($_GET['id']) && isset($_POST['w_log_id'])) {
                
                $dt = new DateTime('NOW');
                $dt = $dt->format('Y-m-d H:i:s');

                $warehouseLogVo = new WarehouseLogVO();
                $warehouseLogVo->setW_id($_POST["w_id"]);
                $warehouseLogVo->setPrev_w_id($_POST["prev_w_id"]);
                $warehouseLogVo->setPrev_cnt($_POST["prev_cnt"]);
                $warehouseLogVo->setRelease_cnt($_POST["release_cnt"]);
                $warehouseLogVo->setCurrent_cnt($_POST["prev_cnt"] - $_POST["release_cnt"]);
                $warehouseLogVo->setCurrent_type("최근");
                $warehouseLogVo->setRelease_type("출하");
                $warehouseLogVo->setRelease_date($dt);
                $warehouseLogVo->setIp(Network::get_client_ip());


                $this->factoryController->output_w_ok($warehouseLogVo);

            }
            
        }


    }

    public function product(){
        
        $this->loadController();
        $this->templateDir();
        
        if ( strcmp( $_GET['func'], 'list' ) === 0 ){
            
            $pageCri = new PageCriteria();

            // 페이지 설정
            if ($_GET['page'] >= 0 &&
                is_numeric($_GET['page'])){
                
                $pageCri->setPage($_GET['page']);

            }
            
            $this->productController->product_list($pageCri);

        }

    }

    
    public function project(){
        
        $this->loadController();
        $this->templateDir();
        
        // 프로젝트 목록
        if ( strcmp( $_GET['func'], 'list' ) === 0 ){
            
            
            // 프로젝트 목록 페이지
            if ( !isset($_GET['id']) && 
                 !isset($_GET['option'])){
                $pageCri = new PageCriteria();

                // 페이지 설정
                if ($_GET['page'] >= 0 &&
                    is_numeric($_GET['page'])){
                    
                    $pageCri->setPage($_GET['page']);

                }
                
                $this->projectController->list_page($pageCri);

            }
            // 프로젝트 상세 보기 페이지
            else if ( isset($_GET['id']) && 
                isset($_GET['option']) && 
                strcmp($_GET['option'], 'detail_view') === 0 ){
                
                $projectVO = new ProjectVO();
                $projectVO->setProject_id($_GET['id']);

                $this->projectController->project_list_detail_view($projectVO);
            }

        }

        // 프로젝트 등록
        else if ( strcmp( $_GET['func'], 'register') === 0 ){

            // 프로젝트 등록 페이지
            if (!isset($_POST['func'])){
                $this->projectController->project_register();
            }
            // 프로젝트 등록 처리 프로세스
            else if (isset($_POST['func']) && 
                isset($_POST['srtype']) &&
                strcmp($_POST['func'], 'input') === 0 &&
                strcmp($_POST['srtype'], 'submit') === 0){

                $status = 1;
                $file_chk = "NORMAL";

                $projectFileArr = array();

                $dt = new DateTime('NOW');
                $dt = $dt->format('Y-m-d H:i:s');

                $projectVO = new ProjectVO();
                

                if ( isset( $_POST['project_name'] ) && 
                    strlen( $_POST['project_name'] ) > 4 ){                    
                    
                    $projectVO->setProject_name($_POST['project_name']);

                }else{
                    $projectVO->setProject_name(-1);
                    $status = -1;
                }

                if ( isset( $_POST['description'] ) &&
                    strlen( $_POST['description']) ){
                    
                    $projectVO->setDescription( Xss::xss_clean( $_POST['description'] ) );
                }else{
                    $projectVO->setDescription(-1);
                    $status = -2;
                }
                
                if ( isset( $_POST['startdate'] ) &&
                    strlen( $_POST['startdate']) ){

                    $startDate = strtotime($_POST['startdate']);
                    $newStartDate = date('Y-m-d H:i:s', $startDate);
                    $projectVO->setStartdate( $newStartDate );

                }else{
                    $projectVO->setStartdate(-1);
                    $status = -3;
                }

                if ( isset( $_POST['enddate'] ) &&
                    strlen( $_POST['enddate']) ){
                    
                    $endDate = strtotime($_POST['enddate']);
                    $newEndDate = date('Y-m-d H:i:s', $endDate);
                    $projectVO->setEnddate( $newEndDate );

                }else{
                    $projectVO->setEnddate(-1);
                    $status = -4;
                }

                
                // 등록일자
                $projectVO->setRegidate($dt);
                
                // IP주소
                $projectVO->setIp(Network::get_client_ip());

                // 파일 옵션
                $projectVO->setFile_option("NORMAL");

                // echo $projectVO->getProject_name() . "/" . $projectVO->getStartdate() . "<br>";

                if ( $status === 1 ){

                    // 파일 업로드
                    foreach($_FILES['usrupload']['name'] as $f => $name){

                        $projectFileVO = new ProjectFileVO();

                        $root_dir = $this->getRootDir();
                        $upload_dir = $this->getUploadDir();
                        $uuid = UUID::v4();
                        $upload_dir_fullpath = $root_dir . $upload_dir;
                        $upload_dir_uuid_fullpath = $upload_dir_fullpath . "/" . $uuid;

                        $name = $_FILES['usrupload']['name'][$f];
                        $uploadName = explode('.', $name);

                        $fileName = time(). $f . "." . $uploadName[1];
                        $uploadRealName = $upload_dir_uuid_fullpath . "/" . $fileName;
                        $originalName = $_FILES['usrupload']['name'][$f];
                        $fileSize = $_FILES['usrupload']['size'][$f];
                        $fileExt = $uploadName[1];
                        $fileType = $_FILES['usrupload']['type'][$f];
                        
                        //echo $fileName . ",";
                        //echo $originalName. "," . $fileSize . "," . $fileExt . "," . $fileType . "<br>";

                        //echo $uploadRealName;

                        // 파일 정보 입력
                        $projectFileVO->setUuid($uuid);
                        $projectFileVO->setRoot_dir($root_dir);
                        $projectFileVO->setUpload_dir($upload_dir);
                        $projectFileVO->setFile_ext($fileExt);
                        $projectFileVO->setFile_size($fileSize);
                        $projectFileVO->setOriginal_name($originalName);
                        $projectFileVO->setFile_name($fileName);
                        $projectFileVO->setFile_type($fileType);
                        $projectFileVO->setRegidate($dt);
                        $projectFileVO->setIp(Network::get_client_ip());
                        

                        //echo $fileExt;

                        //echo $uploadName;

                        if ( strcmp( $file_chk, "NORMAL") === 0 &&
                            FileUtil::checkFileExtRestrict($fileExt) === 1){
                            $file_chk = "RESTRICT";
                            $projectVO->setFile_option("RESTRICT");
                        }

                        
                        if ( strcmp( $file_chk, "NORMAL") === 0 &&
                            $this->getUploadSize() < $fileSize){
                            $file_chk = "RESTRICT";
                            $projectVO->setFile_option("RESTRICT");
                        }


                        // 파일 서버 전송
                        if ( strlen($originalName) != 0 && 
                            strcmp( $file_chk, "RESTRICT" ) !== 0 ){
                            
                            if(!is_dir( $upload_dir_fullpath )){
                                mkdir( $upload_dir_fullpath );
                            }

                            if(!is_dir( $upload_dir_uuid_fullpath )){
                                mkdir( $upload_dir_uuid_fullpath );
                            }

                            if (move_uploaded_file($_FILES['usrupload']['tmp_name'][$f], $uploadRealName)){
                                //echo "success";

                                /*
                                // 파일 삭제
                                if ( is_file($uploadRealName) ){
                                    unlink($uploadRealName);
                                }

                                // 폴더 삭제
                                rmdir($upload_dir_uuid_fullpath);   // 임시 삭제
                                */
                                $projectFileVO->setOption("success");

                            }else{
                                //echo "error";
                                $projectFileVO->setOption("error");
                            }

                        }

                        // 파일정보 배열로 입력
                        if(strlen($originalName) != 0 && 
                            strcmp( $file_chk, "RESTRICT") !== 0){
                            array_push($projectFileArr, $projectFileVO);
                        }

                    }

                }

                $this->projectController->project_register_ok($projectVO, $projectFileArr);

            }

        }

        // 프로젝트 수정
        else if ( strcmp( $_GET['func'], 'modify' ) === 0 ){

            //echo $_POST['func'];

            // 계정 수정 페이지
            if (!isset($_POST['func']) && 
                isset($_GET['id'])){
                $this->projectController->project_modify();
            }

            // 프로젝트 수정 처리 프로세스
            else if (isset($_POST['func']) && 
                    isset($_POST['srtype']) &&
                    isset($_POST['project_id']) && 
                    strcmp($_POST['func'], 'modify') === 0 &&
                    strcmp($_POST['srtype'], 'submit') === 0){


                $status = 1;
                $file_chk = "NORMAL";

                $projectFileArr = array();
                $dt = new DateTime('NOW');
                $dt = $dt->format('Y-m-d H:i:s');

                $projectVO = new ProjectVO();

                $projectVO->setProject_id($_POST['project_id']);

                if ( isset( $_POST['project_name'] ) && 
                    strlen( $_POST['project_name'] ) > 4 ){                    
                    
                    $projectVO->setProject_name($_POST['project_name']);

                }else{
                    $projectVO->setProject_name(-1);
                    $status = -1;
                }

                if ( isset( $_POST['description'] ) &&
                    strlen( $_POST['description']) ){
                    
                    $projectVO->setDescription( Xss::xss_clean( $_POST['description'] ) );
                }else{
                    $projectVO->setDescription(-1);
                    $status = -2;
                }

                if ( isset( $_POST['startdate'] ) &&
                    strlen( $_POST['startdate']) ){

                    $startDate = strtotime($_POST['startdate']);
                    $newStartDate = date('Y-m-d H:i:s', $startDate);
                    $projectVO->setStartdate( $newStartDate );

                }else{
                    $projectVO->setStartdate(-1);
                    $status = -3;
                }

                if ( isset( $_POST['enddate'] ) &&
                    strlen( $_POST['enddate']) ){
                    
                    $endDate = strtotime($_POST['enddate']);
                    $newEndDate = date('Y-m-d H:i:s', $endDate);
                    $projectVO->setEnddate( $newEndDate );

                }else{
                    $projectVO->setEnddate(-1);
                    $status = -4;
                }


                // 등록일자
                $projectVO->setRegidate($dt);

                // IP주소
                $projectVO->setIp(Network::get_client_ip());

                // 파일 옵션
                $projectVO->setFile_option("NORMAL");

                // echo $projectVO->getProject_name() . "/" . $projectVO->getStartdate() . "<br>";

                if ( $status === 1 ){

                    // 파일 업로드
                    foreach($_FILES['usrupload']['name'] as $f => $name){


                        $projectFileVO = new ProjectFileVO();

                        $root_dir = $this->getRootDir();
                        $upload_dir = $this->getUploadDir();
                        $uuid = UUID::v4();
                        $upload_dir_fullpath = $root_dir . $upload_dir;
                        $upload_dir_uuid_fullpath = $upload_dir_fullpath . "/" . $uuid;

                        $name = $_FILES['usrupload']['name'][$f];
                        $uploadName = explode('.', $name);

                        $fileName = time(). $f . "." . $uploadName[1];
                        $uploadRealName = $upload_dir_uuid_fullpath . "/" . $fileName;
                        $originalName = $_FILES['usrupload']['name'][$f];
                        $fileSize = $_FILES['usrupload']['size'][$f];
                        $fileExt = $uploadName[1];
                        $fileType = $_FILES['usrupload']['type'][$f];
                        
                        //echo $fileName . ",";
                        //echo $originalName. "," . $fileSize . "," . $fileExt . "," . $fileType . "<br>";

                        //echo $uploadRealName;

                        // 파일 정보 입력
                        $projectFileVO->setUuid($uuid);
                        $projectFileVO->setRoot_dir($root_dir);
                        $projectFileVO->setUpload_dir($upload_dir);
                        $projectFileVO->setFile_ext($fileExt);
                        $projectFileVO->setFile_size($fileSize);
                        $projectFileVO->setOriginal_name($originalName);
                        $projectFileVO->setFile_name($fileName);
                        $projectFileVO->setFile_type($fileType);
                        $projectFileVO->setRegidate($dt);
                        $projectFileVO->setIp(Network::get_client_ip());
                        

                        //echo $fileExt;

                        //echo $uploadName;

                        if ( strcmp( $file_chk, "NORMAL") === 0 &&
                            FileUtil::checkFileExtRestrict($fileExt) === 1){
                            $file_chk = "RESTRICT";
                            $projectVO->setFile_option("RESTRICT");
                        }

                        
                        if ( strcmp( $file_chk, "NORMAL") === 0 &&
                            $this->getUploadSize() < $fileSize){
                            $file_chk = "RESTRICT";
                            $projectVO->setFile_option("RESTRICT");
                        }

                        // 파일 서버 전송
                        if ( strlen($originalName) != 0 && 
                            strcmp( $file_chk, "RESTRICT" ) !== 0 ){
                            
                            if(!is_dir( $upload_dir_fullpath )){
                                mkdir( $upload_dir_fullpath );
                            }

                            if(!is_dir( $upload_dir_uuid_fullpath )){
                                mkdir( $upload_dir_uuid_fullpath );
                            }

                            if(!is_uploaded_file($_FILES['usrupload']['tmp_name'][$f])) { 
                                echo "HTTP로 전송된 파일이 아닙니다."; 
                            } else {

                                if (move_uploaded_file($_FILES['usrupload']['tmp_name'][$f], $uploadRealName)){
                                    //echo "success";

                                    /*
                                    // 파일 삭제
                                    if ( is_file($uploadRealName) ){
                                        unlink($uploadRealName);
                                    }

                                    // 폴더 삭제
                                    rmdir($upload_dir_uuid_fullpath);   // 임시 삭제
                                    */
                                    $projectFileVO->setOption("success");

                                }else{
                                    //echo "error";
                                    $projectFileVO->setOption("error");
                                }

                            }

                        }

                        // 파일정보 배열로 입력
                        if(strlen($originalName) != 0 && 
                            strcmp( $file_chk, "RESTRICT") !== 0){
                            array_push($projectFileArr, $projectFileVO);
                        }

                    }

                }

                $this->projectController->project_modify_ok($projectVO, $projectFileArr);

            }
            // 프로젝트 파일 삭제 처리 프로세스
            else if (isset($_POST['func']) && 
                    isset($_POST['srtype']) &&
                    isset($_POST['project_id']) && 
                    isset($_POST['uuid']) && 
                    strcmp($_POST['func'], 'file_delete') === 0 &&
                    strcmp($_POST['srtype'], 'submit') === 0 ){

                $projectFileVO = new ProjectFileVO();

                $projectFileVO->setProject_id($_POST['project_id']);
                $projectFileVO->setUuid($_POST['uuid']);

                //echo $_POST['project_id'] . "/" . $_POST['uuid'];

                $this->projectController->project_file_delete_ok($projectFileVO);

            }

        }

        // 다운로드 기능
        else if ( strcmp( $_GET['func'], 'download') === 0 ){
                
            // 다운로드 페이지 호출
            if ( isset($_GET['uuid']) &&
                !isset($_GET['page']) ){
                
                $this->loadService();

                $smarty = $this->getSmarty();
                $smarty->clearAllCache();

                $projectFileVO = new ProjectFileVO();
                $projectFileVO->setUuid($_GET['uuid']);

                $fileitem = $this->project_service->selectFindUUIDProjectFile($projectFileVO);

                //echo "참1";

                //print_r($fileitem);
                if ( isset($fileitem) ){
                    $this->_download($fileitem);
                }

            }
            // 삭제 여부 페이지
            else if ( isset($_GET['uuid']) &&
                    isset($_GET['page']) && 
                    isset($_GET['project_id']) && 
                    strcmp( $_GET['page'], "delete") === 0 ){

                $this->projectController->project_file_delete();

            }
            
            //echo "참2";

        }
        
    }

    public function config(){
        
        $this->templateDir();
        $this->loadService();

        $smarty = $this->getSmarty();
        $root_dir = $this->getRootDir();
        $smarty->setTemplateDir($root_dir . '/view/main/core');
        $this->setSmarty($smarty);

        $smarty->clearAllCache();
        
        
        $smarty->assign("title", "환경설정:::Smart Logistics");
        $smarty->assign("session_emp_no", $_SESSION['emp_no']);
        $smarty->assign("session_auth_name", $_SESSION['auth_name']);
        $smarty->assign("session_usrname", $_SESSION['usrname']);
        $smarty->assign("option_selected", "NE");
        $smarty->assign("today", date("Y-m-d H:i:s"));
        $smarty->display('main_notice.tpl');

    }

    
    public function employee(){
        
        $this->loadController();
        $this->templateDir();
        
        //echo isset($_POST['func']) . "/" ;

        if ( strcmp( $_GET['func'], 'register' ) === 0 ){
            
            // 계정 추가 페이지
            if (!isset($_POST['func'])){
                $this->configController->employee_register();
            }

            // 계정 추가 처리 프로세스
            else if (isset($_POST['func']) && 
                    isset($_POST['srtype']) &&
                    strcmp($_POST['func'], 'input') === 0 &&
                    strcmp($_POST['srtype'], 'submit') === 0){
                
                $dt = new DateTime('NOW');
                $dt = $dt->format('Y-m-d H:i:s');

                $employeeVo = new EmployeeVO();

                // 사용자 권한
                if (isset($_POST['emp_auth'])){
                    $employeeVo->setEmp_auth($_POST['emp_auth']);
                }else{
                    $employeeVo->setEmp_auth(-1);
                }

                // 사용자명
                if (isset($_POST['usrname']) && 
                    strlen($_POST['usrname'] > 3)){
                    $employeeVo->setUsrname($_POST['usrname']);
                }else{
                    $employeeVo->setUsrname(-1);
                }

                // 비밀번호
                if (isset($_POST['passwd1']) &&
                    isset($_POST['passwd2']) &&
                    ( strcmp($_POST['passwd1'], $_POST['passwd2']) === 0) &&
                     strlen($_POST['passwd1']) > 4 ){
                    $employeeVo->setPasswd($_POST['passwd1']);
                }
                // 비밀번호가 비어있을 때
                else if (!isset($_POST['passwd1']) || 
                          !isset($_POST['passwd2'])){
                    $employeeVo->setPasswd(-2);
                }
                // 비밀번호가 일치하지 않을 때
                else if (isset($_POST['passwd1']) &&
                        isset($_POST['passwd2']) &&
                        strcmp($_POST['passwd1'], $_POST['passwd2']) !== 0){
                    $employeeVo->setPasswd(-3);
                }
                // 원인을 알수 없는 비밀번호 오류
                else{
                    $employeeVo->setPasswd(-1);
                }

                // 등록일자
                $employeeVo->setRegidate($dt);
                
                // 수정일자
                $employeeVo->setModify_date($dt);

                // IP주소
                $employeeVo->setIp(Network::get_client_ip());

                //echo "참2";

                $this->configController->employee_register_ok($employeeVo);

            }

        }else if ( strcmp( $_GET['func'], 'list' ) === 0 ){
            
            $pageCri = new PageCriteria();

            // 페이지 설정
            if ($_GET['page'] >= 0 &&
                is_numeric($_GET['page'])){
                
                $pageCri->setPage($_GET['page']);

            }

            $this->configController->employee_list($pageCri);

        }else if ( strcmp( $_GET['func'], 'modify' ) === 0 ){

            // 계정 수정 페이지
            if (!isset($_POST['func']) && 
                isset($_GET['idx'])){
                $this->configController->employee_modify();
            }

            // 계정 수정 프로세스
            else if (isset($_POST['func']) && 
                    isset($_POST['srtype']) &&
                    strcmp($_POST['func'], 'modify') === 0 &&
                    strcmp($_POST['srtype'], 'submit') === 0 &&
                    isset($_POST['idx'])){

                $dt = new DateTime('NOW');
                $dt = $dt->format('Y-m-d H:i:s');

                $currentVo = new EmployeeVO();  // 기존 계정 정보
                $updateVo = new EmployeeVO();   // 변경될 계정 정보

                // 계정 번호
                $currentVo->setEmp_no($_POST['idx']);
                $updateVo->setEmp_no($_POST['idx']);

                //echo "참9/". $_POST['idx'];

                // 사용자 권한
                if (isset($_POST['emp_auth'])){
                    $updateVo->setEmp_auth($_POST['emp_auth']);
                    //echo "참1/" . $_POST['emp_auth'];
                }else{
                    $updateVo->setEmp_auth(-1);
                    // echo "거짓1";
                }

                // 사용자명
                if (isset($_POST['usrname']) && 
                    strlen($_POST['usrname'] > 3)){
                    $updateVo->setUsrname($_POST['usrname']);
                }else{
                    $updateVo->setUsrname(-1);
                }

                // 기존 비밀번호
                if (isset($_POST['passwd']) && 
                    strlen($_POST['passwd'] > 4)){
                    $currentVo->setPasswd($_POST['passwd']);
                }else{
                    $currentVo->setPasswd(-1);
                }

                // 신규 비밀번호
                if (isset($_POST['passwd1']) &&
                    isset($_POST['passwd2']) &&
                    ( strcmp($_POST['passwd1'], $_POST['passwd2']) === 0) &&
                     strlen($_POST['passwd1']) > 4 ){
                    $updateVo->setPasswd($_POST['passwd1']);
                }
                // 신규 비밀번호가 비어있을 때
                else if (!isset($_POST['passwd1']) || 
                          !isset($_POST['passwd2'])){
                    $updateVo->setPasswd(-2);
                }
                // 신규 비밀번호가 일치하지 않을 때
                else if (isset($_POST['passwd1']) &&
                        isset($_POST['passwd2']) &&
                        strcmp($_POST['passwd1'], $_POST['passwd2']) !== 0){
                    $updateVo->setPasswd(-3);
                }
                // 원인을 알수 없는 신규 비밀번호 오류
                else{
                    $updateVo->setPasswd(-1);
                }

                // 수정일자
                $updateVo->setModify_date($dt);

               $this->configController->employee_modify_ok($currentVo, $updateVo);

            }

        }else if ( strcmp( $_GET['func'], 'delete' ) === 0 ){
            
            // 계정 삭제 페이지
            if (!isset($_POST['func']) && 
                isset($_GET['idx'])){
                
                $this->configController->employee_delete();

            }
            // 계정 삭제 프로세스
            else if (isset($_POST['func']) && 
                    isset($_POST['srtype']) &&
                    strcmp($_POST['func'], 'delete') === 0 &&
                    strcmp($_POST['srtype'], 'submit') === 0 &&
                    isset($_POST['idx'])){

                $currentVo = new EmployeeVO();  // 기존 계정 정보

                // 계정 번호
                $currentVo->setEmp_no($_POST['idx']);

                // 기존 비밀번호
                if (isset($_POST['passwd']) && 
                    strlen($_POST['passwd'] > 4)){
                    $currentVo->setPasswd($_POST['passwd']);
                }else{
                    $currentVo->setPasswd(-1);
                }

                $this->configController->employee_delete_ok($currentVo);

            }

        }

    }

    // public function download(){

    //     $this->templateDir();
    //     $this->loadService();

    //     $smarty = $this->getSmarty();
    //     $smarty->clearAllCache();

    //     $projectFileVO = new ProjectFileVO();
    //     $projectFileVO->setUuid($_GET['uuid']);

    //     $fileitem = $this->board_service->selectBoardFileDetail($boardFileVO);

    //     //print_r($fileitem);
    //     $this->_download($fileitem);

    // }

    private function _download($fileitem){

        $original_name = $fileitem['original_name'];
        $filename = $fileitem['file_name'];
        $uuid = $fileitem['uuid'];

        $target_Dir = $this->getUploadDir() . "/" . $uuid;
        $file = $this->getRootDir() . $target_Dir ."/" . $filename;

        //echo $file;

        $filesize = filesize($file);

        header("Pragma: public");
        header("Expires: 0");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"$original_name\"");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: $filesize");

        readfile($file);

    }

    
}

?>