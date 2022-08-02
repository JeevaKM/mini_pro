<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Redirect;
use Response;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;

use Illuminate\Support\Facades\DB;

 
class ReceiptController extends Controller
{
   public function index()
   {
      $data['orders'] = DB::table('billings')->get();
       return view("Bill",$data);
   }
 
   public function getPrice(Request $request)
   {
      $getPrice = $request['id'];
      $price  = DB::table('billings')->where('id', $getPrice)->get();

      return Response::json($price);

   }   
  
}