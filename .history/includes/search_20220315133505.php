<form class="d-flex" action="" method="post">
                        <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
                    </form>

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