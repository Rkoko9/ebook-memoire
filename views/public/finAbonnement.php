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
        <h2 class="text-center">Fin d'abonnement</h2>
        <div class="display-4 text-center fw-bold">Oops Nous sommes désolé votre abonnement a pris fin</div>
        <div class="display-5 text-center">Veillez souscrire à un autre abonnement pour consulter nos livres</div>
    </section>
<?php endif; ?>