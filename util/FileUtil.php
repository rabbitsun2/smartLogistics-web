<?php

/*
 * Created Date: 2022-07-03 (Sun)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: FileUtil
 * Filename: FileUtil.php
 * Description:
 * 1. 파일 크기 단위로 변환 구현, 정도윤, 2022-07-03 (Sun).
 * 2. 파일 업로드 확장자 방어, 정도윤, 2022-07-03 (Sun).
*/

class FileUtil{

    public static function convfileSize($size) {

        $sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
        
        if ($size == 0) {
            return('n/a');
        } else {
            return (round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizes[$i]);
        }

    }

    public static function checkFileExtRestrict($file_ext){

        $status = 1;

        $restrict_ext = array("php", "php3", "php4", "phps", "html", "htm", 
                                "py", "sh", "cmd", "exe");

        for ( $i = 0; $i < count($restrict_ext) &&
                      $status === 1; $i++ ){
            
            if ( strcmp( $file_ext, $restrict_ext[$i] ) === 0 ){
                $status = -1;
                //echo "참";
            }

        }

        if ($status === 1){
            return 0;
        }else{
            return 1;
        }
    
    }

}

?>