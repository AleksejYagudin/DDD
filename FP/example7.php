<?php
declare(strict_types=1);

require $_SERVER['DOCUMENT_ROOT']. '/vendor/autoload.php';

$posts = array(
    array("title" => "foo", "author" => array("name" => "Bob", "email" => "bob@example.com")),
    array("title" => "bar", "author" => array("name" => "Tom", "email" => "tom@example.com")),
    array("title" => "baz"),
    array("title" => "biz", "author" => array("name" => "Mark", "email" => "mark@example.com")),
);

function index($key) {
    return function($array) use ($key) {
        return isset($array[$key]) ? $array[$key] : null;
    };
}
$postMonad = new \App\DDD\MonadPHP\ListMonad($posts);
$names = $postMonad
    ->bind(\App\DDD\MonadPHP\Maybe::unit)
    ->bind(index("author"))
    ->bind(index("name"))
    ->extract();
echo '<pre>';
print_r($names);
echo '</pre>';