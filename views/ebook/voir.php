<section class="bg-white">
    <h6>Description détaillé</h6>
    <div class="card detail flex-sm-row">
        <img src="<?= SCRIPTS . ($params["ebook"]->mignature ? 'upload/mignature' . DIRECTORY_SEPARATOR .$params["ebook"]->mignature : 'img' . DIRECTORY_SEPARATOR . 'e-book.png') ?>" class="card-img-top" alt="<?= $params["ebook"]->mignature ?>" style="width: 300px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title text-center"> <?= $params["ebook"]->intitule ?> </h5>
            <ul>
                <li class="text-primary"> <i class="fa fa-user" aria-hidden="true"></i>  Auteur : <span><?=$params["ebook"]->getNoms()  ?></span></li>
                <li class="text-muted">  <i class="fa fa-calendar" aria-hidden="true"></i> Publier le <span><?= $params["ebook"]->getDate() ?></span></li>
            </ul>
            <hr>
            <p class="card-text">
                <?= $params["ebook"]->description ?>
            </p>
            <hr>
           <p class="text-success"><i class="fa fa-check-circle mx-1" aria-hidden="true"></i>eBook</p>
            <a href="<?= SCRIPTS.'upload/eBook/'. $params["ebook"]->piecejointe ?>" title="<?= $params["ebook"]->intitule ?>" id="dowload" class="btn btn-info">Télecharger le livre</a>
            <a href="<?= $params["ebook"]->url_github?>" title="<?= $params["ebook"]->url_github ?>" id="dowload" class="btn btn-primary">Voir le projet</a>
            <?php if ($params["ebook"]->statut==="Département"): ?>
            <form action="/ebooks/change-statut/<?= $params["ebook"]->id ?>" method="post" class="pt-2">
                <input type="submit" value="enoyer à la bibliothèque" class="btn btn-outline-primary">
            </form>
            <?php endif; ?>
        </div>
    </div>
</section>