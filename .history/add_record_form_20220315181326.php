<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1>Add Record</h1>
    <form action="add_record.php" method="post" enctype="multipart/form-data"
     id="add_record_form">

        <label>Category:</label>
        <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="mb-3">
        <br >
        <label for="exampleInputEmail1" class="form-label">Name:</label>
        <input type="input" name="name" required>
        <br>

        <label for="exampleInputEmail1" class="form-label">List Price:</label>
        <input type="input" name="price" required>
        <br>

        <label for="exampleInputEmail1" class="form-label">Image:</label>
        <input type="file" name="image" accept="image/*" />
        <br>

        <label for="exampleInputEmail1" class="form-label">&nbsp;</label>
        <input type="submit" value="Add Record">
        <br>
        </div>
    </form>


    <!-- <p><a href="index.php">View Homepage</a></p> -->
    <?php
    include('includes/footer.php');
    ?>