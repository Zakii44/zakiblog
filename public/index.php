
<?php 


include('../boot.php');

$pdo = pdo();

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); // La on met l'attribut à fetch ASSOC pour qu'il nous retourne pas tout en double 

$query = $pdo->prepare('SELECT * FROM posts order by id desc'); // la tavu on prepare notre requete sql..
$results = $query->execute();// on l'execute et on fou dans une variable 
$posts = $query->fetchAll(); // la variable posts va contenu de  tout les resultats trouvés dans la bdd >_<'


?>
<link rel="stylesheet" href="../styling/posts.css">
<header class="head">


<a href="http://localhost:8000/index.php" class="button">Ayoub-BLOG</button>






<nav class="navv" >
   

<a href="new_post.php" style="width: auto; position:absolute;top:0;right:0" >Créer un nouvel article</a>


</nav>

</header>
    <br> <br>
    <h4 style="text-align: center;">Y a des articles ci-dessous..</h4>
    <br> <br>

  
<div class="artikeulz">
    <?php 
    foreach($posts as $post) :  ?>  
   
    <article class="article">

        <h2>
        <a href="http://localhost:8000/post.php?id=<?=$post['id']?>"> <?= $post['title']?>   </a> <?php // la 
    
        //on prepare le lien pour le  get on met en gros 
        //l'id du title dans le lien et plus tard on prendra cet id pour laffilier a post_id ?>
        </h2>
        
      
    </article>

    <?php endforeach ?>
    </div>

   
    <?php html_part('footer')?> 