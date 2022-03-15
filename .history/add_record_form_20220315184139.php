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
        <select   name="category_id">
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

    <form>
    <label for="exampleInputEmail1" class="form-label">Category:</label>
        <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>   
        <br>       
    
 
    <label for="exampleInputEmail2" class="form-label">Name:</label>
    <input type="input"  name="name" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp1">
    <div id="emailHelp1" class="form-text">Enter name of the Phone you would like to add.</div>
    <br>
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="input"  name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp2">
    <div id="emailHelp2" class="form-text">We'll never share your email with anyone else.</div>
    <br>
 
    <label for="exampleInputEmail3"  class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <label>&nbsp;</label>
  <input type="submit" value="Add Record">
</form>
    <!-- <p><a href="index.php">View Homepage</a></p> -->
    <?php
    include('includes/footer.php');
    ?>