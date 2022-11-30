<div class="row mb-2">
  <?php 
  $sql = 'SELECT b.*, c.title as cattitle FROM `blog` b
  LEFT JOIN categories c ON c.id=b.cat_id 
  WHERE b.status=1 and b.is_monset!=1
  ORDER BY b.id DESC LIMIT 2';

  $query = mysqli_query($db, $sql);
  if (mysqli_num_rows($query) > 0):
    while($row=mysqli_fetch_assoc($query)):?>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary"><?=substr($row["cattitle"],0,30);?></strong>
            <h3 class="mb-0"><?=substr($row["title"],0,30);?></h3>
            <div class="mb-1 text-muted"><?=date("Y-m-d", strtotime($row['created_at']))?></div>
            <p class="card-text mb-auto"><?=substr($row["content"],0,190);?>...</p>
            <a href="?route=single&id=<?=$row['id']?>" class="stretched-link">Continue reading</a>
          </div>
        </div>
      </div>
      <?php 
    endwhile;
  endif;
  ?>
</div>