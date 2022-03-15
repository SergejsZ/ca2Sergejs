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

     <div class="mb-5">
        <label>Category:</label>
        <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        </div>
        <div class="mb-5">
        <label>Name:</label>
        <input type="input" name="name" required>
        <br>
        </div>
        <div class="mb-5">
        <label>List Price:</label>
        <input type="input" name="price" required>
        <br>
        </div>
        <div class="mb-5">
        <label>Image:</label>
        <input type="file" name="image" accept="image/*" />
        <br>
        </div>
        <div class="mb-5">
        <label>&nbsp;</label>
        <input type="submit" value="Add Record">
        <br>
        </div>
    </form>


    <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <!-- <p><a href="index.php">View Homepage</a></p> -->
    <?php
    include('includes/footer.php');
    ?>