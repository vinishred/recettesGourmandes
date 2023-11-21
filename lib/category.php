<?php

function getCategories (PDO $pdo) {
  $sql = 'SELECT * FROM categories';
//on prépare la requête
  $query = $pdo->prepare($sql);
  $query->execute();
  return $query->fetchAll();
}