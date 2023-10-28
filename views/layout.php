<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'fontawesome' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'all.min.css' ?>">
  <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'dataTables.bootstrap5.min.css' ?>">
  <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
  <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'jquery-3.6.0.min.js' ?>"></script>
  <link rel="shortcut icon" href="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'logo.png' ?>" type="image/x-icon">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-sticky">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'logo.png' ?>" alt="logo" class="logo" srcset="" /> E-Book
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mb-2 ms-auto mb-lg-0">
          <li class="nav-item">
            <?php if (isset($_SESSION['login'])) :
              if (isset($_SESSION['type_user']) && $_SESSION['type_user'] === "Etudiant" || isset($_SESSION['type_user']) && $_SESSION['type_user'] === "Sec Dep" || $_SESSION['type_user'] === "Bibliothècaire") :
            ?>
                <a class="nav-link" href="/dashboard"> <i class="fa fa-user-circle" aria-hidden="true"></i> <?= $_SESSION['login'] ?></a>
              <?php else : ?>
                <div class="dropdown open">
                  <div class="dropdown open">
                    <button class="btn dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa fa-user" aria-hidden="true"></i> <?= $_SESSION['login'] ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                      <span class="dropdown-item disabled"> <i class="fa fa-user-circle" aria-hidden="true"></i> <?= $_SESSION['login'] ?></span>
                      <a href="/deconnexion" class="dropdown-item text-center">Deconnexion</a>
                    </div>
                  </div>
                <?php endif; ?>
              <?php else : ?>
                <a class="nav-link" href="/connexion"> <i class="fa fa-user-circle" aria-hidden="true"></i> Connexion</a>
              <?php endif; ?>

          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main>

    <?= $content[0] ?>
  </main>
  
  <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'jquery.dataTables.min.js' ?>"></script>
  <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'dataTables.bootstrap5.min.js' ?>"></script>
  <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'bootstrap.bundle.min.js' ?>"></script>
  <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'app.js' ?>"></script>
</body>

</html>