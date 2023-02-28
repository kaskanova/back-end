<?php
$login='root';
$password='';
$db='users';
$localhost='localhost';
$dsn='mysql:host='.$localhost.';dbname='.$db;
$conn = new PDO($dsn, $login, $password);

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $parent_id = $_POST['parent_id'];

    $stmt = $conn->prepare("INSERT INTO categories (name, parent_id) VALUES (:name, :parent_id)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':parent_id', $parent_id);
    $stmt->execute();
}

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $stmt = $conn->prepare("DELETE FROM categories WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

$stmt = $conn->prepare("SELECT categories.id, categories.name, parent_categories.name as parent_name
                        FROM categories LEFT JOIN categories AS parent_categories
                        ON categories.parent_id = parent_categories.id
                        WHERE categories.deleted_at IS NULL");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>задание PDO</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="name"><br><br>
        <select name="parent_id">
            <option value="">None</option>
            <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php } ?>
        </select>
        <button type="submit" name="add">Add</button>
        <br><br>
        <table border="2">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Parent_id</th>
                <th>Deleted_at</th>
            </tr>
            <?php foreach ($categories as $category) { ?>
                <tr>
                    <td><?php echo $category['id']; ?></td>
                    <td><?php echo $category['name']; ?></td>
                    <td><?php echo $category['parent_name']; ?></td>
                    <td><button type='submit' name='delete' value='<?php echo $category['id']; ?>'>Delete</button></td>
                </tr>
            <?php } ?>
        </table>
    </form>
</body>

</html>