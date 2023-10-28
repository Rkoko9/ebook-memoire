<section class="container">
    <h3>Liste des E-Books</h3>
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="/">Dashboard</a>
        <a class="breadcrumb-item" href="/ebooks">E-Books</a>
        <span class="breadcrumb-item active" aria-current="page">Liste</span>
    </nav>
    <div class="table-responsive-sm">
        <table id="data" class="table table-striped
    table-hover	
    table-borderless
    align-middle" style="width:100%">
            <thead class="table-light">
                <tr>
                    <th>N°</th>
                    <th>Intitule</th>
                    <th>Description</th>
                    <th>Depot</th>
                    <th>Mignature</th>
                    <th>Projets</th>
                    <th>Fichier</th>
                    <th>Vues</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $i = 1;
                foreach ($params['ebooks'] as $ebook) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $ebook->intitule ?></td>
                        <td><?= $ebook->getDescription() ?></td>
                        <td><?= $ebook->dateDepot ?></td>
                        <td><?= $ebook->mignature ?></td>
                        <td><a href="<?= $ebook->url_github ?>">Projet</a></td>
                        <td><?= $ebook->piecejointe ?></td>
                        <td><?= $ebook->nbVue ?></td>
                        <td> <a href="ebooks/voir/<?= $ebook->id ?>" class="btn btn-sm btn-primary">voir</a> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>