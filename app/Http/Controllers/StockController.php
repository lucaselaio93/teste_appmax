<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class StockController extends Controller {
    
    /*
    * Redirecionamento após cadastrar novo estoque 
    *
    * @var string
    */
    //protected $redirectTo = RouteServiceProvider::HOME;

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

    /* public function index(){
        return view('stock.index');
    } */

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
    
}
