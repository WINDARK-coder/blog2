<main class="container">
    <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
        <div class="col-md-6 px-0">
            <?php
            $query = mysqli_query($db, 'SELECT * FROM blog WHERE is_monset=1 and status=1 LIMIT 1');
            if (mysqli_num_rows($query) > 0) :
                while ($row = mysqli_fetch_assoc($query)) : ?>
                    <h1 class="display-4 fst-italic"><?= $row['title'] ?></h1>
                    <p class="lead my-3"><?= substr($row["content"], 0, 100); ?>...</p>
                    <p class="lead mb-0"><a href="?route=single&id=<?= $row['id'] ?>" class="text-white fw-bold">Continue reading...</a></p>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>