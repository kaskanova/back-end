<?php
require_once "func.php";
$link = mysqli_connect('localhost', 'root', '', 'kinotower');
if(!$link) {
    echo mysqli_connect_error($link);
    die();    
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['cat_name'])) {
        $category_name = $_POST['name'];
        $parent_category_id = $_POST['parent'];
        create_category($link, $category_name, $parent_category_id);
        $_POST = array();
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>1</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
<div class="w-full max-w-sm">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="index.php" method="post">
        <div class="mb-4">
            <label  for="name">
                Имя категории
            </label>
            <input class="shadow border rounded" id="name" type="text" placeholder="Имя категории" name = "name" value="">
        </div>
        <div class="mb-4">
            <label for="parent_category">
                Родительская категория
            </label>
            <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" id="parent_category" name="parent">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Добавить категорию
            </button>

                <?php
                    place_categories($link);
                ?>
            </select>
        </div>
        <div class="flex items-center justify-between">
            
        </div>
    </form>
</div>

<div class="w-full max-w-sm">
    <form action="delete.php" method="post">
    <table class="table-auto w-full text-left bg-white shadow-md rounded mb-4">
        <thead class="bg-gray-400">
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Имя</th>
            <th class="px-4 py-2">ID Родительская Категория</th>
            <th class="px-4 py-2">Действие</th>
        </tr>
        </thead>
        <tbody>

        <?php
       $categories = get_categories($link);
        if ($categories) {
            foreach ($categories as $category) {
                $id = $category['id'];
                echo '<tr>';
                echo '<td class="border px-4 py-2">' . $category['id'] . '</td>';
                echo '<td class="border px-4 py-2">' . $category['name'] . '</td>';
                echo '<td class="border px-4 py-2">' . $category['parent_id'] . '</td>';
                echo '<td class="border px-4 py-2">';
                echo "<button class='bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded' value='$id' name='delete'>Удалить</button>";

            }
        } else {
            echo 'Нет категорий';
        }
        ?>

        </tbody>
    </table>

    </form>
</div>

</body>
</html>