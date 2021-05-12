<?php

namespace App\Controllers;

use App\Models\Product;
use App\traits\Error;
use App\traits\Flash;

class ProductController extends Controller
{

    /**
     * @return void
     */
    public function index()
    {
        self::middleware('auth');

        $products = Product::all();
        self::load('admin.products.index', compact('products'));
    }

    /**
     * @return void
     */
    public function create()
    {
        self::middleware('auth');
        self::load('admin.products.create');
    }

    /**
     * @return void
     */
    public function store()
    {
        self::middleware('auth');

        if (isset($_POST['name']) and !empty($_POST['name']) and
            isset($_POST['price']) and !empty($_POST['price']) and
            isset($_POST['description']) and !empty($_POST['description'])) {


            $product = new \App\Classes\Product();
            $product->setName(trim($_POST['name']));
            $product->setDescription(trim($_POST['description']));
            $product->setPrice(str_replace([".", ","], ["", "."], $_POST['price']));
            $product->setSlug(trim(strtolower(implode('-', explode(' ', $product->getName())))));

            if(!is_null(Product::whereSlug($product->getSlug())->first()))
            {
                Error::send("Nome", "já existe!");
                self::redirect("back", true);
                exit();
            }

            $product = Product::create($product->jsonSerialize());

            Flash::send("Produto criado com sucesso");
            self::redirect('admin.products');

        }
        Flash::send("Aconteceu um erro inesperado");
        self::redirect('back');
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(int $id)
    {
        self::middleware('auth');

        if (isset($id) and !empty($id)){

            $product = Product::find($id);

            if (!is_null($product))  self::load('admin.products.edit', compact('product'));

            Flash::send("Produto não encontrado!!!");
            self::redirect('admin.products');
        }
        Flash::send("Aconteceu um erro inesperado");
        self::redirect('admin.products');

    }

    /**
     * @param int $id
     * @return void
     */
    public function update(int $id)
    {
        self::middleware('auth');
        if (isset($_POST['name']) and !empty($_POST['name']) and
            isset($_POST['price']) and !empty($_POST['price']) and
            isset($_POST['description']) and !empty($_POST['description']))
        {
            $oldProduct = Product::find($id);

            if (!is_null($oldProduct))
            {
                $newProduct = new \App\Classes\Product();
                $newProduct->setName(trim($_POST['name']));
                $newProduct->setDescription(trim($_POST['description']));
                $newProduct->setPrice(str_replace([".", ","], ["", "."], $_POST['price']));
                $newProduct->setSlug(trim(strtolower(implode('-', explode(' ', $newProduct->getName())))));

                $product = Product::whereSlug($newProduct->getSlug())->first();

                if (!is_null($product) and $product->slug != $oldProduct->slug)
                {
                    Error::send("Nome", "já está sendo usado por outro produto");
                    self::redirect("back", true);
                }

                $oldProduct->update($newProduct->jsonSerialize());

                Flash::send("Produto atualizado com sucesso");
                self::redirect('admin.products');

            }
            Flash::send("Produto não encontrado!!!");
            self::redirect('admin.products');
        }
        else
        {
            if(empty($_POST['name']))
            {
                Error::send("Nome", "é obrigatório!");
            }
            if(empty($_POST['description']))
            {
                Error::send("Descrição", "é obrigatório!");
            }
            if (empty($_POST['price']))
            {
                Error::send("Preço", "é obrigatório!");
            }
        }
        Flash::send("Aconteceu um erro inesperado", 'error');
        self::redirect('back', true);
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        self::middleware('auth');

        $product = Product::find($id);

        if (!is_null($product))
        {
            $product->delete();

            Flash::send("Produto deletado com sucesso");
            self::redirect('admin.products');
        }

        Flash::send("Produto não encontrado!");
        self::redirect('admin.products');
    }
}
