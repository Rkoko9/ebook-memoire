<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virgile Resto | Inscription</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'fontawesome' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'all.min.css' ?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'jquery-3.6.0.min.js' ?>"></script>
</head>

<body>
    <div class="row vh-100 justify-content-center">
        <div class="col-lg-5 col-sm-7 col-11">
            <div class="head text-center">
                <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'logo.png' ?>" class="logo" alt="" srcset="">
                <div class="display-6 mb-3">E-Book Library</div>
            </div>
            <div class="card card-body p-4">
                <h2 class="mb-3">S'inscrire</h2>
                <form action="/creer-compte" method="post" class="needs-validation row g-2" novalidate>
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
                    <div class="col-6">
                        <label for="login" class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" placeholder="Entrez votre Nom" required>
                        <div class="invalid-feedback">
                            Entrez votre Nom
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="login" class="form-label">Postnom</label>
                        <input type="text" name="postnom" class="form-control" placeholder="Entrez votre Postnom" required>
                        <div class="invalid-feedback">
                            Entrez votre postnom
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="login" class="form-label">Prenom</label>
                        <input type="text" name="prenom" class="form-control" placeholder="Entrez votre Prenom">
                    </div>
                    <div class="col-6">
                        <label for="login" class="form-label">Sexe</label>
                        <select name="sexe" id="sexe" class="form-select" required>
                            <option selected disabled>Sélectionnez votre sexe</option>
                            <option value="M">Masculin</option>
                            <option value="F">Feminin</option>
                        </select>
                        <div class="invalid-feedback">
                            Sélectionnez votre sexe
                        </div>
                    </div>
                    <label for="login" class="form-label">Pseudo</label>
                    <input type="text" name="login" class="form-control" placeholder="Entrez votre Pseudo" required>
                    <div class="invalid-feedback">
                        Entrez votre Pseudo
                    </div>
                    <div class="col-6">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" placeholder="mot de passe" required>
                        <div class="invalid-feedback">
                            Entrez un mot de passe
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="password" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" name="password2" class="form-control" placeholder="retapez le mot de passe" required>
                        <div class="invalid-feedback">
                            Entrez un mot de passe
                        </div>
                    </div>
                    <input type="submit" value="S'Inscrire" class="btn btn-primary">
                </form>

                <p class="mt-3">Voulez-vous un Compte ? <a href="/connexion">Se Connecter</a> </p>
            </div>
        </div>
    </div>

    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'jquery.dataTables.min.js' ?>"></script>
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'dataTables.bootstrap5.min.js' ?>"></script>
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'chart.3.6.0.min.js' ?>"></script>
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'app.js' ?>"></script>
</body>

</html>