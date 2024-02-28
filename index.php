<?php
    require_once("templates/header.php");

    require_once("dao/MovieDAO.php");

    // DAO dos filmes

    $movieDAO = new MovieDAO($conn, $BASE_URL);

    $latestMovies = $movieDAO->getLatestMovies();
    $actionMovies = [];
    $comedyMovies = [];
?>

<div id="main-container" class="container-fluid">
    <h2 id="section-title">Filmes Novos</h2>
    <p class="section-description">Veja as críticas dos últimos filmes adicionados no MovieStar</p>

    <div class="movies-container">
        <?php foreach($latestMovies as $movie): ?>
            <?php require("templates/movie_card.php"); ?>
        <?php endforeach; ?>
    </div>
    <div class="movies-container">
    </div>
    <h2 id="section-title">Ação</h2>
    <p class="section-description">Veja os melhores filmes de ação</p>

    <div class="movies-container"></div>
    <h2 id="section-title">Comédia</h2>
    <p class="section-description">Veja os melhores filmes de comédia</p>

</div>

<?php
    require_once("templates/footer.php");
?>

