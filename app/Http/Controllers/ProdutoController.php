<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorUpdateProduto;
use App\Http\Controllers\ProdutoController;

use App\Models\Produto;
use App\Models\User;

class ProdutoController extends Controller
{

    public function cadastro()
    {
        return view('produtos.produtoCadastro');
    }

    public function stor(StorUpdateProduto $request)
    {
        $produto = new Produto;

        $produto->nomeProduto = $request->nomeProduto;
        $produto ->descriçãoProduto = $request->descriçãoProduto;
        $produto->preço = $request->preço;

         // Image Upload
         if($request->hasFile('imagemProduto') && $request->file('imagemProduto')->isValid()){

            $requestImagemProduto = $request->imagemProduto;
            $extension = $requestImagemProduto->extension();
            $imagemNome = md5($requestImagemProduto->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImagemProduto->move(public_path('/public/img/produtos'), $imagemNome);
            $produto->imagemProduto = $imagemNome;
        }

        $user = auth()->user();
        $produto->user_id = $user->id;

        $produto->save();
        return redirect('/')->with('msg', 'Produto cadastrado com sucesso!');
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);

        $user = auth()->user();
        $hasUserReserva = false;

        if($user){
            $userProdutos = $user->produtoAsReserva->toArray();

            foreach($userProdutos as $userProduto)
            {
                if($userProduto['id'] == $id)
                {
                    $hasUserReserva = true;
                }
            }

        }

        return view('produtos.showProduto', ['produto' => $produto, 'hasUserReserva' => $hasUserReserva]);
    }

    public function editProduto($id){

        $produto = Produto::findOrFail($id);

        return view('produtos.editarProduto', ['produto' => $produto]);
    }

    public function dashboardProdutos()
    {
        $user = auth()->user();

        $produtoAsReserva = $user->produtoAsReserva;

        $produtos = $user->produtos;

        return view('produtos.dashboardProdutos', ['produtos' => $produtos, 'produtoAsReserva' => $produtoAsReserva]);
    }


    public function deletar($id)
    {
        Produto::findOrFail($id)->delete();

        return redirect ('/dashboardProdutos')->with('msg', 'Produto excluído com sucesso!');
    }

    public function updateProduto(StorUpdateProduto $request)
    {
        $data = $request->all();

        // Image Upload
        if($request->hasFile('imagemProduto') && $request->file('imagemProduto')->isValid()){

            $requestImagemProduto = $request->imagemProduto;
            $extension = $requestImagemProduto->extension();
            $imagemNome = md5($requestImagemProduto->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImagemProduto->move(public_path('/public/img/produtos'), $imagemNome);
            $data['imagemProduto'] = $imagemNome;
        }

        Produto::findOrFail($request->id)->update($data);

        return redirect('/dashboardProdutos')->with('msg', 'Produto editado com sucesso!');
    }

    public function reservaProduto($id)
    {
        $user = auth()->user();

        $user->produtoAsReserva()->attach($id);

        $produto = Produto::findOrFail($id);

        return redirect('/dashboardProdutos')->with('msg', 'Reserva feita com sucesso!');
    }

    public function leaveProduto($id){
        $user =auth()->user();

        $user->produtoAsReserva()->detach($id);

        $produto = Produto::findOrFail($id);

        return redirect('/dashboardProdutos')->with('msg', 'Reserva cancelada com sucesso');

    }
}

