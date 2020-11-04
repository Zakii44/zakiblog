<?php



function pdo() 

{
    $co = 'mysql:host=localhost;dbname=zakiblog';
    $username = 'root';
    $password = 'root';

    $pdo = new PDO($co,$username,$password); // on sco a la détébéyz ^^'
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
    // là c'est simplement pour nous donner une erreur précise si jamais ya une requete qui merdouille histoire qu'on puisse réctifier cette merde
    
    return $pdo;

}


function html_part($name) {


    require( __DIR__ . "/html_parts/$name.php");
}
