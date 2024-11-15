<main>
    <form action="" method="Post" class="formulaireUN">
    <h1>inscription</h1>
    <p><?php echo $message?></p>
        <div id="form">
            <section>
                <label for="nom">Nom</label>
                <input type="text" name="nom"/>
            </section>
            <section>
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom"/>
            </section>
            <section>
                <label for="mail">Mail</label>
                <input type="email" name="mail"/>
            </section>
            <section>
                <label for="mdp">Mot de pass</label>
                <input type="password" name="mdp"/>
            </section>
            <section>
                <label for="verifMdp">Vérification mot de passe</label>
                <input type="password" name="verifMdp"/>
            </section>
            <p class="p_form_ins">vous avez déjà un compte</p>
            <input type="submit" name ="inscription" value="valider"id="valide1"/>
        </div>
    </form>
    <form action="" method="Post" class="formulaireDEUX">
        <h1>connexion</h1>
        <div id="form">
        
            <section>
                <label for="mail">Mail</label>
                <input type="email" name="mail"/>
            </section>
            <section>
                <label for="mdp">Mot de pass</label>
                <input type="password" name="mdp"/>
            </section>
            <p class="p_form_co">je n'ai pas de compte</p>
            <input type="submit" name ="connexion" value="valider"id="valide2"/>
        </div>
    </form>
    
</main>