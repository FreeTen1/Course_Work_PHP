<!DOCTYPE html>
<?php
include 'functions\function.php';
session_start();{
    $page_name = $_SESSION['page_name'];
    $item_id = get_item_next_id($for_query, $page_name);
    $page_login = $_SESSION['page_login'];
}
$txt = select_txt($for_query, $page_name, $item_id);
if(isset($_POST['add'])) {
    if($_POST["item_name"] == ""){
        echo "<script>alert('Введите название статьи')</script>";
    }
    else{
        create_item($for_query, $page_name, $item_id, $_POST["item_name"], $_POST["ta"]);
        header("location: ".$_SERVER['PHP_SELF']);
        exit;
    }
}
?>
<script src="scripts\js_index.js" charset="utf-8"></script>
<html>
<head>
    <meta charset="UTF-8">
    <link href="style/style.css" type="text/css" rel="stylesheet">
    <title>Добавление статьи</title>
    <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
</head>
<body>
<form method="post">

    <div class="div_header">
        <div class="div_logo">
            <a href="index.html" class="a_style_img"><img src="img/logo.png" align="center" width="100%"></a>
        </div>
        <p class="head_text">Добавление статьи в раздел "<?php echo $page_login?>"</p>
    </div>


    <div class="div_sections" id="div_index">
        <nobr>Название статьи:</nobr>
        <input type="text" id="item_name"  autocomplete="off" name="item_name">
        <textarea name="ta" id="editor1" cols="125" rows="30"><?php foreach ($txt as $item) {echo $item[4];} ?></textarea>
        <script type="text/javascript">
            CKEDITOR.replace( 'editor1' );
        </script>
        </br>

        <input type="submit" class="buttons" name="add" value="Добавить">
    </div>
</form>
</body>
</html>
