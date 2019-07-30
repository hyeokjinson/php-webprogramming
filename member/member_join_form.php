<?php
	require_once("../tools.php");
	require_once("MemberDao.php");

	
	?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">

 <style>
        a {
            color: #0060B6;
            text-decoration: none;
        }
        body{
            background-image:url("cloth.png")
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
	</head>
<body>
<h1 style="text-align:center"><a href="/154420/home.html">fashion magazine</a></h1>
<body>
    <div id="menu_wrapper" class="black">
        <div class="left"></div>
        <ul id="menu">
            <li><a href="login_main.php">회원관리</a></li>
            <li class="active"><a href="chatbot.html">챗봇</a></li>
            <li><a href="board.php">게시판</a></li>
            <li><a href="downloads.html">파일관리</a></li>

        </ul>
    </div>

<form action="member_join.php" method="post">
    <table>
        <tr>
            <td>아이디</td>
            <td><input type="text" name="id"></td>
        </tr>
        <tr>
            <td>비밀번호</td>
            <td><input type="password" name="pw"></td>
        </tr>
        <tr>
            <td>성명</td>
            <td><input type="text" name="name"></td>
        </tr>
		<tr>
            <td>이메일</td>
            <td><input type="text" name="email"></td>
        </tr>
    </table>    
    <input type="submit" value="확인"> 
</form>

</body>
</html>