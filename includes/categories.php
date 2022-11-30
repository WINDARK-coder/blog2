            <div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-between">
                    <?php
                    $query = mysqli_query($db, 'SELECT * FROM categories WHERE is_menu=1 and status=1');
                    if (mysqli_num_rows($query) > 0) :
                        while ($row = mysqli_fetch_assoc($query)) : ?>
                            <a class="p-2 link-secondary" href="?catid=<?= $row['id'] ?>"><?= $row['title'] ?></a>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </nav>
            </div>
            </div>