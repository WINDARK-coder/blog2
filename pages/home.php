<?php
include 'includes/slide.php';
include 'includes/last_posts.php';

if (isset($_GET['catid']) && is_numeric($_GET['catid'])) {

  $catid = ceil($_GET['catid']);
  $category = true;
  $sehifeLink = 'catid=' . $catid . '&';
  $sql = "SELECT * FROM `blog` WHERE status=1 and cat_id=$catid";
} else {
  $category = false;
  $sehifeLink = "";
  $sql = "SELECT * FROM `blog` WHERE status=1";
}

$Limit = 4;                                          // Bir səhifədə olacaq xəbər sayı

include "pagination_head.php";
?>

<hr>
<div class="row mb-2">
  <?php



  if ($category) {

    $sql = "SELECT b.*, c.title as cattitle FROM `blog` b
    LEFT JOIN categories c ON c.id=b.cat_id
    WHERE b.status=1 and b.cat_id=$catid
    ORDER BY b.id DESC
    limit $goster,$Limit";
  } else {

    $sql = "SELECT b.*, c.title as cattitle FROM `blog` b
    LEFT JOIN categories c ON c.id=b.cat_id
    WHERE b.status=1
    ORDER BY b.id DESC 
    limit $goster, $Limit";
  }

  $query = mysqli_query($db, $sql);
  if (mysqli_num_rows($query) > 0) :
    while ($row = mysqli_fetch_assoc($query)) : ?>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success"><?= substr($row["cattitle"], 0, 20); ?></strong>
            <h3 class="mb-0"><?= substr($row["title"], 0, 20); ?></h3>
            <div class="mb-1 text-muted"><?= date("Y-m-d", strtotime($row['created_at'])) ?></div>
            <p class="mb-auto"><?= substr($row["content"], 0, 100); ?>...</p>
            <a href="?route=single&id=<?= $row['id'] ?>" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="uploads/<?= $row['image'] ?>" alt="" width="210" height="250">
          </div>
        </div>
      </div>
  <?php
    endwhile;
  endif;

  include 'pagination.php';
  ?>
</div>
<!--  test hissesi-->
</main>