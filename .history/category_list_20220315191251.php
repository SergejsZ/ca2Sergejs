<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>
<!-- the head section -->
<div class="container p-4">
<?php
include('includes/header.php');
?>
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form action="delete_category.php" method="post"
                      id="delete_product_form">
                    <input  type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>">
                    <button  type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2>Add Category</h2>
    <form action="add_category.php" method="post"
          id="add_category_form">
        <label>Name:</label>
        <input class="form-control" type="input" name="name" required>
        <div class="form-text">Enter name of the Category you would like to add.</div>
        <input id="add_category_button" type="submit" value="Add" required >
    </form>
    <br>

    <?php
include('includes/footer.php');
?>