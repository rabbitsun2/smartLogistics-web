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
        
        $this->product_service = new ProductServiceImpl();
        $this->warehouse_service = new WarehouseServiceImpl();
        
        $my_conn = $this->getConn();
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

}

?>