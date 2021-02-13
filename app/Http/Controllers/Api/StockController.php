<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function baixarProdutos(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);

        if($request->qnt_baixa > $product->product_qnt){
            return response()->json(['error' => 'O valor da baixa não pode ser maior do que a quantidade em estoque do produto.']);
        }
        if($request->qnt_baixa*1 < 0){
            return response()->json(['error' => 'O valor da baixa não pode ser menor que zero.']);
        }
        $new_qnt = $product->product_qnt - $request->qnt_baixa;
            $product->update([
                'product_name' => $product->product_name,
                'product_sku' => $product->product_sku,
                'product_qnt' => $new_qnt,
                'stock_id' => $product->stock_id,
            ]);
        return response()->json(['success' => "Baixa do produto $product->product_name efetuada com sucesso!"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adicionarProdutos(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);

        if($request->qnt_baixa*1 < 0){
            return response()->json(['error' => 'O valor da entrada não pode ser menor que zero.']);
        }
        $new_qnt = $product->product_qnt + $request->qnt_baixa;
            $product->update([
                'product_name' => $product->product_name,
                'product_sku' => $product->product_sku,
                'product_qnt' => $new_qnt,
                'stock_id' => $product->stock_id,
            ]);
        return response()->json(['success' => "Entrada do produto $product->product_name efetuada com sucesso!"]);
    }
}
