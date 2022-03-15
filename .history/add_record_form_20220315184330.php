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
        <select  class="form-select" aria-label="Default select example"  name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="exampleInputEmail2" class="form-label">Name:</label>
        <input class="form-control" type="input" name="name" required>
        <div class="form-text">Enter name of the Phone you would like to add.</div>
        <br>

        <label>List Price:</label>
        <input  class="form-control" type="input" name="price" required>
        <div class="form-text">Enter price of the Phone.</div>
        <br>

        <label>Image:</label>
        <input class="form-control" type="file" name="image" accept="image/*" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Record">
        <br>
    </form>


    <!-- <p><a href="index.php">View Homepage</a></p> -->
    <?php
    include('includes/footer.php');
    ?>