<?php
/*
 * Created Date: 2022-07-02 (Sat)
 * Author: Doyun Jung (정도윤) / rabbit.white@daum.net
 * Subject: ProjectService
 * Filename: ProjectService.php
 * Description:
 *
 */

interface ProjectService{

    public function selectProject($projectVO);

    public function selectAllProjectCount();
    public function selectPagingProject($startNum, $endNum);

    public function selectFullProjectQry($projectVO);
    public function insertProject($projectVO);
    public function insertProjectFile($projectFileVO);

    public function selectFindUUIDProjectFile($projectFileVO);
    public function selectFindIDProject($projectVO);
    public function selectFindIDProjectFile($projectFileVO);

    public function updateProject($projectVO);
    public function deleteFindUUIDProjectFile($projectFileVO);

    public function selectAllProjectCountFind($projectVO);
    public function selectPagingProjectFind($startNum, $endNum, $projectVO);

}

?>