<?php
include 'configs\config.php';

function select_txt($for_query, $name, $item_id) {
    $txt = array();
    $query = "SELECT * FROM editor WHERE item_id = $item_id and name = '$name'";
    $res = mysqli_query($for_query, $query);
    while ($row = mysqli_fetch_row($res)) {
        $txt[] = $row;
    }
    return $txt;
}

function get_items_name($for_query, $name) {
    $item_name = array();
    $query = "select * from editor where name = '$name'";
    $res = mysqli_query($for_query, $query);
    while ($row = mysqli_fetch_row($res)) {
        $item_name[] = $row;
    }
    return $item_name;
}

function get_item_next_id($for_query, $name) {
    $res = mysqli_query($for_query, "SELECT count(*) FROM editor WHERE name = '$name'");
    $row = mysqli_fetch_row($res);

    return $row[0] + 1;
}

function create_item($for_query, $name, $item_id, $item_name, $text) {
    $txt = mysqli_real_escape_string($for_query, $text);
    $query = "INSERT INTO `editor`(`name`, `item_id`, `item_name`, `text`) VALUES (\"$name\",$item_id,\"$item_name\", '$txt')";
    mysqli_query($for_query, $query);
}

function update($for_query,$item_id, $name, $item_name, $text) {
    $txt = mysqli_real_escape_string($for_query, $text);
    $query = "UPDATE `editor` SET `item_name`='$item_name',`text`='$txt' WHERE item_id = $item_id and name = '$name'";
    mysqli_query($for_query, $query);
}

function delete($for_query, $name, $item_id) {
//    $id = (int)$item_id;
    $query = "DELETE FROM editor WHERE item_id=$item_id and name = '$name'";
    mysqli_query($for_query, $query);
    $query = "UPDATE `editor` SET `item_id`=item_id - 1 WHERE name = '$name' and item_id > $item_id";
    mysqli_query($for_query, $query);
}