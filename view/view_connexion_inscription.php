<main>
    <form action="" method="Post" class="formulaireUN">
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
                <label for="vérifMdp">Vérification mot de passe</label>
                <input type="password" name="vérifMdp"/>
            </section>
            <p class="p_form_ins">vous avez déjà un compte</p>
            <input type="submit" name ="submit" value="valider"/>
        </div>
    </form>
    <form action="" method="Post" class="formulaireDEUX">
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
            <input type="submit" name ="submit" value="valider"/>
        </div>
    </form>
    <script src="script/Connexion_Inscription.js"></script>
</main>