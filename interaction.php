<!DOCTYPE html>
<?php
include 'functions\function.php';
include "blocks\head.php";
$page_login = "Взаимодействие с PHP";
$page_name = "interaction";
session_start();{
    $_SESSION['page_name'] = $page_name;
    $_SESSION['item_id'] = $_GET['id'];
    $_SESSION['page_login'] = $page_login;
}

if(isset($_POST['edit'])) {
    $_SESSION['item_id'] = $_GET['id'];
}

if(isset($_POST['del'])) {
    delete($for_query, $page_name, $_GET['id']);
    $_GET['id'] =1;
}
?>
<script src="scripts\js_index.js" charset="utf-8"></script>
<html>
<head>
    <meta charset="UTF-8">
    <link href="style/style.css" type="text/css" rel="stylesheet">
    <title>Установка</title>
</head>
<body>

<form method="post">
    <?php include("blocks/sidebar.php"); ?>

    <div class="div_sections">
        <p class="banner"><?php echo $page_login;?></p>
        </br>
        <?php
        $txt = select_txt($for_query, $page_name, $_GET['id']);
        foreach ($txt as $item) {
            echo $item[4];
        }
        ?>
        </br>

        <input type="submit" class="buttons" id="botton_edit" name="edit" value="Редактировать статью" onclick="openEdit()">

        <input type="submit" class="buttons" id="botton_del" name="del" value="Удалить Статью">

    </div>
</form>
</body>
</html>