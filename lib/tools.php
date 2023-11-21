<?php
//on crée une fonction qui va prendre en paramêtre une chaine de caractères et qui fait des retours à la ligne des éléments.
//le fait de typer notre variable (ici string) permet de mieux controller nos entrées
function linesToArray(string $string) {
  return explode(PHP_EOL, $string);
}

// la fonction slugify permet de formater les adresses
function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}