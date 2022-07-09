<?php
/*
 * Created Date: 2022-06-06 (Mon)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: EmployeeVO
 * Filename: EmployeeVO.php
 * Description:
 * 1. 수정일자 반영, 정도윤, 2022-07-02(Sat).
 */

class EmployeeVO{

    private $emp_no;
    private $emp_auth;
    private $auth_name;
    private $usrname;
    private $passwd;
    private $regidate;
    private $modify_date;
    private $ip;

    public function getEmp_no(){
        return $this->emp_no;
    }

    public function setEmp_no($emp_no){
        $this->emp_no = $emp_no;
    }

    public function getEmp_auth(){
        return $this->emp_auth;
    }

    public function setEmp_auth($emp_auth){
        $this->emp_auth = $emp_auth;
    }

    public function getAuth_name(){
        return $this->auth_name;
    }

    public function setAuth_name($auth_name){
        $this->auth_name = $auth_name;
    }

    public function getUsrname(){
        return $this->usrname;
    }

    public function setUsrname($usrname){
        $this->usrname = $usrname;
    }

    public function getPasswd(){
        return $this->passwd;
    }

    public function setPasswd($passwd){
        $this->passwd = $passwd;
    }

    public function getRegidate(){
        return $this->regidate;
    }

    public function setRegidate($regidate){
        $this->regidate = $regidate;
    }

    public function getModify_date(){
        return $this->modify_date;
    }

    public function setModify_date($modify_date){
        $this->modify_date = $modify_date;
    }

    public function getIp(){
        return $this->ip;
    }

    public function setIp($ip){
        $this->ip = $ip;
    }

}

?>