<?php

require('../boot.php');

if($_SERVER['REQUEST_METHOD']=== "POST"){  
 // sa vérifie si ya bien un post denvoyed and banned..


$pdo = pdo();

$pdo->prepare('INSERT INTO posts(title,body) VALUES(?,?)') 
// la on prépare la requete  on met des "?" 
//dans values sinon les gens peuvent foutre du sql dans le post

    ->execute([$_POST['title'],$_POST['body']]); 
    // la en utilisant execute ça va foutre les values tout en les vérifiant
    // c pour sa qu'on met dans un array 
    //on utilise nos attributs name qui vienne de nos input/textarea etc.. pour notre sql

    header('Location:index.php');
  
} 


?>
<link rel="stylesheet" href="../styling/posts.css">

<header class="head">


<a href="http://localhost:8000/index.php" class="button">ZAKI-BLOG</button>
</a>

<body style="background: lightyellow;">
</header>

    <h1 class="new_article">Nouvel article</h1>

<div class="form_create_post">
    <form method="POST" class="form">
    
    <label for="titre"> Titre : </label>
    
    <p>
   
    <input type="text" name="title" class="title" > 

    </p>

   
    <label for="Cont"> Contenu : </label>
    <p>

    <textarea name="body" class="textarea"></textarea>

    </p>



    <button> Créer l'article </button>

     </form>

     </div>

     <?php html_part('footer')?>
   