<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_film.css" />
        <title>Info Film</title>
    </head>
    
    <?php
        function getBlock($file, $data = [])
        {
            require $file;
        }       
    ?>

    <?php
        $link = mysqli_connect('localhost', 'root')
                or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
            mysqli_select_db($link, 'film_bd')
                or die ('Erreur de sélection de la BD : ' . mysqli_error($link));
            mysqli_set_charset($link, 'utf8');
    ?>

    <?php
    /*Tableau des acteurs*/
    $id_movie = $_GET['id'];
    $query = 'SELECT * FROM movie JOIN moviehasperson ON movie.id=moviehasperson.idMovie JOIN person ON moviehasperson.idPerson = person.id JOIN personhaspicture ON person.id = personhaspicture.idPerson JOIN picture ON personhaspicture.idPicture = picture.id WHERE role = "actor" AND idMovie="'.$id_movie.'"';
    $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
    /*mysqli_stmt_bind_param($stmt, "i") // type: i, d, s or b
        or die('Échec de paramétrage de la requête : ' . mysqli_error($link));*/
    mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));

    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) != 0) 
        {
            $actors = [];
            while ($actor = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
            {
                $actors[] = $actor;
            }
        } 
        else 
        {
            echo 'Pas de résultats';
        }
    ?>

    <?php
    /*Filmographie*/
    $query = 'SELECT DISTINCT title FROM movie JOIN moviehasperson ON movie.id=moviehasperson.idMovie';
    $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
    /*mysqli_stmt_bind_param($stmt, "i") // type: i, d, s or b
        or die('Échec de paramétrage de la requête : ' . mysqli_error($link));*/
    mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));

    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) != 0) 
        {
            $filmo_movies = [];
            while ($filmo_movie = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
            {
                $filmo_movies[] = $filmo_movie;
            }
        } 
        else 
        {
            echo 'Pas de résultats';
        }
    ?>

    <body>

        <div id="bloc_page">

            <header>

                <?php getBlock('blocks/header.php') ?>

            </header>

            <div id="bloc_body">

                <div id="bloc_repeat">
                    <?php
                        foreach ($actors as $actor) 
                        {
                            echo '<div id="bloc_sections">';

                                getBlock('blocks/info_crew.php', $actor);

    /*Filmographie*/
    $query = 'SELECT DISTINCT title FROM movie JOIN moviehasperson ON movie.id=moviehasperson.idMovie WHERE idPerson="'.$actor['idPerson'].'"';
    $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
    /*mysqli_stmt_bind_param($stmt, "i") // type: i, d, s or b
        or die('Échec de paramétrage de la requête : ' . mysqli_error($link));*/
    mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));

    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) != 0) 
        {
            $filmo_movies = [];
            while ($filmo_movie = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
            {
                $filmo_movies[] = $filmo_movie;
            }
        } 
        else 
        {
            echo 'Pas de résultats';
        }

                                echo '<section id="section_filmographie">
                                    <h1>Filmographie</h1>';
                                            foreach ($filmo_movies as $filmo_movie) 
                                            {
                                                getBlock('blocks/filmographie.php', $filmo_movie);
                                            } 
                                echo '</section>
                                
                            </div>';
                        } 
                    ?>
                </div>

            </div>

            <?php getBlock('blocks/footer.php') ?>

        </div>

    </body>

</html>
