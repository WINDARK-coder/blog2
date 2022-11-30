<?php
$query = mysqli_query($db, "SELECT * FROM  admin");
$admins = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://localhost/blog/index.php?route=home.php" class="brand-link">
        <img src="assets/img/newslogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">News Blog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./../uploads/<?= $_SESSION['user']['image'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="http://localhost/blog/backend/index.php?route=admins/edit&id=<?= $_SESSION['user']['id'] ?>" class="d-block"><?= $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <style>
                .dropdown-toggle::after {
                    content: none;
                }
            </style>
            <div class=" dropdown show nav nav-pills nav-sidebar flex-column ">


                <a class="btn btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class=" float-sm-left nav-icon fas fa-tachometer-alt dropdown-header text-light">&nbsp Dashboard</i>

                </a>

                <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuLink">
                    <li class=" nav-item">
                        <a href="index.php?route=admins" class="dropdown-item nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                &nbsp Admins
                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="index.php?route=pages" class="dropdown-item nav-link">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>
                                &nbsp Pages
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?route=blogs" class="dropdown-item nav-link">
                            <i class="nav-icon fas fa-desktop"></i>
                            <p>
                                &nbsp Blog
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?route=categories" class="dropdown-item nav-link">
                            <i class="nav-icon fas fa-list-ul"></i>
                            <p>
                                &nbsp Categories
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?route=settings" class="dropdown-item nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                &nbsp Settings
                            </p>
                        </a>
                    </li>
                </div>
            </div>

        </nav>

</aside>