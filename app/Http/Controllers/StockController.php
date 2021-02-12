<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Throwable;

class StockController extends Controller {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'stock_name' => ['required', 'string', 'max:255']
        ]);
    }

    public function create(){
       return view('stock.create');
    }

    public function store(Request $request){

        try{
            Stock::create([
                'stock_name' => $request->stock_name
            ]);
            return redirect()->route('stock-show')->with('success', "Estoque $request->stock_name salvo com sucesso!");
        }catch(Throwable $e){
            return redirect()->route('stock-show')->with('error', $e->getMessage());
        }
    }

    public function show(){
        $arrStock = Stock::all();
        return view('stock.show', ['arrStock' => $arrStock]);
    }

    public function edit($id){
        $stock = Stock::findOrFail($id);
        return view('stock.edit', ['stock' => $stock]);
    }

    public function update(Request $request, $id){
        $stock = Stock::findOrFail($id);
        try{
            $stock->update([
                'stock_name' => $request->stock_name,
            ]);
            return redirect()->route('stock-show')->with('success', "Estoque $request->stock_name editado com sucesso!");
        }catch(Throwable $e){
            return redirect()->route('stock-show')->with('error', $e->getMessage());
        } 
    }

    public function delete($id){

        $stock = Stock::findOrFail($id);
        try{
            $stock->delete();
            return redirect()->route('stock-show')->with('success', "Estoque excluido com sucesso!");
        }catch(Throwable $e){
            return redirect()->route('stock-show')->with('error', $e->getMessage());
        } 
    }

    public function vinculateToStock(){
        $stocks = Stock::all();
        $products = Product::all();
        return view('stock.vinculateProduct', compact('stocks', 'products'));
    }

    public function addProductToStock(Request $request){
        $product = Product::findOrFail($request->product_id);
        $stock = Stock::findOrFail($request->stock_id);
        try{
            $product->update([
                'product_name' => $product->product_name,
                'product_sku' => $product->product_sku,
                'product_qnt' => $product->product_qnt,
                'stock_id' => $request->stock_id,
            ]);
            return redirect()->route('stock-product-vinculate')->with('success', "$product->product_name vinculado ao $stock->stock_name com sucesso!");
        }catch(Throwable $e){
            return redirect()->route('stock-product-vinculate')->with('error', $e->getMessage());
        } 
    }

    public function dropToStockSelect(){
        $stocks = Stock::all();
        return view('stock.dropStockSelect', compact('stocks'));
    }

    public function dropStockProduct(Request $request){
        $stock = Stock::findOrFail($request->stock_id);
        $products = DB::table('stocks')
        ->select('*')
        ->join('products', 'products.stock_id', '=', 'stocks.stock_id')
        ->where('stocks.stock_id', '=', $request->stock_id)
        ->get();
        return view('stock.dropStockProduct', compact('stock', 'products'));
    }

    public function dropProductFromStock(Request $request){
        if($request->qnt_baixa > $request->product_qnt){
            return redirect()->route('stock-select-drop')->with('error', 'O valor da baixa não pode ser maior do que a quantidade em estoque do produto.');
        }
        if($request->qnt_baixa*1 < 0){
            return redirect()->route('stock-select-drop')->with('error', 'O valor da baixa não pode ser menor que zero.');
        }
        $product = Product::findOrFail($request->product_id);
        $new_qnt = $request->product_qnt - $request->qnt_baixa;
        try{
            $product->update([
                'product_name' => $product->product_name,
                'product_sku' => $product->product_sku,
                'product_qnt' => $new_qnt,
                'stock_id' => $product->stock_id,
            ]);
            return redirect()->route('stock-select-drop', ['request' => $request])->with('success', "Baixa do produto $product->product_name efetuada com sucesso!");
        }catch(Throwable $e){
            return redirect()->route('stock-select-drop')->with('error', $e->getMessage());
        } 
    }

    public function addToStockSelect(){
        $stocks = Stock::all();
        return view('stock.addStockSelect', compact('stocks'));
    }

    public function addStockProduct(Request $request){
        $stock = Stock::findOrFail($request->stock_id);
        $products = DB::table('stocks')
        ->select('*')
        ->join('products', 'products.stock_id', '=', 'stocks.stock_id')
        ->where('stocks.stock_id', '=', $request->stock_id)
        ->get();
        return view('stock.addStockProduct', compact('stock', 'products'));
    }

    public function addProductFromStock(Request $request){
        if($request->qnt_entrada*1 < 0){
            return redirect()->route('stock-select-add')->with('error', 'O valor da entrada não pode ser menor que zero.');
        }
        $product = Product::findOrFail($request->product_id);
        $new_qnt = $request->product_qnt + $request->qnt_entrada;
        try{
            $product->update([
                'product_name' => $product->product_name,
                'product_sku' => $product->product_sku,
                'product_qnt' => $new_qnt,
                'stock_id' => $product->stock_id,
            ]);
            return redirect()->route('stock-select-add', ['request' => $request])->with('success', "Entrada do produto $product->product_name efetuada com sucesso!");
        }catch(Throwable $e){
            return redirect()->route('stock-select-add')->with('error', $e->getMessage());
        } 
    }
}
