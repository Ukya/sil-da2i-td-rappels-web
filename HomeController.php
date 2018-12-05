<?php

// Chargement des classes
require_once('Model.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}



function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}










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

