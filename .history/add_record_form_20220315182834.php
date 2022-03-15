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
        <br>
        <label>Name:</label>
        <input type="input" name="name" required>
        <br>

        <label>List Price:</label>
        <input type="input" name="price" required>
        <br>

        <label>Image:</label>
        <input type="file" name="image" accept="image/*" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Record">
        <br>
    </form>

    <form>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category:</label>
        <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        </div>
        
    
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name:</label>
    <input type="input"  name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Enter name of the Phone you would like to add.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <button type="submit" value="Add Record">Submit</button>
</form>
    <!-- <p><a href="index.php">View Homepage</a></p> -->
    <?php
    include('includes/footer.php');
    ?>