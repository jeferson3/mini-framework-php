<?php

namespace App\Controllers;

use App\Models\User;
use App\traits\Error;
use App\traits\Flash;

final class AuthController extends Controller
{

    public function index() : void
    {
        self::middleware('login');
        self::load("auth.login");
    }

    public function create()
    {
        self::middleware('login');
        self::load('auth.register');
    }

    public function login()
    {
        self::middleware('login');

        if(isset($_POST['email']) and !empty($_POST['email']) and
            isset($_POST['password']) and !empty($_POST['password']))
        {
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $user = User::whereEmail($email)->first();

            if(!$user)
            {
                Flash::send("E-mail não cadastrado!");
                self::redirect('auth.login', true);
            }

            else if ($user->password == $password)
            {
                $_SESSION['auth'] = serialize($user);

                Flash::send("Bem vindo!");
                self::redirect('admin.dashboard');
            }
            else
            {
                Flash::send("E-mail e/ou senha incorretos!");
                self::redirect('auth.login', true);
            }
        }
        else
        {
            if(empty($_POST['email']))
            {
                Error::send("Email", "é obrigatório!");
            }
            if (empty($_POST['password']))
            {
                Error::send("Senha", "é obrigatório!");
            }
        }
        Flash::send("Aconteceu um erro inesperado");
        self::redirect('auth.login');

    }

    public function register()
    {
        self::middleware('login');

        if(isset($_POST['name']) and !empty($_POST['name']) and isset($_POST['email']) and !empty($_POST['email']) and
            isset($_POST['password']) and !empty($_POST['password']) and isset($_POST['repeat-password'])
            and !empty($_POST['repeat-password']) and isset($_POST['terms']) and !empty($_POST['terms']))
        {
            if ($_POST['terms'] != "on")
            {
                Error::send("Termos", "é obrigatório");
                self::redirect("auth.register", true);
            }

            if ($_POST['password'] != $_POST['repeat-password'])
            {
                Error::send("Senha", "está diferente");
                self::redirect("auth.register", true);
            }

            if (!is_null(User::whereEmail(trim($_POST['email']))->first()))
            {
                Error::send("Email", "já está em uso por outro usuário");
                self::redirect("auth.register", true);
            }

            $user = new \App\Classes\User();
            $user->setName(trim($_POST['name']));
            $user->setEmail(trim($_POST['email']));
            $user->setPassword(md5($_POST['password']));

            User::create($user->jsonSerialize());

            Flash::send("Cadastro realizado com sucesso, faça login");
            self::redirect('auth.login');

        }
        else
        {
            if(empty($_POST['name']))
            {
                Error::send("Nome", "é obrigatório!");
            }
            if(empty($_POST['email']))
            {
                Error::send("Email", "é obrigatório!");
            }
            if (empty($_POST['password']))
            {
                Error::send("Senha", "é obrigatório!");
            }
            if (empty($_POST['terms']))
            {
                Error::send("Termos", "é obrigatório");
                self::redirect("auth.register", true);
            }
        }
        Flash::send("Aconteceu um erro inesperado");
        self::redirect('auth.register');



    }

    public function logout()
    {
        unset($_SESSION['auth']);
        self::redirect('home');
    }

}
