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

    <body>

        <div id="bloc_page">

            <?php getBlock('blocks/header.php') ?>

            <div id="bloc_body">

                <?php
                    //foreach ($directors as $director) 
                    //{
                        getBlock('blocks/menu.php'/*, $director*/);
                    //} 
                ?>

                <div id="bloc_sections">

                    <?php 
                        //foreach ($movie_info as $info) 
                        //{
                            getBlock('blocks/info_film.php', $movie_info);
                        //}
                    ?>
                    
                    <section id="section_images">

                        <?php
                            foreach ($movie_info as $movie_picture) 
                            {
                                getBlock('blocks/image_film.php', $movie_picture);
                            } 
                        ?>

                    </section>

                    <section id="section_realisateur">
                        <h3>Aperçu du réalisateur</h3>
                        <?php
                            while ($director_info = $directors->fetch())
                            {
                                if($director_info['idMovie'] == $idMovie)
                                getBlock('blocks/cadre_apercu.php', $director_info);
                            } 
                            $directors->closeCursor();
                        ?>
                    </section>

                    <section id="section_acteurs">
                        <h3>Aperçu des acteurs</h3>
                        <?php
                            while ($actor_info = $actors->fetch())
                            {
                                if($actor_info['idMovie'] == $idMovie)
                                getBlock('blocks/cadre_apercu.php', $actor_info);
                            } 
                            $actors->closeCursor();
                        ?>
                    </section>
                    
                    
                </div>
                
            </div>

            <?php getBlock('blocks/footer.php') ?>

        </div>

    </body>

</html>

