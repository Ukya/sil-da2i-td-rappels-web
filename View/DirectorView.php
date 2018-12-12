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

                <?php //getBlock('blocks/menu.php') ?>

                <div id="bloc_sections">

                    <?php getBlock('blocks/info_crew.php', $director_info) ?>

                    <section id="section_filmographie">
                        <h1>Filmographie</h1>
                            <?php
                                foreach ($filmo as $filmographie) 
                                {
                                    getBlock('blocks/filmographie.php', $filmographie);
                                } 
                            ?>
                    </section>
                    
                </div>
                
            </div>

            <?php getBlock('blocks/footer.php') ?>

        </div>

    </body>

</html>
