<?php
/*
 * Created Date: 2022-06-05 (Sun)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: Smart Logistics
 * Filename: index.php
 * Description:
 * 
 * 
 */


$_SETUP_DIR = "/SmartLogistics";   // 사용자 설정
$_UPLOAD_DIR = "/upload";   // 업로드 경로
$_LIMIT_UPLOAD_SIZE = 39943040;

$_URL = $_SERVER['PATH_INFO'];
$_ROOT_DIR = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . $_SETUP_DIR;

include $_ROOT_DIR . '/include/header.php';

include $_ROOT_DIR . "/util/FileUtil.php";
include $_ROOT_DIR . "/util/UUID.php";
include $_ROOT_DIR . "/util/Xss.php";
include $_ROOT_DIR . "/util/Network.php";
include $_ROOT_DIR . '/util/Paging.php';
include $_ROOT_DIR . '/util/RouteCreator.php';
include $_ROOT_DIR . '/util/ArrayUtil.php';

include $_ROOT_DIR . '/db/MysqlConn.php';

include $_ROOT_DIR . '/framework/smarty/libs/Smarty.class.php';

include $_ROOT_DIR . '/model/PageCriteria.php';
include $_ROOT_DIR . '/model/ProjectFileVO.php';
include $_ROOT_DIR . '/model/ProjectVO.php';
include $_ROOT_DIR . '/model/ProductVO.php';
include $_ROOT_DIR . '/model/EmployeeVO.php';
include $_ROOT_DIR . '/model/WarehouseVO.php';
include $_ROOT_DIR . '/model/WarehouseLogVO.php';


include $_ROOT_DIR . '/dao/WarehouseDAO.php';
include $_ROOT_DIR . '/dao/WarehouseDAOImpl.php';
include $_ROOT_DIR . '/dao/ProjectDAO.php';
include $_ROOT_DIR . '/dao/ProjectDAOImpl.php';
include $_ROOT_DIR . '/dao/ProductDAO.php';
include $_ROOT_DIR . '/dao/ProductDAOImpl.php';
include $_ROOT_DIR . '/dao/EmployeeDAO.php';
include $_ROOT_DIR . '/dao/EmployeeDAOImpl.php';


include $_ROOT_DIR . '/service/WarehouseService.php';
include $_ROOT_DIR . '/service/WarehouseServiceImpl.php';
include $_ROOT_DIR . '/service/ProjectService.php';
include $_ROOT_DIR . '/service/ProjectServiceImpl.php';
include $_ROOT_DIR . '/service/ProductService.php';
include $_ROOT_DIR . '/service/ProductServiceImpl.php';
include $_ROOT_DIR . '/service/EmployeeService.php';
include $_ROOT_DIR . '/service/EmployeeServiceImpl.php';

include $_ROOT_DIR . '/include/Controller.php';
include $_ROOT_DIR . '/include/DAO.php';

include $_ROOT_DIR . "/controller/Portal/ConfigController.php";
include $_ROOT_DIR . "/controller/Portal/ProjectController.php";
include $_ROOT_DIR . "/controller/Portal/ProductController.php";
include $_ROOT_DIR . "/controller/Portal/FactoryController.php";
include $_ROOT_DIR . "/controller/EmployeeController.php";
include $_ROOT_DIR . "/controller/PortalController.php";
include $_ROOT_DIR . "/controller/HomeController.php";




// Route 경로 생성
$routeCreator = new RouteCreator();

// MariaDB(MySQL) 환경설정
$mysqlConn = new MysqlConn();
$mysqlConn->init("localhost", "hr", "123456", "hr", 3306);

// Smarty 환경설정
$smarty = new Smarty();
//$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;


$homeController = new HomeController();
$portalController = new PortalController();
$employeeController = new EmployeeController();

// Controller 루트 경로 셋팅
$homeController->setRootDir($_ROOT_DIR);
$portalController->setRootDir($_ROOT_DIR);
$employeeController->setRootDir($_ROOT_DIR);

// Controller 스마티 셋팅
$homeController->setSmarty($smarty);
$portalController->setSmarty($smarty);
$employeeController->setSmarty($smarty);

// DB 셋팅
$homeController->setConn($mysqlConn);
$portalController->setConn($mysqlConn);
$employeeController->setConn($mysqlConn);

// 업로드 경로 셋팅
$homeController->setUploadDir($_UPLOAD_DIR);
$portalController->setUploadDir($_UPLOAD_DIR);
$employeeController->setUploadDir($_UPLOAD_DIR);

// 파일 업로드 크기 제한
$homeController->setUploadSize($_LIMIT_UPLOAD_SIZE);
$portalController->setUploadSize($_LIMIT_UPLOAD_SIZE);
$employeeController->setUploadSize($_LIMIT_UPLOAD_SIZE);

// 경로 생성
$_ROOT_ROUTE = $routeCreator->getRootRoute($_URL);
$_SECOND_ROUTE = $routeCreator->getSubPath($_URL, 2 );
$_THIRD_ROUTE = $routeCreator->getSubPath($_URL, 3 );

// 경로 설정
$homeController->setRootRoute($_ROOT_ROUTE);
$homeController->setSecondRoute($_SECOND_ROUTE);
$homeController->setThirdRoute($_THIRD_ROUTE);

$portalController->setRootRoute($_ROOT_ROUTE);
$portalController->setSecondRoute($_SECOND_ROUTE);
$portalController->setThirdRoute($_THIRD_ROUTE);

$employeeController->setRootRoute($_ROOT_ROUTE);
$employeeController->setSecondRoute($_SECOND_ROUTE);
$employeeController->setThirdRoute($_THIRD_ROUTE);


//echo $_ROOT_ROUTE . "<br><br>";
//echo $_SECOND_ROUTE . "<br><br>";
//echo $_THIRD_ROUTE ;

// index.php
if ( strcmp($_ROOT_ROUTE, "home") === 0 ){
    $homeController->home();
}

// {page}.php
if ( strcmp($_ROOT_ROUTE, "home") !== 0 ){
    
    switch ( $_ROOT_ROUTE ){
        
        // 로그인 인증 화면
        case "employee":
            
            switch ( $_SECOND_ROUTE ){
             
                case "login":
                    
                    $empVO = new EmployeeVO();
                    
                    $empVO->setEmp_no($_POST["emp_no"]);
                    $empVO->setPasswd($_POST["passwd"]);
                    
                    //echo $empVO->getEmp_no();
                    //echo $empVO->getPasswd();
                    
                    $employeeController->login($empVO);
                    
                    break;
                    
                case "logout":
                    
                    // 로그아웃
                    session_destroy(); // (세션 비우기)
                    
                    echo "<script>";
                    echo "location.replace('../..');";
                    echo "</script>";
                    exit;
                    
                    break;
                
            }
            
            break;
        
        // 포털 화면
        case "portal":
        
            if(isset($_SESSION['emp_no'])){

                switch ( $_SECOND_ROUTE ){
                
                    case "main":
                        $portalController->main();

                        break;

                    case "factory":

                        if ( isset( $_GET['func'] ) ){
                            $portalController->factory( );
                        }

                        break;

                    case "product":
                        
                        if ( isset( $_GET['func'] ) ){
                            $portalController->product( );
                        }

                        break;

                    case "project":
                        
                        if ( isset( $_GET['func'] ) ){
                            $portalController->project( );
                        }

                        break;

                    case "config":
                        $portalController->config();

                        break;

                    case "employee":
                        $portalController->employee();

                        break;
                        
                }

            }else{
                                
                echo "<script>";
                echo "location.replace('../..');";
                echo "</script>";
                exit;
                
            }
            
            break;
        
    }
    
}


// Free memory
if ($smarty != null){
    unset($smarty);
}

?>