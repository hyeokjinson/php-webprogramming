<?php
    require_once("../tools.php");

    // 전달된 값 저장
    $page   = requestValue("page");    
    
    // 로그인한 사용자 아이디 저장
    // 이 아이디로 작성자 입력란을 채워 줌
    session_start_if_none();
    $loginId = sessionVar("uid");    
?>
    
<!doctype html>
<html>

<head>
<style>
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
</style>
</head>

<body>
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
        <form method="post" action="write.php">
            <table class="type09">
                <tr>
                    <th>제목</th>
                    <td><input type="text" name="title" maxlength="80"
                               class="type09-text">
                    </td>
                </tr>
        
                <tr>
                    <th class="msg-header">작성자</th>
                    <td><input type="text" name="writer" maxlength="20"
                               value="<?= $loginId ?>" readonly                     
                               class="type09-text">
                    </td>
                </tr>
        
                <tr>
                    <th>내용</th>
                    <td><textarea name="content" wrap="virtual"
                               rows="10" class="type09-text"></textarea>
                    </td>
                </tr>
            </table>
        
            <br>
            <div class="left">
                <input type="submit" value="글등록">
                <input type="button" value="목록보기"
                       onclick="location.href='<?= 
                                bdUrl("board.php", 0, $page) ?>'">
            </div>
        </form>
    </div>

   
</div>

</body>
</html>