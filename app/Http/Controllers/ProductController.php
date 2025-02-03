<?php
    
namespace App\Http\Controllers;
    
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

    
class ProductController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        if (request('search')) {
            $search = request('search');
    
            $products = Product::where('name', 'like', '%' . $search . '%')
                ->orWhere('detail', 'like', '%' . $search . '%')
                ->latest()
                ->paginate(5)
                ->withQueryString();
        } else {
            $products = Product::latest()->paginate(5);
        }
    
        return view('products.index', compact('products'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('products.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_old(Request $request): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);    
     
        Product::create($request->only(['name', 'detail']));     

        return redirect()->route('products.index')
                        ->with('success','Articulo creado con exito.');
    }
    
    public function store(Request $request): RedirectResponse
    {
        // Validar los datos
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        try {
            Product::create($request->only(['name', 'detail']));
    
            return redirect()->route('products.index')
                             ->with('success', 'Artículo creado con éxito.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Código de Artículo Duplicado.']);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product): View
    {
        return view('products.show',compact('product'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *     
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product): View
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request     
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    try {
        $product->update($request->only(['name', 'detail']));
        return redirect()->route('products.index')
        ->with('success','Articulo Actualizado');

    } catch (\Exception $e) {
        return redirect()->route('products.index')
                         ->with('error', 'Hubo un problema al actualizar el registro.');
    }
            
    }
    
    /**
     * Remove the specified resource from storage.
     *     
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }


    public function buscar(Request $request)
{
    $query = $request->input('query', '');
    $category = $request->input('category', '');
    $sortBy = $request->input('sortBy', 'name');
    $sortOrder = $request->input('sortOrder', 'asc');
    $perPage = 5;

    $productos = Product::query();

    if ($query) {
        $productos->where('name', 'like', '%' . $query . '%')
                  ->orWhere('detail', 'like', '%' . $query . '%');
    }

    if ($category) {
        $productos->where('category_id', $category);
    }

    $productos->orderBy($sortBy, $sortOrder);

    return response()->json($productos->paginate($perPage));
}

}
