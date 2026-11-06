<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container my-3">

        <?php foreach($this->messages as $message): ?>
            <div class="alert alert-info">
                <?=  $message ?>
            </div>
        <?php endforeach; ?>
        
        <div class="my-3">
            <!-- ARMAGEDDON -->
            <a href="index.php?action=armageddon" class="btn btn-secondary">💥 BOOM</a>
            <!-- RECHERCHE DE PROVISION -->
             <a href="index.php?action=rechercherProvisions" class="btn btn-secondary">🧺 Rechercher des provisions</a>
        </div>

        <!-- POINTS -->
        <h1 class="my-3"><?= $this->points ?> points</h1>
        <?php if($this->points == 0): ?>
            <a href="index.php?action=nuit" class="btn btn-secondary">😴 Nuit</a>
        <?php else: ?>
            <!-- CREER ANIMAL -->
            <div class="my-3">
                <h2>Créer un animal</h2>
                <form action="index.php" method="get">
                    <input type="hidden" name="action" value="creerAnimal">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="nom" placeholder="Nom de l'animal" class="form-control">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Créer</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>


        <div class="my-3">
            <h2>Mes animaux</h2>

            <div class="row">
                <?php foreach ($this->animaux as $id => $animal): ?>
                    <div class="col-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="my-3">
                                    <?php if (! $animal->estVivant()): ?>
                                        ☠️
                                    <?php endif; ?>
                                    <?= $animal->getNom() ?>
                                </h3>
                                <div><?= $animal->getAge() ?> jour(s)</div>
                                <div class="row my-3">
                                    <div class="col">❤️ <?= $animal->getSante() ?></div>
                                    <div class="col">🤩 <?= $animal->getHumeur() ?></div>
                                    <div class="col">🍽️ <?= $animal->getFaim() ?></div>
                                    <div class="col">💧 <?= $animal->getSoif() ?></div>
                                </div>
                                <?php if($animal->estVivant()): ?>
                                    <div class="row my-3 justify-content-between">
                                        <?php if($this->points >= 3): ?>
                                            <div class="col-auto">
                                                <a href="index.php?action=soignerAnimal&id=<?= $id ?>" class="btn btn-outline-secondary">Soigner</a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($this->points >= 3): ?>
                                            <div class="col-auto">
                                                <a href="index.php?action=caresserAnimal&id=<?= $id ?>" class="btn btn-outline-secondary">Caresser</a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($this->points >= 1): ?>
                                            <div class="col-auto">
                                                <form action="index.php" method="get">
                                                    <input type="hidden" name="action" value="nourrirAnimal">
                                                    <input type="hidden" name="id" value="<?= $id ?>">
                                                    <div class="row">
                                                        <div class="col">
                                                            <select name="idProvision" class="form-control">
                                                                <?php foreach($this->provisions as $idProvision => $provision): ?>
                                                                    <option value="<?= $idProvision ?>"><?= $provision->getNom() ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <button type="submit" class="btn btn-outline-secondary">Nourrir</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


            <div class="my-3">
            <h2>Mes provisions</h2>

            <div class="row">
                <?php foreach ($this->provisions as $id => $provision): ?>
                    <div class="col-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h4>
                                    <?= $provision->getNom() ?>
                                </h4>
                                <div class="row">
                                    <?php if($provision->getImpactSante() != 0): ?>
                                        <div class="col">❤️ <?= $provision->getImpactSante() ?></div>
                                    <?php endif; ?>
                                    <?php if($provision->getImpactHumeur() != 0): ?>
                                        <div class="col">🤩 <?= $provision->getImpactHumeur() ?></div>
                                    <?php endif; ?>
                                    <?php if($provision->getImpactFaim() != 0): ?>
                                        <div class="col">🍽️ <?= $provision->getImpactFaim() ?></div>
                                    <?php endif; ?>
                                    <?php if($provision->getImpactSoif() != 0): ?>
                                        <div class="col">💧 <?= $provision->getImpactSoif() ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>