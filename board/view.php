<?php
    require_once("../tools.php");
    require_once("BoardDao.php");
	 require_once("../member/MemberDao.php");
	 
	 session_start_if_none();
    $id   = sessionVar("uid");
    // 전달된 값 저장
    $num     = requestValue("num");
    $page    = requestValue("page");

    // 지정된 번호의 글 데이터를 읽고, 조회 수 증가
    $dao = new BoardDao();
    $row = $dao->getMsg($num);
    $dao->increaseHits($num);

    // 제목의 공백, 본문의 공백과 줄넘김이 웹에서 보이도록 처리
    $row["title"]   = str_replace(" ",  "&nbsp;", $row["title"]);
    $row["content"] = str_replace(" ",  "&nbsp;", $row["content"]);
    $row["content"] = str_replace("\n", "<br>",   $row["content"]);
    
    // 로그인한 사용자 아이디 저장
    // 이 아이디와 작성자가 일치할 때만 수정&삭제 버튼이 보이도록 함
    session_start_if_none();
    $loginId = sessionVar("uid");    
?>

<!doctype html>
<html>
<head>
   

<style>
 
table.type09 thead th {
    padding: 10px;
    font-weight: bold;
    vertical-align: top;
    color: #369;
    border-bottom: 3px solid #036;
}
table.type09 tbody th {
    width: 150px;
    padding: 10px;
    font-weight: bold;
    vertical-align: top;
    border-bottom: 1px solid #ccc;
    background: #f3f6f7;
}
table.type09 td {
    width: 350px;
    padding: 10px;
    vertical-align: top;
    border-bottom: 1px solid #ccc;
}
       h1{
	   	   font-style="italic";
	   }
	   a {
            color: #0060B6;
            text-decoration: none;
        }
        body{
            background-image:url("https://previews.123rf.com/images/irrrina/irrrina1406/irrrina140600009/29417492-%EB%B9%88-%ED%99%94%EC%9D%B4%ED%8A%B8-%EC%8A%A4%ED%8A%9C%EB%94%94%EC%98%A4-%EB%B0%B0%EA%B2%BD-%EC%9D%B8%ED%85%8C%EB%A6%AC%EC%96%B4.jpg")
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
<body>
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


    
    <div>
    <table  class="type09">
        <tr>
            <th class="msg-header">제목</th>
            <td class="msg-text left"><?= $row["title"]; ?></td>
        </tr>

        <tr>
            <th>작성자</th>
            <td class="msg-text left"><?= $row["writer"]; ?>
            </td>
        </tr>

        <tr>
            <th>작성일시</th>
            <td class="msg-text left"><?= $row["regtime"]; ?>
            </td>
        </tr>

        <tr>
            <th>조회수</th>
            <td class="msg-text left"><?= $row["hits"]; ?></td>
        </tr>

        <tr>
            <th>내용</td>
            <td class="msg-text left"><?= $row["content"]; ?>
            </td>
        </tr>
		
    </table>
	 <br>
	  <br>
	   <br>

	
    <br>
    <div class="left">
        <input type="button" value="목록보기"
               onclick="location.href='<?= 
                        bdUrl("board.php", 0, $page) ?>'">
            <?php if ($loginId == $row["writer"]) : ?>                        
        <input type="button" value="수정"
               onclick="location.href='<?=
                 bdUrl("modify_form.php", $num, $page) ?>'">
        <input type="button" value="삭제"
               onclick="location.href='<?=
                      bdUrl("delete.php", $num, $page) ?>'">
            <?php endif ?>                      
    </div>
    </div>
	<form method="post" action="comment.php">
	<table class="type09" >
	<tr>
            <th>아이디</th>
           <th>댓글</th> 
        </tr>
	<input  name="num" value=<?= $num ?> readonly><p>아이디: <input  name="id" value=<?= $id ?> readonly></p>
   
     
	<p>댓글달기: <input id="comment" name="write" type="text"><input id="submit" type="submit" value="comment"></p>
	<br>
	
	<?php
   /*댓글 출력 및 설정*/
	 $id = requestValue("id");
	try {
        $db = new PDO("mysql:host=localhost;dbname=phpdb",
                      "php", "php2018");
        $db->setAttribute(PDO::ATTR_ERRMODE,
                          PDO::ERRMODE_EXCEPTION);
		$query1=$db->query("insert into 154420_com(number) value('$num')");
        $query = $db->query("select *from 154420_com where number like '$num%'");
		if($query1=$query)
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>", $row["name"],  "</td>";
            echo "<td>", $row["comm"], "</td>";
            echo "<br>";
            echo "</tr>";
        }
					
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
?>
</table>
</form>


</body>
</html>