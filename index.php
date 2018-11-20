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
    /*Titre des Films*/
    $query = 'SELECT title,id FROM movie ORDER BY title';
    $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
    /*mysqli_stmt_bind_param($stmt, "i") // type: i, d, s or b
        or die('Échec de paramétrage de la requête : ' . mysqli_error($link));*/
    mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));

    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) != 0) 
        {
            $films = [];
            while ($film = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
            {
                $films[] = $film;
            }
        } 
        else 
        {
            echo 'Pas de résultats';
        }

        /*
        /movie.php?id=3&category=doc
        $_GET ["id"] //3
              ["category"] //doc*/
    ?>

    <?php
    /*Nom des Réalisateurs*/
    $query = 'SELECT id,lastname,firstname FROM person JOIN moviehasperson on person.id=moviehasperson.idPerson WHERE role = "director" ORDER BY firstname';
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
    /*Nom des Acteurs*/
    $query = 'SELECT id,lastname,firstname FROM person JOIN moviehasperson on person.id=moviehasperson.idPerson WHERE role = "actor" ORDER BY firstname';
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

    <body>

        <div id="bloc_page">

            <?php getBlock('blocks/header.php') ?>

            <div id="bloc_body">

                <div id="bloc_sections">

                    <div class="liste_index">
                        <h1>Liste alphabétique des films</h1>
                        <?php
                            foreach ($films as $film) 
                            {
                                ?>
                                <p>
                                    <span><a href="movie.php?title=<?php echo $film['title']; ?>&amp;id=<?php echo $film['id']; ?>"><?php echo $film['title']; ?></a></span>
                                </p>
                                <?php
                            } 
                        ?>
                    </div>

                    <div class="liste_index">
                        <h1>Liste alphabétique des réalisateurs</h1>
                        <?php
                            foreach ($directors as $director) 
                            {
                                ?>
                                <p>
                                    <span><a href="director.php?name=<?php echo $director['firstname'] . '_' . $director['lastname']; ?>&amp;id=<?php echo $director['id']; ?>"><?php echo $director['firstname'] . ' ' . $director['lastname']; ?></a></span>
                                </p>
                                <?php 
                            } 
                        ?>
                    </div>
                    
                    <div class="liste_index">
                        <h1>Liste alphabétique des acteurs</h1>
                        <?php
                            foreach ($actors as $actor) 
                            {
                                ?>
                                <p>
                                    <span><a href="director.php?name=<?php echo $actor['firstname'] . '_' . $actor['lastname']; ?>&amp;id=<?php echo $actor['id']; ?>"><?php echo $actor['firstname'] . ' ' . $actor['lastname']; ?></a></span>
                                </p>
                                <?php 
                            } 
                        ?>
                    </div>
                    
                </div>
                
            </div>

            <?php getBlock('blocks/footer.php') ?>

        </div>

    </body>

</html>

