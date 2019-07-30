<?php 
    require_once("../tools.php");
    
    // 사용자 아이디와 이름을 담은 세션 변수 읽기
    session_start_if_none();
    $id   = sessionVar("uid");
    $name = sessionVar("uname");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<style>
	@import url(http://weloveiconfonts.com/api/?family=fontawesome);
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}

* {
  box-sizing: border-box;
}

html {
  height: 100%;
}

body {
  background-color: #2c3338;
  color: #606468;
  font: 400 0.875rem/1.5 "Open Sans", sans-serif;
  margin: 0;
  min-height: 100%;
}

a {
  color: #eee;
  outline: 0;
  text-decoration: none;
}
a:focus, a:hover {
  text-decoration: underline;
}

input {
  border: 0;
  color: inherit;
  font: inherit;
  margin: 0;
  outline: 0;
  padding: 0;
  -webkit-transition: background-color .3s;
          transition: background-color .3s;
}

.154420__container {
  -webkit-box-flex: 1;
  -webkit-flex: 1;
      -ms-flex: 1;
          flex: 1;
  padding: 3rem 0;
}

.form input[type="password"], .form input[type="text"], .form input[type="submit"] {
  width: 100%;
}
.form--login {
  color: #606468;
}
.form--login label,
.form--login input[type="text"],
.form--login input[type="password"],
.form--login input[type="submit"] {
  border-radius: 0.25rem;
  padding: 1rem;
}
.form--login label {
  background-color: #363b41;
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
  padding-left: 1.25rem;
  padding-right: 1.25rem;
}
.form--login input[type="text"], .form--login input[type="password"] {
  background-color: #3b4148;
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}
.form--login input[type="text"]:focus, .form--login input[type="text"]:hover, .form--login input[type="password"]:focus, .form--login input[type="password"]:hover {
  background-color: #434A52;
}
.form--login input[type="submit"] {
  background-color: #ea4c88;
  color: #eee;
  font-weight: bold;
  text-transform: uppercase;
}
.form--login input[type="submit"]:focus, .form--login input[type="submit"]:hover {
  background-color: #d44179;
}
.form__field {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  margin-bottom: 1rem;
}
.form__input {
  -webkit-box-flex: 1;
  -webkit-flex: 1;
      -ms-flex: 1;
          flex: 1;
}

.align {
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
      -ms-flex-direction: row;
          flex-direction: row;
}

.hidden {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

.text--center {
  text-align: center;
}

.grid__container {
  margin: 0 auto;
  max-width: 20rem;
  width: 90%;
}

       /*메뉴바*/
	   a {
            color: #0060B6;
            text-decoration: none;
        }

        body {
            background-image: url("cloth.png")
        }
        input[type="checkbox"]#menu_state {
            display: none;
        }

        input[type="checkbox"]:checked ~ nav {
            width: 250px;
        }

            input[type="checkbox"]:checked ~ nav label[for="menu_state"] i::before {
                content: "\f053";
            }

            input[type="checkbox"]:checked ~ nav ul {
                width: 100%;
            }

                input[type="checkbox"]:checked ~ nav ul li a i {
                    border-right: 1px solid #2f343e;
                }

                input[type="checkbox"]:checked ~ nav ul li a span {
                    opacity: 1;
                    transition: opacity 0.25s ease-in-out;
                }

        input[type="checkbox"]:checked ~ main {
            left: 250px;
        }

        nav {
            position: fixed;
            z-index: 9;
            top: 0;
            left: 0;
            bottom: 0;
            background: #383e49;
            color: #9aa3a8;
            width: 50px;
            font-family: 'Montserrat', sans-serif;
            font-weight: lighter;
            transition: all 0.15s ease-in-out;
        }

            nav label[for="menu_state"] i {
                cursor: pointer;
                position: absolute;
                top: 50%;
                right: -8px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                background: #fff;
                font-size: 10px;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 15px;
                width: 15px;
                border-radius: 50%;
                border: 1px solid #ddd;
                transition: width 0.15s ease-in-out;
                z-index: 1;
            }

                nav label[for="menu_state"] i::before {
                    margin-top: 2px;
                    content: "\f054";
                }

                nav label[for="menu_state"] i:hover {
                    box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                }

            nav ul {
                overflow: hidden;
                display: block;
                width: 50px;
                list-style-type: none;
                padding: 0;
                margin: 0;
            }

                nav ul li {
                    border: 1px solid #2f343e;
                    position: relative;
                }

                    nav ul li.unread:after {
                        content: attr(data-content);
                        position: absolute;
                        top: 10px;
                        left: 25px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        width: 15px;
                        height: 15px;
                        border-radius: 50%;
                        color: #fff;
                        background: #ef5952;
                        font-size: 8px;
                    }

                    nav ul li:not(:last-child) {
                        border-bottom: none;
                    }

                    nav ul li.active a {
                        background: #4c515d;
                        color: #fff;
                    }

                    nav ul li a {
                        position: relative;
                        display: block;
                        white-space: nowrap;
                        text-decoration: none;
                        color: #9aa3a8;
                        height: 50px;
                        width: 100%;
                        transition: all 0.15s ease-in-out;
                    }

                        nav ul li a:hover {
                            background: #4c515d;
                            color: #fff;
                        }

                        nav ul li a * {
                            height: 100%;
                            display: inline-block;
                        }

                        nav ul li a i {
                            text-align: center;
                            width: 50px;
                            z-index: 999999;
                        }

                            nav ul li a i.fa {
                                line-height: 50px;
                            }

                        nav ul li a span {
                            padding-left: 25px;
                            opacity: 0;
                            line-height: 50px;
                            transition: opacity 0.1s ease-in-out;
                        }

        main {
            position: absolute;
            transition: all 0.15s ease-in-out;
            top: 0;
            left: 50px;
        }

            main header {
                position: absolute;
                z-index: -1;
                top: 0;
                left: 0;
                right: 0;
                height: 400px;
                background: url("http://www.blueb.co.kr/SRC2/_image/01.jpg");
                background-size: cover;
                background-position: 50% 50%;
                background-repeat: no-repeat;
            }

            main section {
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                background: #fff;
                padding: 25px;
                font-family: helvetica;
                font-weight: lighter;
                padding: 50px;
                margin: 150px 75px;
                transition: all 0.15s ease-in-out;
            }

                main section:hover {
                    box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                }

                main section h1 {
                    padding-top: 0;
                    margin-top: 0;
                    font-weight: lighter;
                }
				header {
        height: 50px;
   
    }



    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


    <script src="http://malsup.github.com/jquery.cycle2.js"></script>
</head>
<header>
<h1 style="text-align:center"><a href="home.html">fashion magazine</a></h1>
</header>
<body>
    <input type="checkbox" id="menu_state" checked>
    <nav>
        <label for="menu_state"><i class="fa"></i></label>
        <ul>
            <li data-content="5" class="active unread">
                <a href="javascript:void(0)">
                    <i class="fa fa-inbox"></i>
                    <span><a href="/154420/login_main.php">회원관리</a></span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i class="fa fa-heart"></i>
                    <span><a href="chatbot.html">챗봇</a></span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i class="fa fa-paper-plane"></i>
                    <span><a href="/154420/board/board.php">패션 갤러리</a></span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i class="fa fa-pencil"></i>
                    <span><a href="/154420/file/webhard.php">MD추천 리스트</a></span>
                </a>
            </li>
          
        </ul>
    </nav>
	<main>
	<section>
<?php if ($id) :     // 로그인 상태일 때의 출력 ?>
<form action="<?= MEMBER_PATH ?>/member/logout.php" method="post">
    <?= $name ?>님 로그인
    <input type="submit" value="로그아웃"> 
    
    <input type="button" value="회원정보 수정" 
           onclick="location.href=
                 '<?= MEMBER_PATH ?>/member/member_update_form.php'">
				  <input type="button" value="회원탈퇴" 
           onclick="location.href=
                 '<?= MEMBER_PATH ?>/member/member_delete_form.php'">
				  <input type="button" value="가조쿠 검색" 
           onclick="location.href=
                 '<?= MEMBER_PATH ?>/member/member_search_form.php'">
</form>
	
 
	
<?php else : // 로그인되지 않은 상태일 때의 출력 ?>
<body class="align">
<div class="154420__container">
<div class="grid__container">
<form action="<?= MEMBER_PATH ?>/member/login.php" method="post"class="form form--login">

       <div class="form__field">
   아이디: <input type="text" name="id">&nbsp;&nbsp;
   </div>
   <div class="form__field">
    비밀번호: <input type="password" name="pw">
	 </div>
     <div class="form__field">
	<input type="submit" value="로그인"> 
    </div>
    <input type="button" value="회원가입" 
           onclick="location.href=
                 '<?= MEMBER_PATH ?>/member/member_join_form.php'">
</form>
<?php endif ?>
</section>
</main>
</body>
</html>