<?php

namespace App\Controllers;

use App\Models\Product;
use App\traits\Error;
use App\traits\Flash;
use SimpleRouter\config\Request;

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
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        self::middleware('auth');

        if ($request->get('name') and $request->get('price') and $request->get('description')) {


            $product = new \App\Classes\Product();
            $product->setName(trim($request->get('name')));
            $product->setDescription(trim($request->get('description')));
            $product->setPrice(str_replace([".", ","], ["", "."], $request->get('price')));
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
     * @param Request $request
     * @return void
     */
    public function update(Request $request, int $id)
    {
        self::middleware('auth');

        if ($request->get('name') and $request->get('price') and $request->get('description'))
        {
            $oldProduct = Product::find($id);

            if (!is_null($oldProduct))
            {
                $newProduct = new \App\Classes\Product();
                $newProduct->setName(trim($request->get('name')));
                $newProduct->setDescription(trim($request->get('description')));
                $newProduct->setPrice(str_replace([".", ","], ["", "."], $request->get('price')));
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
