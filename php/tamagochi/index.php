<?php

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    $file = __DIR__ . '/classes/' . $class . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

$animal = new Animal('toto');

echo '<pre>';
print_r($animal);
echo '</pre>';
