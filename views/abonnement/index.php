<section class="container">
    <h3>Liste des Abonnements</h3>
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="/">Dashboard</a>
        <a class="breadcrumb-item" href="/chercheurs">Abonnement</a>
        <span class="breadcrumb-item active" aria-current="page">Liste</span>
    </nav>
    <div class="d-flex justify-content-end p-2"><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-abonnement">Ajouter</button></div>
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
                    <th>Du</th>
                    <th>Au</th>
                    <th>/</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $i = 0;
                foreach ($params['abonnements'] as $abonnement) : ?>
                    <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $abonnement->nom ?></td>
                        <td><?= $abonnement->postnom ?></td>
                        <td><?= $abonnement->prenom ?></td>
                        <td><?= $abonnement->sexe ?></td>
                        <td><?= $abonnement->dateDebut ?></td>
                        <td><?= $abonnement->dateFin ?></td>
                        <td><a href="/modifier/<?= $abonnement->id ?>" data-bs-toggle="modal" data-bs-target="#modal-abonnement-edit" class="btn btn-sm btn-info edit">Modifier</a>
                            <a href="/supprimer/<?= $abonnement->id ?>" data-bs-toggle="modal" data-bs-target="#modal-abonnement-delete" class="btn btn-sm btn-danger delete">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="modal-abonnement" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Enregistrer un abonnement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-2">
                            <select name="idChercheur" id="idChercheur" class="form-select">
                                <option disabled selected>Sélectionnez un chercheur</option>
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
                            <div class="col-md-6">
                                <label for="dateDebut">Du</label>
                                <input type="date" class="form-control" name="dateDebut" id="dateDebut">
                            </div>
                            <div class="col-md-6">
                                <label for="dateFin">Au</label>
                                <input type="date" class="form-control" name="dateFin" id="dateFin">
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
    <div class="modal fade" id="modal-abonnement-edit" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <form id="edit" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Modification sur l'abonnement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-2">
                            <select name="idChercheur" id="idChercheur-edit" class="form-select">
                                <option disabled selected>Sélectionnez un chercheur</option>
                                <?php
                                foreach ($params['chercheurs'] as $chercheur) : ?>
                                    <option value="<?= $chercheur->id ?>"><?= $chercheur->nom ?> <?= $chercheur->postnom ?> <?= $chercheur->prenom ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="col-md-6">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom-edit" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="postnom">Postnom</label>
                                <input type="text" class="form-control" name="postnom" id="postnom-edit" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="prenom">Prenom</label>
                                <input type="text" class="form-control" name="prenom" id="prenom-edit" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="sexe">Sexe</label>
                                <input type="text" class="form-control" name="sexe" id="sexe-edit" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="dateDebut">Du</label>
                                <input type="date" class="form-control" name="dateDebut" id="dateDebut-edit">
                            </div>
                            <div class="col-md-6">
                                <label for="dateFin">Au</label>
                                <input type="date" class="form-control" name="dateFin" id="dateFin-edit">
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
    <div class="modal fade" id="modal-abonnement-delete" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <form id="delete" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Suppression d'abonnement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Voulez vous vraiment supprimer l'abonnement de <span id="chercheur" class="fw-bold text-primary"></span> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Annuler (Non)</button>
                        <button type="submit" class="btn btn-danger">Supprimer (Oui)</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>