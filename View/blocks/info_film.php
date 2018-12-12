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
                //foreach ($data as $data) 
                //{
                    echo '<p>' . $data['firstname'] . ' ' . $data['lastname'] . '</p>' ; 
                //} 
            ?>
        </aside>
    </div>

</section> 