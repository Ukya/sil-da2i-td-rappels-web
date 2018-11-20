<?php
    $link = mysqli_connect('localhost', 'root')
            or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
        mysqli_select_db($link, 'film_bd')
            or die ('Erreur de sélection de la BD : ' . mysqli_error($link));
        mysqli_set_charset($link, 'utf8');
?>

<?php
/*Liste des acteurs*/
$id_movie = $_GET['id'];
$query = 'SELECT * FROM person JOIN moviehasperson ON person.id = moviehasperson.idPerson WHERE role = "actor" AND idMovie="'.$id_movie.'"';
$stmt = mysqli_prepare($link, $query)
    or die('Échec de préparation de la requête : ' . mysqli_error($link));
/*mysqli_stmt_bind_param($stmt, "i") // type: i, d, s or b
    or die('Échec de paramétrage de la requête : ' . mysqli_error($link));*/
mysqli_stmt_execute($stmt)
    or die('Erreur dans la requête : ' . mysqli_error($link));

$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) != 0) 
    {
        $name_actors = [];
        while ($name_actor = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
        {
            $name_actors[] = $name_actor;
        }
    } 
    else 
    {
        echo 'Pas de résultats';
    }
?>

<section id="section_informations">

    <div id="film_poster">
        <img src="<?php echo $data['path']; ?>" alt="Poster du film <?php echo $data['title']; ?>">
    </div>

    <article id="film_article">
        <h1><?php echo $data['title']; ?></h1>
        <p>
           <?php echo $data['synopsis']; ?> 
        </p>
    </article>

    <div id="film_aside">
        <aside>
        <h2>A propos</h2>
        <p>
            Date de sortie : <time><?php echo $data['releaseDate']; ?></time> <br/>
            <!--Société de distribution : Warner Bros. Pictures <br/>
            Pays d’origine : États-Unis <br/>
            Genre : Aventure <br/>
            Durée : <time>112 minutes</time> <br/>-->
        </p>
        <p>Note: <?php echo $data['rating']; ?>/5</p>
        </aside>

        <aside>
            <h2>Acteurs principaux</h2>  
            <?php 
                foreach ($name_actors as $name_actor) 
                {
                    ?><p><?php
                    echo $name_actor['firstname'] . ' ' . $name_actor['lastname']; 
                } 
            ?></p>
        </aside>
    </div>

</section> 