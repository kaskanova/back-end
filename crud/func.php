<?php
function create_category($link, $name, $parent_id) {
    $query = "INSERT INTO adele_categories 
    (name, parent_id) VALUES ('$name', $parent_id)";
    $result = pg_exec($link, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function get_categories($link) {
    $query = "SELECT * FROM adele_categories WHERE deleted_at IS NULL";
    $result = pg_query($link, $query);

    if ($result) {
        return pg_fetch_all($result);
    } else {
        return false;
    }
}

function delete_category($link, $id) {
    $query = "DELETE FROM adele_categories WHERE id = $id";
    $result = pg_query($link, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}
function place_categories($link) {
    $categories = get_categories($link);
    if ($categories) {
        foreach ($categories as $category) {
            $name = $category['name'];
            $id = $category['id'];
            echo "<option value='$id'>$name</option>";
        }
    } else {
        echo 'Нет категорий';
    }
}
?>