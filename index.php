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

  <?php foreach ($records as $record) : ?>







    <table class="table table-hover">

      <tbody>
        <tr>
          <td scope="row"><img src="image_uploads/<?php echo $record['image']; ?>" class="rounded" alt="..." width="250" height="auto " />
          <td class="align-middle">


            <fieldset class="fieldset">
              <legend>Name</legend>
              <label><?php echo $record['name']; ?> </label><br />
            </fieldset>
          </td>

          <td class="align-middle">
            <fieldset class="fieldset">
              <legend>Price</legend>

              <label><?php echo $record['price']; ?> </label><br />


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
  <?php endforeach; ?>
  <?php
  include('includes/footer.php');
  ?>