<section id="section_informations">

    <div id="directeur_aside">
        <aside>
        <h1><?php echo $data['firstname'] . ' ' . $data['lastname'];?></h1>
        <p><img src="<?php echo $data['path']; ?>" alt="Photo de <?php echo $data['legend']; ?>"></p>
        <p>
            Date de naissance: <time><?php echo $data['birthDate']; ?></time> <br/>
        </p>
        </aside>
    </div>

    <article id="directeur_article">
        <h1>Biographie</h1>
        <p>
            <?php echo $data['biography']; ?>
        </p>
    </article>

</section>  