 <footer class="text-center text-white" style="background-color: #caced1;">

  <div class="container p-4">

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:

  </div>
  <!-- Copyright -->
</footer>
</div><!-- close div container -->
</body>
</html> -->         <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
          <?php foreach ($categories as $category) : ?>
          <li><a class="dropdown-list" href=".?category_id=<?php echo $category['categoryID']; ?>">
              <?php echo $category['categoryName']; ?>
            </a>
          </li>
        <?php endforeach; ?>
          </ul>