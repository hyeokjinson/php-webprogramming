<?php
    require_once("../tools.php");
    require_once("BoardDao.php");
    
    // 전달된 페이지 번호 저장
    $page = requestValue("page");

    // 화면 구성에 관련된 상수 정의
    define("NUM_LINES",      5);   // 게시글 리스트의 줄 수
    define("NUM_PAGE_LINKS", 3);   // 화면에 표시될 페이지 링크의 수

    // 게시판의 전체 게시글 수 구하기
    $dao = new BoardDao();
    $numMsgs = $dao->getNumMsgs();

    if ($numMsgs > 0) {
        // 전체 페이지 수 구하기
        $numPages = ceil($numMsgs / NUM_LINES);

        // 현재 페이지 번호가 (1 ~ 전체 페이지 수)를 벗어나면 보정
        if ($page < 1)
            $page = 1;
        if ($page > $numPages)
            $page = $numPages;

        // 리스트에 보일 게시글 데이터 읽기
        $start = ($page - 1) * NUM_LINES;     // 첫 줄의 레코드 번호
        $msgs = $dao->getManyMsgs($start, NUM_LINES);

        // 페이지네이션 컨트롤의 처음/마지막 페이지 링크 번호 계산
        $firstLink = floor(($page - 1) / NUM_PAGE_LINKS)
                   * NUM_PAGE_LINKS + 1;
        $lastLink = $firstLink + NUM_PAGE_LINKS - 1;
        if ($lastLink > $numPages)
            $lastLink = $numPages;
    }
    // 현재 로그인한 사용자 아이디 저장(로그아웃 상태이면 빈 문자열)
    session_start_if_none();
    $loginId = sessionVar("uid");    
?>

<!doctype html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Jua&amp;subset=korean" rel="stylesheet">
   <style>
   table.type09 {
    border-collapse: collapse;
    text-align: left;
    line-height: 1.5;

}
table.type09 thead th {
    padding: 10px;
    font-weight: bold;
    vertical-align: top;
    color: #369;
	font-family: 'Jua', sans-serif;
    border-bottom: 3px solid #036;
}
table.type09 tbody th {
    width: 150px;
    padding: 10px;
	font-family: 'Jua', sans-serif;
    font-weight: bold;
    vertical-align: top;
    border-bottom: 1px solid #ccc;
    background: #f3f6f7;
}
table.type09 td {
    width: 350px;
    padding: 10px;
	font-family: 'Jua', sans-serif;
    vertical-align: top;
    border-bottom: 1px solid #ccc;
}
       h1{
	   	   font-family: 'Jua', sans-serif;
	   }
	   a {
            color: #0060B6;
            text-decoration: none;
        }
        body{
            background-image:url("black1.jpg");
			
        }
        #fixed {
            position: fixed;
            bottom: 10px;
            right: 10px;
            width: 100px;
            padding: 5px;
           
        }
        #menu {
            font-family: Arial, sans-serif;
            font-weight: bold;
            text-transform: uppercase;
            margin: 50px 0;
            padding: 0;
            list-style-type: none;
            background-color: #eee;
            font-size: 13px;
            height: 40px;
            border-top: 2px solid #eee;
            border-bottom: 2px solid #ccc;
        }

            #menu li {
                float: left;
                margin: 0;
            }

                #menu li a {
                    text-decoration: none;
                    display: block;
                    padding: 0 20px;
                    line-height: 40px;
                    color: #666;
                }

                    #menu li a:hover, #menu li.active a {
                        background-color: whitesmoke;
                        border-bottom: 2px solid ;
                        color: #999;
                    }

        #menu_wrapper ul {
            margin-left: 12px;
        }

        #menu_wrapper {
            padding: 0 16px 0 0;
            background: url(images/grey.png) no-repeat right;
        }

            #menu_wrapper div {
                float: left;
                height: 44px;
                width: 12px;
                background: url(images/grey.png) no-repeat left;
            }

            /* 메뉴바 */
            #menu_wrapper.black ul {
                border-top: 2px solid #333;
                border-bottom: 2px solid #000;
                background: #333;
            }

            #menu_wrapper.black a {
                color: #CCC;
            }

            #menu_wrapper.black li a:hover, #menu_wrapper.black li.active a {
                color: #999;
                background: #555;
                border-bottom: 2px solid #444;
            }

            #menu_wrapper.black {
                background: url(images/black.png) no-repeat right;
            }

                #menu_wrapper.black div {
                    background: url(images/black.png) no-repeat left;
                }

    </style>
	<link href="bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap-3.3.2-dist/css/jumbotron.css" rel="stylesheet">
</head>
<h1 style="text-align:center"><a href="/154420/home.html">fashion magazine</a></h1>
<body>
<script src="js/jquery-3.1.1.js"></script>
<script src="js/bootstrap.js"></script>
    <div id="menu_wrapper" class="black">
        <div class="left"></div>
        <ul id="menu">
             <li><a href="/154420/login_main.php">회원관리</a></li>
            <li class="active"><a href="../chatbot.html">챗봇</a></li>
            <li><a href="/154420/board/board.php">게시판</a></li>
            <li><a href="../file/webhard.php">파일관리</a></li>

        </ul>
    </div>

<h1 > fasion gallery</h1>
    
    <div>
    <?php if ($numMsgs > 0) : ?>
        <table class="type09">
            <thead>
			<tr>
                <th scope="cols">번호</th>
                <th scope="cols">제목</th>
                <th scope="cols">작성자</th>
                <th scope="cols">작성일시</th>
                <th scope="cols">조회수</th>
            </tr>
			</thead>
            <?php foreach ($msgs as $row) : ?>
            <tr>
                <td scope="row"><?= $row["num"] ?></td>
                <td class="left ab">
                    <a href="<?= bdUrl("view.php", $row["num"], 
                              $page) ?>"><?= $row["title"] ?></a>
                </td>
                <td><?= $row["writer"] ?></td>
                <td><?= $row["regtime"] ?></td>
                <td><?= $row["hits"] ?></td>
            </tr>
            <?php endforeach ?>
        </table>

        <br>
        <?php if ($firstLink > 1) : ?>
            <a href="<?= bdUrl("board.php", 0, 
                         $page - NUM_PAGE_LINKS) ?>"><</a>&nbsp;
        <?php endif ?>

        <?php for ($i = $firstLink; $i <= $lastLink; $i++) : ?>
            <?php if ($i == $page) : ?>
                <a href="<?= bdUrl("board.php", 0, $i) 
                             ?>"><b><?= $i ?></b></a>&nbsp;
            <?php else : ?>
                <a href="<?= bdUrl("board.php", 0, $i)
                             ?>"><?= $i ?></a>&nbsp;
            <?php endif ?>
        <?php endfor ?>

        <?php if ($lastLink < $numPages) : ?>
            <a href="<?= bdUrl("board.php", 0, 
                               $page + NUM_PAGE_LINKS) ?>">></a>
        <?php endif ?>

    <?php endif ?>
	
        <?php if ($loginId) : ?>    
    <br><br>
    <div class="right">
        <input type="button" value="글쓰기" 
               onclick="location.href=
                '<?= bdUrl("write_form.php", 0, $page) ?>'">
    </div>
        <?php endif ?>    
    </div>

   


</body>
</html>