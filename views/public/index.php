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

            <?php
            if ($params['books']) :
                foreach ($params['books'] as $book) : ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="<?= SCRIPTS . ($book->mignature ? 'upload/mignature' . DIRECTORY_SEPARATOR . $book->mignature : 'img' . DIRECTORY_SEPARATOR . 'e-book.png') ?>" class="card-img-top" alt="<?= $book->mignature ?>">
                            <div class="card-body">
                                <a href="/detail/<?= $book->id ?>">
                                    <h5 class="card-title"><?= $book->intitule ?></h5>
                                </a>
                                <h6 class="card-subtitle mb-2 text-muted "><?= $book->getNoms() ?></h6>
                                <p class="card-text"><?= $book->getDescription() ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            else : ?>
                <div class="display-5 fw-bold text-center pt-5">
                    Aucun Livre n'est disponible
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>