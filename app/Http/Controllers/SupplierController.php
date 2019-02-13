<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Supplier;
use View;
use Redirect;
use Session;

class SupplierController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the products
        $suppliers = Supplier::all();

        // load the view and pass the products
        return View::make('suppliers.index')
            ->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $rules = array(
            'suppliers'       => 'required',
        );
        $validator = Validator::make(input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to(route('suppliers.create'))
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $suppliers = new Supplier;
            $suppliers->Supplier           = Input::get('suppliers');
            $suppliers->save();

            // redirect
            Session::flash('message', 'Successfully added suppliers!');
            return Redirect::to('suppliers');
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
        $suppliers = Supplier::find($id);

        // show the view and pass the product to it
        return View::make('suppliers.show')
            ->with('suppliers', $suppliers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the supplier
        $suppliers = Supplier::find($id);

        // show the edit form and pass the supplier
        return View::make('suppliers.edit')
            ->with('supplier', $suppliers);
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
            'suppliers'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('suppliers/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $suppliers = Supplier::find($id);
            $suppliers->suppliers           = Input::get('suppliers');
            $suppliers->save();

            // redirect
            Session::flash('message', 'Successfully updated supplier!');
            return Redirect::to('suppliers');
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
        $suppliers = Supplier::find($id);
        $suppliers->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the supplier!');
        return Redirect::to('suppliers');
    }
}
