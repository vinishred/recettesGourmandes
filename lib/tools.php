<?php
//on crée une fonction qui va prendre en paramêtre une chaine de caractères et qui fait des retours à la ligne des éléments.
//le fait de typer notre variable (ici string) permet de mieux controller nos entrées
function linesToArray(string $string) {
  return explode(PHP_EOL, $string);
}
