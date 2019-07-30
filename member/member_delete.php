<?php
    require_once("../tools.php");
    require_once("MemberDao.php");

    // 전달된 값 저장
    $id   = requestValue("id");
	
  
 
   $mdao = new MemberDao($id);
        $mdao->deleteMember($id);
		

    session_start_if_none();
        unset($_SESSION["uid"]);
	   $_SESSION["uname"] = $name;
    // 글 목록 페이지로 복귀  
	 goNow(MAIN_PAGE);
?>