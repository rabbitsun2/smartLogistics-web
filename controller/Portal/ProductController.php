<?php
/*
 * Created Date: 2022-06-16 (Thu)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: Controller
 * Filename: ProductController.php
 * Description:
 *  
 * 
 */

class ProductController extends Controller {
 
    private $project_service;
    private $product_service;
    private $warehouse_service;

    public function __construct(){
        
    }
    
    public function __destruct(){
        
    }
    
    private function templateDir(){

        $smarty = $this->getSmarty();
        $root_dir = $this->getRootDir();
        $smarty->setTemplateDir($root_dir . '/view/main/mgt');

        $this->setSmarty($smarty);
        
    }

    private function loadService(){
        
        $this->project_service = new ProjectServiceImpl();
        $this->product_service = new ProductServiceImpl();
        $this->warehouse_service = new WarehouseServiceImpl();
        
        $my_conn = $this->getConn();
        $this->project_service->setConn($my_conn);
        $this->product_service->setConn($my_conn);
        $this->warehouse_service->setConn($my_conn);

        //print_r($this->warehouse_service);

    }
    

    public function product_list($pageCri){
        
        $this->templateDir();
        $this->loadService();

        $smarty = $this->getSmarty();
        $smarty->clearAllCache();


        $paging = new Paging();

        $result = $this->product_service->selectAllProductCount();
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

        $productList = $this->product_service->selectPagingProduct($startnum, $endnum);
        //echo $keyword;
        //print_r($productList);

        $var_fn = "&func=item_status";

        $smarty->assign("productList", $productList);
        $smarty->assign("pagingObj", $pagingObj);
        $smarty->assign("fn", $var_fn);

        $smarty->assign("title", "프로젝트(제품)/제품 현황:::Smart Logistics");
        $smarty->assign("session_emp_no", $_SESSION['emp_no']);
        $smarty->assign("session_auth_name", $_SESSION['auth_name']);
        $smarty->assign("session_usrname", $_SESSION['usrname']);
        $smarty->assign("option_selected", "NE");
        $smarty->assign("today", date("Y-m-d H:i:s"));
        $smarty->display('product_list.tpl');

    }

    public function product_list_detail_view($productVO){

        $this->templateDir();
        $this->loadService();

        $smarty = $this->getSmarty();
        $smarty->clearAllCache();

        $product_id = $productVO->getProduct_id();

        $productFileVO = new ProductFileVO();
        $productFileVO->setProduct_id( $product_id );

        $resultProduct = $this->product_service->selectFindIDProduct($productVO);
        $resultProductFile = $this->product_service->selectFindIDProductFile($productFileVO);


        if ( isset( $resultProduct) ){

            // 버그 개선(결과값 출력)
            if ( ArrayUtil::getDimensionArray($resultProduct) !== -1 ){
                $resultProduct = array(0 => $resultProduct);
            }

        }

        //echo "참1/" . $project_id ;
        //print_r($resultProjectFile);

        $smarty->assign("product_item", $resultProduct);
        $smarty->assign("product_file_item", $resultProductFile);

        $smarty->assign("title", "프로젝트(제품)/제품 상세:::Smart Logistics");
        $smarty->assign("session_emp_no", $_SESSION['emp_no']);
        $smarty->assign("session_auth_name", $_SESSION['auth_name']);
        $smarty->assign("session_usrname", $_SESSION['usrname']);
        $smarty->assign("option_selected", "NE");
        $smarty->assign("today", date("Y-m-d H:i:s"));
        $smarty->display('product_detail_view.tpl');

    }

    public function product_register(){

        $this->templateDir();
        $this->loadService();

        $smarty = $this->getSmarty();
        $smarty->clearAllCache();


        $smarty->assign("MAX_FILE_SIZE", $this->getUploadSize());
        $smarty->assign("title", "프로젝트(제품)/제품 등록:::Smart Logistics");
        $smarty->assign("session_emp_no", $_SESSION['emp_no']);
        $smarty->assign("session_auth_name", $_SESSION['auth_name']);
        $smarty->assign("session_usrname", $_SESSION['usrname']);
        $smarty->assign("option_selected", "NE");
        $smarty->assign("today", date("Y-m-d H:i:s"));
        $smarty->display('product_register.tpl');

    }

    public function project_search(){

        $this->templateDir();
        $smarty = $this->getSmarty();
        $smarty->clearAllCache();
        

        $smarty->assign("title", "프로젝트 검색:::Smart Logistics");
        $smarty->assign("session_emp_no", $_SESSION['emp_no']);
        $smarty->assign("session_auth_name", $_SESSION['auth_name']);
        $smarty->assign("session_usrname", $_SESSION['usrname']);
        $smarty->assign("option_selected", "NE");
        $smarty->assign("today", date("Y-m-d H:i:s"));
        $smarty->display('product_pjt_search_page.tpl');

    }

    public function project_search_result($pageCri, $keyword){

        $this->templateDir();
        $this->loadService();

        $smarty = $this->getSmarty();
        $smarty->clearAllCache();

        $projectVO = new ProjectVO();
        $projectVO->setProject_name($keyword);
        
        $paging = new Paging();

        $result = $this->project_service->selectAllProjectCountFind($projectVO);
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

        $projectList = $this->project_service->selectPagingProjectFind($startnum, $endnum, $projectVO);
        //echo $keyword;
        //print_r($productList);

        $var_fn = "&func=input&search=project&keyword=" . $keyword;

        $smarty->assign("projectList", $projectList);
        $smarty->assign("pagingObj", $pagingObj);
        $smarty->assign("fn", $var_fn);
        $smarty->display('product_pjt_search_result.tpl');

    }

    public function product_register_ok($productVO, $productFileArr){

        $this->templateDir();
        $this->loadService();

        $status = 1;

        
        // 프로젝트 명 입력 여부
        if ($productVO->getProduct_name() !== -1 &&
            $status === 1){
            $status = 1;
        }else if ($productVO->getProduct_name() === -1 &&
            $status === 1) {
            $status = -1;
        }

        // 설명 입력 여부
        if ($productVO->getDescription() !== -1 &&
            $status === 1 ){
            $status = 1;
        }else if ($productVO->getDescription() === -1 &&
            $status === 1 ){
            $status = -2;
        }

        // 프로젝트 번호 입력 여부
        if ($productVO->getProject_id() !== -1 &&
            $status === 1){
            $status = 1;
        }else if ($productVO->getProject_id() === -1 &&
            $status === 1) {
            $status = -3;
        }


        // 파일 확장자 제한 여부
        if ( strcmp( $productVO->getFile_option() , "NORMAL" ) === 0 &&
               $status === 1 ){

            $status = 1;

        }else if ( strcmp( $productVO->getFile_option() , "RESTRICT" ) === 0 &&
            $status === 1 ){
            $status = -4;
        }


        if ( $status === 1 ){

            $result = $this->product_service->insertProduct($productVO);
    
            // 프로젝트 등록이 성공적인 경우
            if ( $result === 1 ){
                
                $result = $this->product_service->selectFullProductQry($productVO);
                //print_r($result);

                $id = $result['product_no'];

                //print_r($boardFileArr);
                
                // 파일 정보 입력(파일 업로드)
                foreach($productFileArr as $key=>$val){
                    
                    $val->setProduct_id($id);
                    
                    if ( strcmp( $val->getOption(), "success" ) === 0 ){
                        $result = $this->product_service->insertProductFile($val);

                    }
                    
                }

            }
            else{
                //return 0;
                $status = -5;
            }
            
        }


        switch($status){

            // 프로젝트 등록이 성공일 때
            case 1:

                echo "<script>";
                echo "alert ('성공적으로 등록되었습니다.');";
                echo "location.replace('../portal/product?func=list');";
                echo "</script>";
                exit;

                break;

            case -1:

                echo "<script>";
                echo "alert('제품명을 입력하세요.');";
                echo "history.back();";
                echo "</script>";
                exit;

                break;

            case -2:

                echo "<script>";
                echo "alert('설명을 입력하세요.');";
                echo "history.back();";
                echo "</script>";
                exit;

                break;

            case -3:

                echo "<script>";
                echo "alert('프로젝트 번호를 선택하세요.');";
                echo "history.back();";
                echo "</script>";
                exit;
                
                break;

            case -4:

                echo "<script>";
                echo "alert('파일 확장자가 제한되었습니다.');";
                echo "history.back();";
                echo "</script>";
                exit;

                break;

            case -5:

                echo "<script>";
                echo "alert('제품 등록에 실패하였습니다.');";
                echo "history.back();";
                echo "</script>";
                exit;

                break;

        }

    }

}

?>