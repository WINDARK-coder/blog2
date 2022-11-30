<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Blogs</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <div class="input-group-append">
                                        <a href="index.php?route=blogs/create" class="btn btn-primary float-right">
                                            Create
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Time</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once "../config/config.php";
                                    $database->select("blog", "*");
                                    $result = $database->sql;
                                    $blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    foreach ($blogs as $blog) {
                                    ?>
                                        <tr>
                                            <td><?= $blog['title'] ?></td>
                                            <td><img width="150px" src="./../uploads/<?= $blog['image'] ?>" alt=""></td>
                                            <td><?= $blog['created_at'] ?></td>

                                            <td style="display:flex;column-gap:5px;">
                                                <a href="index.php?route=blogs/edit&id=<?= $blog['id'] ?>" title="Edit" class="btn btn-sm btn-primary pull-right">
                                                    <i class="voyager-paper-plane">Edit</i>
                                                </a>
                                                <a href="index.php?route=blogs/delete&id=<?= $blog['id'] ?>" title="Delete" class="btn btn-sm btn-danger pull-right">
                                                    <i class="voyager-paper-plane">Delete</i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>
</div>