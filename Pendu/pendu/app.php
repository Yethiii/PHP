<?php
/*
    Fonction principale du jeu du pendu...

    N'hésitez pas à utiliser d'autres fichiers avec les outils d'importation appropriés.

    Il se peut que vous ayez besoin d'utiliser des fonctions prédéfinies que nous n'avons pas vues.

    Voici quelques fonctions dont vous pourriez avoir besoin : 
        array_rand() : permet de sélectionner une clé de tableau aléatoirement.
        array_search() : permet de vérifier si une valeur existe dans un tableau.
        isset() : permet de vérifier si un élément existe.
        strlen() : permet de connaître le nombre de caractères présent dans une chaîne.
        strpos() : permet de savoir si un caractère est présent dans une chaîne.
        ctype_lower() : permet de vérifie qu'une chaîne est en minuscules.
        str_repeat() : permet de répéter un nombre défini de fois un même caractère.
        range() : permet de génèrer une séquence de nombres ou de caractères sous forme de tableau.

    https://www.php.net/manual/fr/

*/
// Choix de la catégorie

function choixCategorie()
{
    do {
        $categorie = readline("Choisissez la catégorie que vous voulez : 1 = Nourriture // 2 = Animaux // 3 = Profession // 4 = Sciences // 5 = Catégorie aléatoire ");

        switch ($categorie) {
            case 1:
                return motAleatoire("nourriture");
            case 2:
                return motAleatoire("animaux");
            case 3:
                return motAleatoire("professions");
            case 4:
                return motAleatoire("sciences");
            case 5:
                return motAleatoire("4");
            default:
                echo "Mauvais choix !" . PHP_EOL;
        }
    } while (true);
}


// Choix du mot de manière aléatoire dans le fichier Json ! 
function motAleatoire($aleatoire)
{
    $cheminJson = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'dictionnaire.json';
    $contenuJson = file_get_contents($cheminJson);
    $decodeJson = json_decode($contenuJson, true);
    $cleAleatoire1 = array_rand($decodeJson);
    $cleAleatoire2 = array_rand($decodeJson[$cleAleatoire1]);

    if ($aleatoire == "4") {
        return $decodeJson[$cleAleatoire1][$cleAleatoire2];
    } else {
        return $decodeJson[$aleatoire][$cleAleatoire2];
    }
}


// Vérifier si la lettre est dans le mot aléatoire
function verifierLettre($lettre, $mot, &$motAffiche)

{
    $lettre = strtolower($lettre);
    $tableaumot = str_split($mot);
    $trouve = false;

    foreach ($tableaumot as $i => $caractere) {
        if ($caractere === $lettre) {
            $motAffiche[$i] = $lettre;
            $trouve = true;
        }
    }
    return $trouve;
}
