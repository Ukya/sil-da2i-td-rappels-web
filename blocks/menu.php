<nav>
	<span><a href="index.php">Acceuil</a></span>
    <span><a href="director.php?name=<?php echo $data['firstname'] . '_' . $data['lastname']; ?>&amp;id=<?php echo $data['idPerson']; ?>">Directeur</a></span>
    <span><a href="actor.php?id=<?php echo $data['idMovie']; ?>">Acteurs</a></span>
</nav>