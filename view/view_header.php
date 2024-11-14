<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style/header.css">
    <link rel="stylesheet" type="text/css" href="./style/footer.css">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <?php echo "<link rel='stylesheet' type='text/css' href='./style/{$style}.css'>"; ?>
    <?php echo "<script src='./script/{$script}.js' defer></script> " ; ?>

    <title>Document</title>
</head>
<body>
    <header>
        <nav id='nav_bar_1'>
            <a id="lien_logo_site" href="/MFS/accueil"><img id="logo_site" src="./image/logo1.png"></a>
            <ul>
                <li><a href="/MFS/accueil">ACCUEIL</a></li>
                <li><a href="/MFS/liste_quiz">LISTE DES QUIZ</a></li>
                <li><a href="/MFS/statistique">STATISTIQUE</a></li>
                <li><a href="/MFS/Connexion_Inscription">Connexion/Inscription</a></li>
            </ul>
            <a id="lien_logo_compte" href="/MFS/compte"><img id="logo_compte" src="./image/icon_login1.png"></a>
        </nav>
        <nav id='nav_bar_2'>
            <ul>
                <li><a href="/MFS/ajout_quiz">AJOUTER UN QUIZ</a></li>
                <li><a href="/MFS/liste_utilisateur"></a>LISTE DES UTILISATEURS</li>
                <li><a href="/MFS/ban_liste">BAN LISTE</a></li>
            </ul>
        </nav>
    </header>
    



