<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Gate, File, DB;


class ProductController extends Controller
{
    public function dashboardReport(Request $request)
    {
        // $products = Product::get();
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        // dd($products);
        return view('admin.product.index',compact('products'));
    }

    public function createProduct(Request $request)
    {
        return view('admin.product.create');
        // return view('');
    }


    function storeProduct(Request $request)
    {
    //   dd($request);
      $input = $request->All();
        // dd($input);
      $productArr = [];

      $productArr['client_name'] = $input['clientName'];
      $productArr['phone_number'] = $input['phoneNumber'];
      $productArr['margin'] = $input['margin'];
      $productArr['margin_amount'] = $input['marginAmount'];
      $productArr['product'] = $input['product'];
      $productArr['user_team'] = $input['userTeam'];
      $productArr['client_code'] = $input['clientCode'];
      $productArr['emp_code'] = $input['empCode'];
      $productArr['manager_code'] = $input['managerCode'];
      $productArr['remark'] = $input['remarks'];
      $productArr['status'] = $input['status'];
      $productArr['client_code_margin'] = $input['clientCodeMargin'];
      $productArr['customer_name_margin'] = $input['customerName'];
      $productArr['margin_payout_amount_margin'] = $input['marginPayoutAmount'];
      $productArr['account_acitivation_date_margin'] = $input['accountAcivationDate'];
      $productArr['margin_payout_date_margin'] = $input['marginPayoutDate'];
      $productArr['user_team_margin'] = $input['userTeamMargin'];
      $productArr['emp_code_margin'] = $input['empCodeMargin'];
        // dd($productArr);
      $productSaveRes = Product::create($productArr);
    //   dd( $productSaveRes);

      return redirect('admin/dashboardReport-product')->with('message', 'Record Saved successfully'); 
        // return view();
    }
    function editProduct(Request $request, $id)
    {
        
        $productDetails = Product::find($id);
        // dd($productDetails);
        return view('admin.product.edit',compact('productDetails'));
        
    }
    function updateProduct(Request $request, $id){

        // dd('test');
        $input = $request->All();

        $productArr = [];
  
        $productArr['client_name'] = $input['clientName'];
        $productArr['phone_number'] = $input['phoneNumber'];
        $productArr['margin'] = $input['margin'];
        $productArr['margin_amount'] = $input['marginAmount'];
        $productArr['product'] = $input['product'];
        $productArr['user_team'] = $input['userTeam'];
        $productArr['client_code'] = $input['clientCode'];
        $productArr['emp_code'] = $input['empCode'];
        $productArr['manager_code'] = $input['managerCode'];
        $productArr['remark'] = $input['remarks'];
        $productArr['status'] = $input['status'];
        $productArr['client_code_margin'] = $input['clientCodeMargin'];
        $productArr['customer_name_margin'] = $input['customerName'];
        $productArr['margin_payout_amount_margin'] = $input['marginPayoutAmount'];
        $productArr['account_acitivation_date_margin'] = $input['accountAcivationDate'];
        $productArr['margin_payout_date_margin'] = $input['marginPayoutDate'];
        $productArr['user_team_margin'] = $input['userTeamMargin'];
        $productArr['emp_code_margin'] = $input['empCodeMargin'];

        $product = Product::find($id);
    
        if ($product) {
            $product->update($productArr);
            // return response('')->json(['message' => 'Product updated successfully!']);
            return redirect('admin/dashboardReport-product')->with('message', 'Record Saved successfully');            
        } else {
            return response()->json(['message' => 'Product not found!'], 404);
            
        }

    }
    function destroyProduct(Request $request, $id){
        // dd('test');
    $product = Product::find($id);
    
    if (!$product) {
        return redirect()->back()->with('error', 'Product not found.');
    }

    $product->delete();

    return redirect()->route('admin.dashboardReport-product')->with('success', 'Product deleted successfully.');

    }


    

   
}
