
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
            <label for="question">Question</label>
            <input type="text" name="questionPose"/>
          </section>
          <section>
            <label for="bonne_reponse">Bonne réponse</label>
            <input type="text" name="reponseBonne"/>
          </section>
          <section>
            <label for="mauvaise_reponse">Mauvaise réponse</label>
            <input type="text" name="reponseMauvaise"/>
          </section>
          <section>
            <label for="mauvaise_reponse">Mauvaise réponse</label>
            <input type="text" name="reponseMauvaise"/>
          </section>
          <input type="submit" name="submit" id="submit" value="CRÉER"/>
        </div>
      </form>
    </div>
  </main>


