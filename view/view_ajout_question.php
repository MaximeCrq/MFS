  <main>
    <div id="contenu">
      <h1>Création d’un quiz : Questions</h1>
      <form action="" method="POST">
        <div id="créa_quiz">
            <div id="question_1">
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
              <input type="text" name="reponseMauvaise_1"/>
            </section>
            <section>
              <label for="mauvaise_reponse">Mauvaise réponse</label>
              <input type="text" name="reponseMauvaise_2"/>
            </section>
            <input type="submit" name="ajout_question" id="submit" value="Ajouter la question"/>
            <input type="submit" name="finir_quiz" id="submit" value="Finaliser"/>
          </div>
        </div>
      </form>
      <p><?php echo $quiz->getMessageQuestion() ?></p>
    </div>
  </main>