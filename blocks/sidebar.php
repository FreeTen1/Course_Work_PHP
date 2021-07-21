<div class="div_sidebar">
    <ol>
        <?php
            $txt = get_items_name($for_query, $page_name);
            foreach ($txt as $item) {
                echo "<li><a href=\"$page_name.php?id=$item[2]\">$item[3]</a></li>";
            }
            
        if(isset($_POST['add_item'])) {
            $_SESSION['item_id'] = $_GET['id'];;
        }
        ?>

    </ol>

    <input type="submit" class="buttons" id="sidebar_buttons" name="add_item" value="Добавить статью" onclick="openAdd_item()">
</div>