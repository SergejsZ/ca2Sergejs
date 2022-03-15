<head>
<link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/album/">

<!-- Bootstrap core CSS -->
<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="album.css" rel="stylesheet">
<title>My Phone App</title>
<link rel="stylesheet" type="text/css" href="mySassStyle/mainStyle.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
<div class="container p-4">
<?php
include('includes/header.php');
?>
</body>
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

<?php
if (isset($_POST['submit'])) {
    $searchValue = $_POST['search'];
    $con = new mysqli("localhost", "root", "", "ca2_sergejs");
    if ($con->connect_error) {
        echo "connection Failed: " . $con->connect_error;
    } else {
        $sql = "SELECT * FROM records WHERE name LIKE '%$searchValue%'";

        $result = $con->query($sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-striped'>";
            echo "<tr>";
            echo "<th>image</th>";
            echo "<th>name</th>";
            echo "<th>price</th>";
            echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . "<img src=image_upload/' width='100px' height='100px'> " . $row['image'] . "</img >" . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Close result set
        mysqli_free_result($result);
        }
    }
}
     
                    