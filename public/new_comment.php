<?php 


require('../boot.php');

if($_SERVER['REQUEST_METHOD']==='POST'){

    $pdo = pdo();

    $pdo->prepare('INSERT INTO comments (post_id, author, body) VALUES (?,?,?)') 
    
    ->execute([$_GET['id'],$_POST['author'],$_POST['body']]); 
    var_dump($_SERVER);
    // là on fou l'id du post qui est dans l'url et on l'affilie à post_id
    header('location:' . $_SERVER['HTTP_REFERER'] . '&success=true');
}



