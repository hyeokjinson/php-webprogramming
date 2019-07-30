<?php
    require("WebhardDao.php");
    $dao = new WebhardDao();
    
    $sort = isset($_REQUEST["sort"]) ? $_REQUEST["sort"] : "fname";
    $dir  = isset($_REQUEST["dir"])  ? $_REQUEST["dir"]  : "asc";

    $result = $dao->getFileList($sort, $dir);
?>

<!doctype html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style type="text/css">
        a {
            color: #0060B6;
            text-decoration: none;
        }

        body {
            background-image: url("black1.jpg");
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

}
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


    <script src="http://malsup.github.com/jquery.cycle2.js"></script>
</head>
<h1 style="text-align:center"><a href="home.html">fashion magazine</a></h1>
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
                    <span><a href="../chatbot.html">챗봇</a></span>
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
        <header></header>
        <section>
            <form action="add_file.php?sort=<?= $sort ?>&dir=<?= $dir ?>" 
      enctype="multipart/form-data" method="post">
    업로드할 파일을 선택하세요.<br>
    <input type="file" name="upload"><br>
    <input type="submit"  value="업로드">
</form>
<br>

<table class="table table-striped table-dark">
   <thead>
   <tr>
        <th scope="col">파일명
            <a href="?sort=fname&dir=asc">^</a>
            <a href="?sort=fname&dir=desc">v</a>            
        </th>
        <th scope="col">업로드
            <a href="?sort=ftime&dir=asc">^</a>
            <a href="?sort=ftime&dir=desc">v</a>            
        </th>
        <th scope="col">크기</th>
        <th scope="col">삭제</th>
    </tr>
	</thead>
	
    <?php foreach ($result as $row) : ?>
    <tbody>
	<tr>
        <td class="left"><a href="files/<?= $row["fname"] ?>">
                                  <?= $row["fname"] ?></a></td>
        <td><?= $row["ftime"] ?></td>
        <td class="right"><?= $row["fsize"] ?>&nbsp;&nbsp;</td>
        <td><a href="del_file.php?num=<?= $row["num"] ?>&sort=<?= 
                     $sort ?>&dir=<?= $dir ?>">X</td>
    </tr>
	</tbody>
    <?php endforeach ?>
</table>
</section>
            <div id="fixed">
                <a href="https://www.facebook.com/profile.php?id=100002155870834"><img src="facebook.jpg" alt="손혁진 페이스북" width="50" height="50"></a>
                <a href="https://www.instagram.com/hjson817/?hl=ko"><img src="instagram.jpg" alt="손혁진 인스타그램" width="50" height="50"></a>
            </div>
      
      
    </main>
</body>
</html>

      

