<?php
 
namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {

        // $this->middleware('permission:products.index');COMPROBACION DE PERMISOS A NIVEL DE METODOS 

        $products = Product::paginate(10);//almacenamos los productos y configuramos la paginacion

        return view('products.index', compact('products'));
    }


    
    public function create()
    {
        return view('products.create');
    }


    
    public function store(Request $request)
    {
        $product  = Product::create($request->all());//Almacenamos todo lo que viene del formulario en una instancia 


        return redirect()->route('products.edit', $product->id)->with('info', 'Producto guardado con exito');//con el metodo with enviamos una variable con un mensaje
    }


    
    public function show(Product $product)
    {
        
        return view('products.show', compact('product'));
    }

    

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }


    
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('products.edit', $product->id)->with('info', 'Producto actualizado con exito');
    }


    
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('info', 'Eliminado correctamente'); //con el return back, regresamos a la vista anterior.
    }
    
}
