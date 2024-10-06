<?php
// Appliquer la déclaration stricte des types.
declare(strict_types=1);

/*
    Importez le(s) fichier(s) nécessaire(s).
    Lancez la partie en appelant la fonction principale que vous aurez développé dans le fichier 'pendu/app.php'.
*/

require_once 'pendu/app.php';

$mot = choixCategorie();
$motAffiche = str_repeat("_", strlen($mot));
$vie = 6;
$lettresProposees = [];

echo "Vous allez jouer au pendu ! Vous avez $vie vies pour trouver le mot !";

while ($vie > 0 && strpos($motAffiche, "_") !== false) {
    echo "Voilà le mot à deviner : $motAffiche \n
    Voilà les lettres déjà proposées :" . implode('- ', $lettresProposees) . PHP_EOL;
    echo "Il te reste $vie vie(s) ! \n";

    $lettre = readline("Proposez une lettre: ");
    $lettresProposees[] = $lettre;

    if (verifierLettre($lettre, $mot, $motAffiche) == false) {
        $vie--;
    }
}

if (strpos($motAffiche, "_") === false) {
    echo "Féliciation, vous avez trouvé le mot $mot !";
} else {
    echo "Vous avez perdu, le mot était $mot";
}
