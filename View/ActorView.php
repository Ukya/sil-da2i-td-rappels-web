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

            <header>

                <?php getBlock('blocks/header.php') ?>

            </header>

            <div id="bloc_body">

                <div id="bloc_repeat">
                    <?php
                        //foreach ($actor_info as $actor) 
                        //{
                            echo '<div id="bloc_sections">';

                            getBlock('blocks/info_crew.php', $actor);

                                echo '<section id="section_filmographie">
                                        <h1>Filmographie</h1>';
                                            foreach ($filmo_movies as $filmo_movie) 
                                            {
                                                getBlock('blocks/filmographie.php', $filmo_movie);
                                            } 
                                echo '</section>
                                
                            </div>';
                        //} 
                    ?>
                </div>

            </div>

            <?php getBlock('blocks/footer.php') ?>

        </div>

    </body>

</html>
