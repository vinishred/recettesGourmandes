<?php
// on crée une fonction qui va prendre tous les param$etres de notre formulaire et les rentrer dans notre base de donées users
// Il faut utilisez les backticks (``) pour délimiter les noms de table et de colonnes dans MySQL/MariaDB.
function adduser(PDO $pdo, string $first_name, string $last_name, string $email, string $password) {
  $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `role`) VALUES (:first_name, :last_name, :email, :password, :role);";
  $query = $pdo->prepare($sql);

  // on sécurise le mot de passe avant de le mettre dans la BDD il faut mettre me password en varchar255 pour être tranquille
  $password = password_hash($password, PASSWORD_DEFAULT);

  // on met un role en dur dans notre base car il ne sera pas dans notre formulaire
  $role = 'subscriber';

  $query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
  $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->bindParam(':role', $role, PDO::PARAM_STR);

  return $query->execute();
}

// on cherche dans la base de données si un utilisateur avec l'adresse email existe
function verifyUser(PDO $pdo, string $email, string $password) {
  $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  $user = $query->fetch();

  //Si cet utilisateur existe et si son mot de passe est identique à celui rentré
  // on compare le mot de passe entré avec le mot de passe haché avec la fonction password_verify
  if($user && password_verify($password, $user['password'])) {
    return $user;
  } else {
    return false;
  }
}