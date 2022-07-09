<?php
/*
 * Created Date: 2022-06-05 (Sun)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: Controller
 * Filename: HomeController.php
 * Description:
 *
 */

class HomeController extends Controller {
    
    public function __construct(){
        
    }
    
    public function __destruct(){
        
    }
    
    private function templateDir(){
        $smarty = $this->getSmarty();
        $root_dir = $this->getRootDir();
        $smarty->setTemplateDir($root_dir . '/view');
        
        $this->setSmarty($smarty);
        
    }
    
    public function home(){
        //echo "홈2 / 참";
        //require_once $this->root_dir . "view/home.php";
        
        $this->templateDir();
        $smarty = $this->getSmarty();
        $smarty->clearAllCache();
        
        $smarty->assign("title", "Smart Logistics");
        $smarty->display('index.tpl');
        
    }
    
}

?>