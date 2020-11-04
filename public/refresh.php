<?php

require_once('../boot.php');


$pdo = pdo();
$query = $pdo->prepare('DELETE FROM posts');
$query->execute();
$query = $pdo->prepare('DELETE FROM comments');
$query->execute();

$query->execute();

$query = $pdo->prepare('CREATE TABLE posts (

id INTEGER PRIMARY KEY,
title VARCHAR (255) NOT NULL,
body TEXT NOT NULL

)

');

$query->execute();

$query = $pdo->prepare('CREATE TABLE comments (

    id INTEGER PRIMARY KEY,
    post_id INTEGER NOT NULL,
    author VARCHAR (255) NOT NULL,
    body TEXT NOT NULL
    
    )
    
    ');
    
$query->execute();