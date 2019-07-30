<?php
    require_once("../tools.php");
    require_once("MemberDao.php");

    // 회원정보 수정 폼에 입력된 데이터 읽기
    $id   = requestValue("id");
    $pw   = requestValue("pw");
    $name = requestValue("name");
	 $email = requestValue("email");
    
    // 모든 입력란이 채워져 있으면 회원정보 업데이트
    if ($id && $pw && $name && $email) {
        
        // DB의 회원정보 업데이트
        $mdao = new MemberDao();
        $mdao->updateMember($id, $pw, $name,$email);
        
        // 현재 로그인한 사용자의 이름이 담긴 세션변수 값을 
        // 새로 입력된 것으로 변경
        session_start_if_none();
        $_SESSION["uname"] = $name;
        
        okGo("회원정보가 수정되었습니다.", MAIN_PAGE);
    }
    else 
        errorBack("모든 입력란을 채워주세요.");
?>