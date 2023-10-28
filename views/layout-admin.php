<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'fontawesome' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'all.min.css' ?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'dataTables.bootstrap5.min.css' ?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'dash.css' ?>">

    <link rel="shortcut icon" href="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'logo.png' ?>" type="image/x-icon">
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'jquery-3.6.0.min.js' ?>"></script>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="content">
        <div class="navigation">
            <ul>
                <li>
                    <a href="/">
                        <span class="icon">
                            <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'logo.png' ?>" class="logo" alt="" srcset="">
                        </span>
                        <span class="title">E-Book Library</span>
                    </a>
                </li>

                <li>
                    <a href="/dashboard">
                        <span class="icon">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <?php if ($_SESSION['type_user'] === 'Sec Dep') : ?>
                    <li>
                        <a href="/etudiants">
                            <span class="icon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <span class="title">Etudiants</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['type_user'] === 'Bibliothècaire') : ?>
                    <li>
                        <a href="/chercheurs">
                            <span class="icon">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </span>
                            <span class="title">Chercheurs</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['type_user'] === 'Sec Dep' || $_SESSION['type_user'] === 'Bibliothècaire') : ?>
                    <li>
                        <a href="/ebooks">
                            <span class="icon">
                                <i class="fa fa-book" aria-hidden="true"></i>
                            </span>
                            <span class="title">E-Books</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['type_user'] === 'Etudiant') : ?>
                    <li>
                        <a href="/upload">
                            <span class="icon">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                            </span>
                            <span class="title">Upload</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['type_user'] === 'Bibliothècaire') : ?>
                    <li>
                        <a href="/abonnements">
                            <span class="icon">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                            </span>
                            <span class="title">Abonnements</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="/deconnexion">
                        <span class="icon">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <a class="profil" href="/">
                    <?= $_SESSION['login'] ?>
                    <div class="user">
                        <i class="fa fa-user-circle" style="font-size: 2rem;" aria-hidden="true"></i>
                    </div>
                </a>

            </div>

            <?= $content[0] ?>
        </div>
    </div>

    <!-- =========== Scripts =========  -->

    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'jquery.dataTables.min.js' ?>"></script>
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'dataTables.bootstrap5.min.js' ?>"></script>
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'bootstrap.bundle.min.js' ?>"></script>
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'app.js' ?>"></script>

</body>

</html>