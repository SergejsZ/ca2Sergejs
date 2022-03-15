<!-- the head section -->
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


<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Phone Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="add_record_form.php">Add Record</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category_list.php">Manage Categories</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
          <?php foreach ($categories as $category) : ?>
          <li><a class="dropdown-list" href=".?category_id=<?php echo $category['categoryID']; ?>">
              <?php echo $category['categoryName']; ?>
            </a>
          </li>
        <?php endforeach; ?>
          </ul>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link disabled">Link</a>
        </li> -->

      </ul>
      <form class="d-flex" action="" method="post">
                        <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
                    </form>

                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
                      
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">Offcanvas</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

</div>
<div class ="display_search">
                    <?php
                    if (isset($_POST['submit'])) {
                        $searchValue = $_POST['search'];
                        $con = new mysqli("localhost", "root", "", "ca2_sergejs");
                        if ($con->connect_error) {
                            echo "connection Failed: " . $con->connect_error;
                        } else {
                            $sql = "SELECT * FROM records WHERE price LIKE '%$searchValue%' OR name LIKE '%$searchValue%'";

                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "The product name: " . $row['name'] . '<br>' . "The price: " . $row['price'] . '<br>' . '<br>';
                                
                            }
                        }
                    }
                    ?>
    
    </div>
      
    
    </div>
  </div>
</nav>

<body>


