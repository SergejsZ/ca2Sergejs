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
            echo "<th>id</th>";
            echo "<th>name</th>";
            echo "<th>price</th>";
            echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<img src=image_uploads' width='100px' height='100px'> " . $row['image'] . "</img >";
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
     
                    