<section class="container">
    <h3>Importer votre travail</h3>
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="/">Dashboard</a>
        <a class="breadcrumb-item" href="/ebooks">E-Books</a>
        <span class="breadcrumb-item active" aria-current="page">Upload</span>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <i class="fa fa-upload text-primary text-center pt-2" aria-hidden="true" style="font-size: 4rem;"></i>
                <div class="card-body">
                    <form class="row g-2" method="post" enctype="multipart/form-data">
                        <h4 class="card-title text-center fw-bold">Information sur le travail</h4>
                        <div class="col-md-12">
                            <label for="intitule">Titre</label>
                            <input type="text" id="intitule" name="intitule" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="mignature">Mignature</label>
                            <input type="file" accept="images/*" id="mignature" name="mignature" class="form-control">

                        </div>
                        <div class="col-md-6">
                            <label for="piecejointe">Fichier</label>
                            <input type="file" accept="application/*" name="piecejointe" id="piecejointe" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="url_github">URL Github du Projet</label>
                            <input type="text" name="url_github" class="form-control" id="url_github">
                        </div>
                        <?php
                        if (isset($params['errors'])) : ?>
                            <?php foreach ($params['errors'] as $errors) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        <?php foreach ($errors as $error) : ?>
                                            <li> <?= $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <input type="submit" class="btn btn-primary" value="Uploader">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>