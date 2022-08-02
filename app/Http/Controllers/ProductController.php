<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use App\Models\Order;
use DB;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Catagorys=Category::all();
       

        return view('techcmantix.product.p_index',compact('Catagorys'));
    }

    public function store(Request $request)
    {

        
        $Product=new Product;
        $Product->categorie_id=$request->categorie_id;

        $Product->products=$request->products;
        $Product->price=$request->price;
        $Product->qty=$request->qty;
       if($Product->save()){
        $Order=new Order;
        $Order->product_id=$Product->id;
        $Order->product_name=$request->products;
        $Order->product_price=$request->price;;
       // $Order->amount=$Product->qty*$Product->price;
        $Order->save();
       }
       else{
        return "failed";
       }
        return redirect('proIndex'); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
