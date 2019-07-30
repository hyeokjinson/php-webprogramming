<?php
    $upload_succeeded = false;

    if ($_FILES["upload"]["error"] == UPLOAD_ERR_OK) {
        $temp_name = $_FILES["upload"]["tmp_name"];
        $file_name = $_FILES["upload"]["name"];
        $file_size = $_FILES["upload"]["size"];
        $file_type = $_FILES["upload"]["type"];
    
        $save_name = iconv("utf-8", "cp949", $file_name);
        
        if (move_uploaded_file($temp_name, "files/$save_name"))
            $upload_succeeded = true;
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php if ($upload_succeeded) : ?>    
    업로드 성공<br>
    파일 이름 : <?= $file_name ?><br>
    파일 크기 : <?= number_format($file_size) ?> bytes<br>
    파일 타입 : <?= $file_type ?><br>
<?php else : ?>
    업로드 실패<br>
<?php endif ?>
    
</body>
</html>  