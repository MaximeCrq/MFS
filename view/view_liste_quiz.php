<main>
    <h1>liste quiz</h1>
    <input type="text" placeholder="Recherchez un quiz">
    <div id="contenu"></div>
        <ul>
            <?php echo $quiz->getListeQuiz() ?>
        </ul>
</main>