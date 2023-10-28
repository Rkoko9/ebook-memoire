<section class="hero">
    <div class="content">
        <h1 class="align-center">E-Book Library</h1>
        <form method="get">
            <input type="search" class="form-control w-100 search" name="q" id="q">
            <button type="submit" class="d-flex align-items-center btn btn-outline-light search"> <i class="fa fa-search mx-2" aria-hidden="true"> </i> Recherche</button>
        </form>
</section>
<?php if (isset($_SESSION['type_user'])) : ?>
    <section id="E-Book">
        <h4>Notre collection</h4>
        <div class="row g-2 justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'e-book.png' ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="/detail/1">
                            <h5 class="card-title">Virgile resto</h5>
                        </a>
                        <h6 class="card-subtitle mb-2 text-muted ">Virgile</h6>
                        <p class="card-text">Mise place d'une plate forme d'e-commerce cas d'un restaurant x</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'e-book.png' ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="/detail/1">
                            <h5 class="card-title">Virgile resto</h5>
                        </a>
                        <h6 class="card-subtitle mb-2 text-muted ">Virgile</h6>
                        <p class="card-text">Mise place d'une plate forme d'e-commerce cas d'un restaurant x</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'e-book.png' ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="/detail/1">
                            <h5 class="card-title">Virgile resto</h5>
                        </a>
                        <h6 class="card-subtitle mb-2 text-muted ">Virgile</h6>
                        <p class="card-text">Mise place d'une plate forme d'e-commerce cas d'un restaurant x</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'e-book.png' ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="/detail/1">
                            <h5 class="card-title">Virgile resto</h5>
                        </a>
                        <h6 class="card-subtitle mb-2 text-muted ">Virgile</h6>
                        <p class="card-text">Mise place d'une plate forme d'e-commerce cas d'un restaurant x</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php endif; ?>