<?php
    require_once("../tools.php");
    require_once("MemberDao.php");

    // ���޵� �� ����
    $id   = requestValue("id");
	
  
 
   $mdao = new MemberDao($id);
        $mdao->deleteMember($id);
		

    session_start_if_none();
        unset($_SESSION["uid"]);
	   $_SESSION["uname"] = $name;
    // �� ��� �������� ����  
	 goNow(MAIN_PAGE);
?>