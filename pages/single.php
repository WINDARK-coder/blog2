<main id="main">

    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <?php

                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            $id = $_GET['id'];

                            $mysql = "SELECT b.*, c.title as cattitle FROM `blog` b
              LEFT JOIN categories c ON c.id=b.cat_id 
              WHERE b.id=$id and b.status=1";

                            $query = mysqli_query($db, $mysql);

                            if (mysqli_num_rows($query) > 0) {
                                $blog = mysqli_fetch_array($query, MYSQLI_ASSOC); ?>

                                <div class="post-meta"><span class="date"><?= $blog['cattitle'] ?></span> <span class="mx-1">&bullet;</span> <span><?= date("Y-m-d", strtotime($blog['created_at'])) ?></span></div>
                                <h1 class="mb-5"><?= $blog['title'] ?></h1>
                                <video src=""></video>
                                <iframe width="420" height="315" src="<?= $blog['video'] ?>?autoplay=1&mute=1">
                                </iframe>
                                <div class=" text-center">
                                    <figure class="my-4 ">
                                        <img src="uploads/<?= $blog['image'] ?>" width="80%" alt="" class="img-fluid">
                                    </figure><br>
                                </div><br>
                                <p><?= $blog["description"] ?></p><br>


                                <p><?= $blog["content"] ?></p>
                        <?php
                            }
                        }
                        ?>
                    </div><!-- End Single Post Content -->

                </div>
                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    <div class="aside-block">


                        <div class="tab-content" id="pills-tabContent">

                            <!-- Last 5 posts -->

                            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                                <?php
                                $sql = 'SELECT b.*, c.title as cattitle FROM `blog` b
                  LEFT JOIN categories c ON c.id=b.cat_id 
                  WHERE b.status=1 
                  ORDER BY b.id DESC LIMIT 5';

                                $query = mysqli_query($db, $sql);
                                if (mysqli_num_rows($query) > 0) :
                                    while ($row = mysqli_fetch_assoc($query)) : ?>
                                        <div class="post-entry-1 border-bottom">
                                            <div class="post-meta"><span class="date"><?= $row["cattitle"] ?></span> <span class="mx-1">&bullet;</span> <span><?= date("Y-m-d", strtotime($row['created_at'])) ?></span></div>
                                            <h2 class="mb-2"><a href="?route=single&id=<?= $row['id'] ?>"><?= $row["title"] ?></a></h2>
                                        </div>
                                <?php
                                    endwhile;
                                endif;
                                ?>
                            </div> <!-- End Last 5 posts -->
                        </div>
                    </div>
                    <div class="aside-block">
                        <h3 class="aside-title">Categories</h3>
                        <ul class="aside-links list-unstyled">
                            <?php
                            $query = mysqli_query($db, "SELECT * FROM categories WHERE status=1");
                            if (mysqli_num_rows($query) > 0) :
                                while ($row = mysqli_fetch_assoc($query)) : ?>
                                    <li><a href="index.php?catid=<?= $row['id'] ?>"><i class="bi bi-chevron-right"></i> <?= $row['title'] ?></a></li>
                            <?php
                                endwhile;
                            endif;
                            ?>
                        </ul>
                    </div><!-- End Categories -->
                </div>
            </div>
        </div>
    </section>
</main>