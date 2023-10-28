<section class="container">
    <h3>Liste des Chercheurs</h3>
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="/">Dashboard</a>
        <a class="breadcrumb-item" href="/chercheurs">Chercheurs</a>
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
                    <th>Nom</th>
                    <th>Postnom</th>
                    <th>Prenom</th>
                    <th>Sexe</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($params['chercheurs'] as $chercheur) : ?>
                    <tr>
                        <td><?= $chercheur->id ?></td>
                        <td><?= $chercheur->nom ?></td>
                        <td><?= $chercheur->postnom ?></td>
                        <td><?= $chercheur->prenom ?></td>
                        <td><?= $chercheur->sexe ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>