<?php

require_once('database.php');

// Get category ID
if (!isset($category_id)) {
  $category_id = filter_input(
    INPUT_GET,
    'category_id',
    FILTER_VALIDATE_INT
  );
  if ($category_id == NULL || $category_id == FALSE) {
    $category_id = 1;
  }
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM records
WHERE categoryID = :category_id
ORDER BY recordID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();
?>

<div class="container">
  <?php
  include('includes/header.php');
  ?>
  <h1>Record List</h1>

  <!-- <aside> -->
  <!-- display a list of categories -->
  <!-- <h2>Categories</h2>
    <nav>
      <ul>
        <?php foreach ($categories as $category) : ?>
          <li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
              <?php echo $category['categoryName']; ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </aside> -->


  <!-- display a table of records -->



  <?php foreach ($records as $record) : ?>







    <table class="table table-hover">

      <tbody>
        <tr>
          <td scope="row"><img src="image_uploads/<?php echo $record['image']; ?>" class="rounded" alt="..." width="250" height="auto " />
          <td class="align-middle">


            <fieldset class = "fieldset">
              <legend>Name</legend>

              <label><?php echo $record['name']; ?> </label><br />


            
          </td>

          <!--          
  <input type="email" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="test@example.com">
  <label for="floatingInputValue">Input with value</label> -->

          <td class="align-middle">
         
              <legend>Price</legend>

              <label for="kraken"><?php echo $record['price']; ?> </label><br />


            </fieldset>

          </td>
          </td>



          <td class="align-middle">
            <form action="delete_record.php" method="post" id="delete_record_form">
              <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
              <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
              <input class="btn btn-outline-dark" type="submit" value="Delete">
            </form>
          </td>
          <td class="align-middle">
            <form action="edit_record_form.php" method="post" id="delete_record_form">
              <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
              <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
              <input class="btn btn-outline-dark" type="submit" value="Edit">
            </form>
          </td>
        </tr>

      </tbody>
    </table>



    <!-- <img src="image_uploads/<?php echo $record['image']; ?>" width="100px" height="100px" />
      <td><?php echo $record['name']; ?></td>
      <td class="right"><?php echo $record['price']; ?></td>
      <td>
        <form action="delete_record.php" method="post" id="delete_record_form">
          <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
          <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
          <input type="submit" value="Delete">
        </form>
      </td>
      <td>
        <form action="edit_record_form.php" method="post" id="delete_record_form">
          <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
          <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
          <input type="submit" value="Edit">
        </form>
      </td>
      </tr> -->

    <!-- 
      <p><a href="add_record_form.php">Add Record</a></p>
      <p><a href="category_list.php">Manage Categories</a></p> -->

  <?php endforeach; ?>
  <?php
  include('includes/footer.php');
  ?>