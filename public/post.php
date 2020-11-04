<?php

include('../boot.php');


if (isset($_GET['id'])) { 
    $pdo = pdo();

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $query = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $query->execute([$_GET['id']]);
 // là on fait une requete pour dire 
//qu'on selectionne les id de posts de manière a ce que l'id selectionné soit le meme id qu'il ya dans le lien(get)
//et du coup ca va nous mettre le content qui sont propre à cet article (comments, body )



    $post = $query->fetch(); // resultat de notre query
} else {
    header('Location:index.php');
}

$action = "new_comment.php?id=" . $post['id'];


$commentaire = $pdo->prepare('SELECT * FROM comments WHERE post_id = ?');
$commentaire->execute([$_GET['id']]); // la ca va mettre le commentaire dans 
//le post en question (l'id qui a dans le lien donc (GET))






?>



    

<title>  <?=$post['title']?>  </title>
<link rel="stylesheet" href="../styling/posts.css">





<header class="head">


    <a href="http://localhost:8000/index.php" class="button">ZAKI-BLOG</button>




        <nav class="navv">


            <a href="new_post.php" style="width: auto; position:absolute;top:0;right:0">Créer un nouvel article</a>


        </nav>







</header>





<article class="article_post">

    <h2>
        <?= $post['title'] // notre titre qui provient du post selectionné grace à l'id qu'il ya dans le lien (voir phpmyadmin pour  meilleure vision?>
    </h2>
    <p>

        <?= $post['body'] //idem ?>

    </p>

</article>




<hr style="height:4px;border-width:0;color:black;background-color:gray">
<div class="comments">

    <?php

    while ($c = $commentaire->fetch()) { ?>

        <div class="com">
            <b> <?= $c['author'] ?> : </b> <?= $c['body'] ?> </br>
        </div>



    <?php } ?>
</div>

<form action=<?= $action ?> method="post" class="comment">

<?php
    if ($_GET['success']) {
    ?>
        <span style="color:green;">Votre message est bien envoyé</span> <br/>
    <?php
    }
    ?>

    <label for="body"> Auteur : </label>

    <p>

        <input type="hidden" name="post_id" value="caca">

        <input type="text" name="author" id="author" class="input_author">
    </p>




    <label for="commentaire"> Commentaire : </label>
    <p>


        <textarea name="body" id="body" class="text_com">  </textarea>


    </p>
    <p><button class="send"> Envoyer le commentaire</button></p>
    
   

</form>


<br />




<?php html_part('footer') ?>