<?php
    require_once("../tools.php");
    require_once("BoardDao.php");
	session_start_if_none();
    $id   = sessionVar("uid");
	$num=sessionVar("uid");
    $name = sessionVar("uname");
    // 전달된 값 저장
    $name  = requestValue("id");
	$num = requestValue("num");
	$content = requestValue("write");

    // 빈 칸 없이 모든 값이 전달되었으면 insert
    if ( $content) {
        $dao = new BoardDao();
        $dao->insertCM($num,$name ,$content);

        // 글 목록 페이지로 복귀
        goNow(bdUrl("board.php", 0, 0));
    } else
        errorBack("모든 항목이 빈칸 없이 입력되어야 합니다.");
?>