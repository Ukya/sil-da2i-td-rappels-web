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

                <div id="bloc_sections">

                    <div class="liste_index">
                        <h1>Liste alphabétique des films</h1>
                        <?php
                            while ($movie = $movies->fetch())
                            {
                            ?>
                                <p>
                                    <span><a href="index_test.php?page=movie&amp;title=<?php echo $movie['title']; ?>&amp;id=<?php echo $movie['id']; ?>"><?php echo $movie['title']; ?></a></span>
                                </p>
                                <?php
                            } 
                            $movies->closeCursor();
                        ?>
                    </div>

                    <div class="liste_index">
                        <h1>Liste alphabétique des réalisateurs</h1>
                        <?php
                            foreach ($directors as $director) 
                            {
                                ?>
                                <p>
                                    <span><a href="index_test.php?page=director&amp;name=<?php echo $director['firstname'] . '_' . $director['lastname']; ?>&amp;id=<?php echo $director['idPerson']; ?>"><?php echo $director['firstname'] . ' ' . $director['lastname']; ?></a></span>
                                </p>
                                <?php 
                            } 
                        ?>
                    </div>
                    
                    <div class="liste_index">
                        <h1>Liste alphabétique des acteurs</h1>
                        <?php
                            while ($actor = $actors->fetch())
                            {
                                ?>
                                <p>
                                    <span><a href="index_test.php?page=actor&amp;name=<?php echo $actor['firstname'] . '_' . $actor['lastname']; ?>&amp;id=<?php echo $actor['idPerson']; ?>"><?php echo $actor['firstname'] . ' ' . $actor['lastname']; ?></a></span>
                                </p>
                                <?php 
                            } 
                            $actors->closeCursor();
                        ?>
                    </div>
                    
                </div>
                
            </div>

            <?php getBlock('blocks/footer.php') ?>

        </div>

    </body>

</html>

