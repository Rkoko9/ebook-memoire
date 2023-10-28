<!-- ======================= Cards ================== -->
<div class="cardBox">
    <div class="card">
        <div>
            <div class="numbers"><?= $params['nbBooksSoumis']->nb ?></div>
            <div class="cardName">Aujourdhui</div>
        </div>
    </div>
    <div class="card">
        <div>
            <div class="numbers"><?= $params['nbBookLecture']->nb ?></div>
            <div class="cardName">Total lectures</div>
        </div>
    </div>
    <div class="card">
        <div>
            <div class="numbers"><?= $params['nbBooks']->nb ?></div>
            <div class="cardName">Livres</div>
        </div>


    </div>

    <div class="card">
        <div>
            <div class="numbers"><?= $params['NbAbonnnements']->nb ?></div>
            <div class="cardName">Abonné(e)s</div>
        </div>


    </div>
</div>

<!-- ================ Order Details List ================= -->
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Les travaux soumis</h2>
            <?php if ($_SESSION['type_user'] === 'Sec Dep' || $_SESSION['type_user'] === 'Bibliothèquaire') : ?>
                <a href="/ebooks" class="btn">Voir plus</a>
            <?php endif; ?>
        </div>

        <table>
            <thead>
                <tr>
                    <td>N°</td>
                    <td>Intitule</td>
                    <td>Depôt</td>
                    <td>Auteur</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($params['NBooks'] as $book) : ?>
                    <tr>
                        <td><?= ++$i; ?></td>
                        <td><?= $book->intitule ?></td>
                        <td><?= $book->dateDepot ?></td>
                        <td><?= $book->nom . ' ' . $book->postnom ?></td>
                        <td><span class="status <?= $book->statut === "Département" ? 'pending' : 'inProgress' ?> "><?= $book->statut ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- ================= New Customers ================ -->
    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Abonnements</h2>
        </div>

        <table>
            <?php
            $i = 0;
            foreach ($params['NAbonnes'] as $abonne) : ?>
                <tr>
                <td>
                        <h4><?= ++$i; ?> </h4>
                    </td>
                    <td>
                        <h4><?= $abonne->nom ?> </h4>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>