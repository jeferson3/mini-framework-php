<?php

/**
 * function for Dump and Die
 *
 * @param mixed $data
 * @return void
 */
function dd(...$data): void
{
    var_dump($data);
    die();
}

/**
 * function to verify user authenticated
 *
 * @return bool
 */
function auth(): bool
{
    return isset($_SESSION['auth']);
}

/**
 * function to check access direct in the url
 *
 * @return void
 */
function checkAccess(): void
{
    if (!auth()) {
        header("location: /");
        exit();
    }
}

/**
 * function to get old value of requisition and send to form
 *
 * @param string $value
 * @return string
 */
function old(string $value): string
{
    if (isset($_SESSION['old_value'])) {

        $aux = $_SESSION['old_value'];

        if (array_key_exists($value, $aux)) {
            $aux = $aux[$value];
            unset($_SESSION['old_value'][$value]);
            if (empty($_SESSION['old_value'])) unset($_SESSION['old_value']);
            return $aux;
        }
    }
    return "";
}