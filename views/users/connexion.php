<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eBook Library | Connexion</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'fontawesome' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'all.min.css' ?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
  <link rel="shortcut icon" href="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'logo.png' ?>" type="image/x-icon">   
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'jquery-3.6.0.min.js' ?>"></script>
</head>

<body>
    <div class="row vh-100 justify-content-center mt-3">
        <div class="col-lg-4 col-sm-6 col-10">
            <div class="head text-center">
                <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'logo.png' ?>" class="logo" alt="" srcset="">
                <div class="display-6 mb-3">E-Book Library</div>
            </div>
            <div class="card card-body p-4">
                <h2 class="mb-3">Se connecter</h2>
                <form method="post" class="row g-2">
                    <label for="login" class="form-label">Pseudo</label>
                    <input type="text" name="login" class="form-control" placeholder="Pseudo">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="mot de passe">
                    <?php
                    if (isset($_SESSION["errors"])) : ?>
                        <?php foreach ($_SESSION["errors"] as $errors) : ?>
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    <?php foreach ($errors as $error) : ?>
                                        <li> <?= $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <input type="submit" value="Connexion" class="btn btn-primary">
                </form>
                <p class="mt-3">Voulez-vous créer un Compte ? <a href="/creer-compte">Créer un compte</a> </p>
            </div>
        </div>

        <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'jquery.dataTables.min.js' ?>"></script>
        <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'dataTables.bootstrap5.min.js' ?>"></script>
        <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'chart.3.6.0.min.js' ?>"></script>
        <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'app.js' ?>"></script>
</body>

</html>