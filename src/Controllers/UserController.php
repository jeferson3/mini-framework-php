<?php

namespace App\Controllers;
use App\Models\User;

final class UserController extends Controller
{
    /**
     * Return all users of database
     * @return void
     */
    public function index() : void
    {
        self::middleware("auth");

        $users = User::all();
        self::load("admin.users.index", compact('users'));
    }

    /**
     * Load view create
     * @return void
     */
    public function create()
    {
        self::middleware("auth");
        self::load('admin.users.create');
    }

    /**
     * @return void
     */
    public function store()
    {
        self::middleware("auth");

        if (isset($_POST['nome']) and !empty($_POST['nome']) and
            isset($_POST['email']) and !empty($_POST['email']) and
            isset($_POST['password']) and !empty($_POST['password']))
        {
            $user = new \App\Classes\User();
            $user->setNome($_POST['nome']);
            $user->setEmail($_POST['email']);
            $user->setPassword(md5($_POST['password']));

            User::create($user->jsonSerialize());
        }
        self::redirect('back');
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(int $id)
    {
        self::middleware("auth");

        // TODO: Implement show() method.
    }

    /**
     * @param int $id
     * @return void
     */
    public function update(int $id)
    {
        self::middleware("auth");

        // TODO: Implement update() method.
    }

    /**
     * @param int $id
     */
    public function delete(int $id) : void
    {
        self::middleware("auth");

        if (isset($_POST['_method']) and $_POST['_method']=='delete'
            and isset($_POST['id']) and !empty($id))
        {
            $id = $_POST['id'];
            $user = User::findOrFail($id);
            $user->delete();
        }
        self::redirect('back');
    }


}
