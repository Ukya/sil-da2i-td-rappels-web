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
    /*Tableau des directeurs*/
    $id_movie = $_GET['id'];
    $query = 'SELECT * FROM moviehasperson JOIN person ON moviehasperson.idPerson = person.id JOIN personhaspicture ON person.id = personhaspicture.idPerson JOIN picture ON personhaspicture.idPicture = picture.id WHERE role = "director" AND idMovie="'.$id_movie.'"';
    $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
    /*mysqli_stmt_bind_param($stmt, "i") // type: i, d, s or b
        or die('Échec de paramétrage de la requête : ' . mysqli_error($link));*/
    mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));

    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) != 0) 
        {
            $directors = [];
            while ($director = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
            {
                $directors[] = $director;
            }
        } 
        else 
        {
            echo 'Pas de résultats';
        }
    ?>

    <?php
    /*Tableau des acteurs*/
    $query = 'SELECT * FROM moviehasperson JOIN person ON moviehasperson.idPerson = person.id JOIN personhaspicture ON person.id = personhaspicture.idPerson JOIN picture ON personhaspicture.idPicture = picture.id WHERE role = "actor" AND idMovie="'.$id_movie.'"';
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
    /*Tableau des images du film*/
    $query = 'SELECT * FROM movie JOIN moviehaspicture ON movie.id=moviehaspicture.idMovie JOIN picture ON moviehaspicture.idPicture=picture.id WHERE type = "gallery" AND idMovie="'.$id_movie.'"';
    $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
    /*mysqli_stmt_bind_param($stmt, "i") // type: i, d, s or b
        or die('Échec de paramétrage de la requête : ' . mysqli_error($link));*/
    mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));

    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) != 0) 
        {
            $movie_pictures = [];
            while ($movie_picture = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
            {
                $movie_pictures[] = $movie_picture;
            }
        } 
        else 
        {
            echo 'Pas de résultats';
        }
    ?>

    <?php
    /*Informations du film*/
    $title_movie = $_GET['title'];
    $query = 'SELECT * FROM movie JOIN moviehaspicture ON movie.id=moviehaspicture.idMovie JOIN picture ON moviehaspicture.idPicture=picture.id WHERE type = "poster" AND title="'.$title_movie.'"';
    /*var_dump ($title_movie);*/
    $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
    /*mysqli_stmt_bind_param($stmt, "i") // type: i, d, s or b
        or die('Échec de paramétrage de la requête : ' . mysqli_error($link));*/
    mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));

    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) != 0) 
        {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
            {
                $movie_info = $row;
            }
        } 
        else 
        {
            echo 'Pas de résultats';
        }
    ?>

    <body>

        <div id="bloc_page">

            <?php getBlock('blocks/header.php') ?>

            <div id="bloc_body">

                <?php
                    foreach ($directors as $director) 
                    {
                        getBlock('blocks/menu.php', $director);
                    } 
                ?>

                <div id="bloc_sections">

                    <?php getBlock('blocks/info_film.php', $movie_info);?>
                    
                    <section id="section_images">

                        <?php
                            foreach ($movie_pictures as $movie_picture) 
                            {
                                getBlock('blocks/image_film.php', $movie_picture);
                            } 
                        ?>

                    </section>

                    <section id="section_realisateur">
                        <h3>Aperçu du réalisateur</h3>
                        <?php
                            foreach ($directors as $director) 
                            {
                                getBlock('blocks/cadre_apercu.php', $director);
                            } 
                        ?>
                    </section>

                    <section id="section_acteurs">
                        <h3>Aperçu des acteurs</h3>
                        <?php
                            foreach ($actors as $actor) 
                            {
                                getBlock('blocks/cadre_apercu.php', $actor);
                            } 
                        ?>
                    </section>
                    
                    
                </div>
                
            </div>

            <?php getBlock('blocks/footer.php') ?>

        </div>

    </body>

</html>

