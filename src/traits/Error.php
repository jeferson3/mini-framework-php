<?php


namespace App\traits;


trait Error
{

    public static function send(string $key, string $message)
    {
        if (!isset($_SESSION['errors']))
        {
            $_SESSION['errors'] = [
                $key => $message
            ];
        }
        else
        {
            $aux = $_SESSION['errors'];
            $aux[$key] = $message;
            $_SESSION['errors'] = $aux;
        }
    }

    /**
     * @return void
     */
    public static function get() : void
    {
        if(isset($_SESSION['errors']))
        {
            $errors = $_SESSION['errors'];

            echo "<div class='error-container'><ul class='errors'>";
            foreach ($errors as $key => $error)
            {
                echo "<li> O campo <strong>$key</strong> $error</li>";
            }
            echo "</div></ul>";
            unset($_SESSION['errors']);
        }
    }


}