
  <main>
    <div id="contenu">
      <h1>Création d’un quiz</h1>
      <form action="" method="POST">
        <div id="créa_quiz">
          <select name="theme" id="theme">
            <option value="PHP">PHP</option>
            <option value="JS">JS</option>
            <option value="MCD">MCD</option>
            <option value="MLD">MLD</option>
            <option value="HTMLetCSS">HTML et CSS</option>
          </select>
          <section>
            <label for="titre">Titre</label>
            <input type="text" name="titre"/>
          </section>
          <section>
            <label for="description">Description</label>
            <input type="text" name="description"/>
          </section>
          <section>
            <div id="image_quiz">
                <div id="logo">
                    <img src="./image/logo_noir.png">
                </div>
            </div>
            <input type="submit" name="logo" class="modifier_quiz" value="Modifier image"/>
        </section>
          <input type="button" name="submit" id="submit" onclick="document.location.href='ajout_quiz_question';" value="Suivant"/>
        </div>
      </form>
    </div>
  </main>


