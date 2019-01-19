<?php

namespace App\Http\Controllers;

use App\Product;
use View;
use Redirect;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the products
        $products = Product::all();

        // load the view and pass the products
        return View::make('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $rules = array(
            'ProductName'       => 'required',
            'PartNumber'        => 'required|integer',
            'ProductLabel'      => 'required',
            'StartingInventory' => 'required|integer',
            'InventoryRecieved' => 'required|integer',
            'InventoryOnHand'   => 'required|integer',
            'MinimumRequired'   => 'required|integer',
            'InventoryShipped'  => 'required|integer',
        );
        $validator = Validator::make(input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to(route('products.create'))
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $products = new Product;
            $products->ProductName           = Input::get('ProductName');
            $products->PartNumber            = Input::get('PartNumber');
            $products->ProductLabel          = Input::get('ProductLabel');
            $products->StartingInventory     = Input::get('StartingInventory');
            $products->InventoryRecieved     = Input::get('InventoryRecieved');
            $products->InventoryShipped      = Input::get('InventoryShipped');
            $products->InventoryOnHand       = Input::get('InventoryOnHand');
            $products->MinimumRequired       = Input::get('MinimumRequired');
            $products->save();

            // redirect
            Session::flash('message', 'Successfully added products!');
            return Redirect::to('products');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the product
        $product = Product::find($id);

        // show the view and pass the product to it
        return View::make('products.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the product
        $products = Product::find($id);

        // show the edit form and pass the product
        return View::make('products.edit')
            ->with('product', $products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'ProductName'       => 'required',
            'PartNumber'        => 'required|integer',
            'ProductLabel'      => 'required',
            'StartingInventory' => 'required|integer',
            'InventoryRecieved' => 'required|integer',
            'InventoryOnHand'   => 'required|integer',
            'MinimumRequired'   => 'required|integer',
            'InventoryShipped'  => 'required|integer',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('products/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $products = Product::find($id);
            $products->ProductName           = Input::get('ProductName');
            $products->PartNumber            = Input::get('PartNumber');
            $products->ProductLabel          = Input::get('ProductLabel');
            $products->StartingInventory     = Input::get('StartingInventory');
            $products->InventoryRecieved     = Input::get('InventoryRecieved');
            $products->InventoryShipped      = Input::get('InventoryShipped');
            $products->InventoryOnHand       = Input::get('InventoryOnHand');
            $products->MinimumRequired       = Input::get('MinimumRequired');
            $products->save();

            // redirect
            Session::flash('message', 'Successfully updated Product!');
            return Redirect::to('products');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $products = Product::find($id);
        $products->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Product!');
        return Redirect::to('products');
    }
}
