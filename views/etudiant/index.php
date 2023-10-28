<section class="container">
    <h3>Liste des Etudiants</h3>
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="/">Dashboard</a>
        <a class="breadcrumb-item" href="/etudiants">Etudiants</a>
        <span class="breadcrumb-item active" aria-current="page">Liste</span>
    </nav>
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
    <div class="d-flex justify-content-end p-2"><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-etudiant">Ajouter</button></div>
    <div class="table-responsive-sm">
        <table id="data" class="table table-striped
    table-hover	
    table-borderless
    align-middle" style="width:100%">
            <thead class="table-light">
                <tr>
                    <th>N°</th>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Postnom</th>
                    <th>Prenom</th>
                    <th>Sexe</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $i = 1;
                foreach ($params['etudiants'] as $etudiant) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $etudiant->matricule ?></td>
                        <td><?= $etudiant->nom ?></td>
                        <td><?= $etudiant->postnom ?></td>
                        <td><?= $etudiant->prenom ?></td>
                        <td><?= $etudiant->sexe ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modal-etudiant" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Enregistrer un étudiant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <select name="id" id="idChercheur" class="form-select">
                            <option disabled selected>Sélectionnez l'etudiant(e)</option>
                            <?php
                            foreach ($params['chercheurs'] as $chercheur) : ?>
                                <option value="<?= $chercheur->id ?>"><?= $chercheur->nom ?> <?= $chercheur->postnom ?> <?= $chercheur->prenom ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="col-md-6">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="postnom">Postnom</label>
                            <input type="text" class="form-control" name="postnom" id="postnom" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="prenom">Prenom</label>
                            <input type="text" class="form-control" name="prenom" id="prenom" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="sexe">Sexe</label>
                            <input type="text" class="form-control" name="sexe" id="sexe" disabled>
                        </div>
                        <div class="col-md-12">
                            <label for="matricule">Matricule</label>
                            <input type="text" class="form-control" name="matricule" id="matricule" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const myModal = new bootstrap.Modal(document.getElementById('modal-etudiant'), options)
</script>