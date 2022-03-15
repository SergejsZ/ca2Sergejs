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
                            $sql = "SELECT * FROM records WHERE price LIKE '%$searchValue%'";

                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "The product name: " . $row['name'] . '<br>' . "The price: " . $row['price'] . '<br>' . '<br>';
                            }
                        }
                    }