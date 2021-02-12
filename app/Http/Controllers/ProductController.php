<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ProductController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'product_name' => ['required', 'string', 'max:255'],
            'product_sku' => ['string', 'max:255'],
            'product_qnt' => ['integer']
        ]);
    }

    public function create(){
        $stocks = Stock::all();
        return view('product.create', compact('stocks'));
    }

    public function store(Request $request){
        try{
            $sku = $request->product_sku;
            $sku = strtoupper($sku); 
            Product::create([
                'product_name' => $request->product_name,
                'product_sku' => $sku,
            ]);
            return redirect()->route('product-show')->with('success', "Produto $request->product_name salvo com sucesso!");
        }catch(Throwable $e){
            return redirect()->route('product-show')->with('error', $e->getMessage());
        }
    }

    public function show(){
        $arrProducts = Product::all()->toArray();
        foreach($arrProducts as $key => $product){
            $stock = Stock::find($product['stock_id']);
            $arrProducts[$key]['stock_name'] = $stock ? $stock->stock_name:null;
        }
        
        return view('product.show', ['products' => $arrProducts]);
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $stocks = Stock::all();
        return view('product.edit', compact('product', 'stocks'));
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        try{
            $product->update([
                'product_name' => $request->product_name,
                'product_sku' => strtoupper($request->product_sku),
            ]);
            return redirect()->route('product-show')->with('success', "Produto $request->product_name editado com sucesso!");
        }catch(Throwable $e){
            return redirect()->route('product-show')->with('error', $e->getMessage());
        } 
    }

    public function delete($id){

        $product = Product::findOrFail($id);
        if($product->product_qnt > 0){
            return redirect()->route('product-show')->with('error', "Não é possível excluir produtos presentes no estoque. Para excluir primeiro dê baixa no mesmo.");
        }
        try{
            $product->delete();
            return redirect()->route('product-show')->with('success', "Produto excluido com sucesso!");
        }catch(Throwable $e){
            return redirect()->route('product-show')->with('error', $e->getMessage());
        } 
    }
}
