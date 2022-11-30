<footer class="blog-footer">
  <div class="d-flex justify-content-around">
    <?php
    $query = mysqli_query($db, "SELECT * FROM settings");
    if (mysqli_num_rows($query) > 0) :
      while ($row = mysqli_fetch_assoc($query)) : ?>
        <a class="link-secondary" href="#"><?= $row['_key'] . ': ' . $row['value'] ?></a>
    <?php
      endwhile;
    endif;
    ?>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>