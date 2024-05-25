<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerSupport;

class CustomerSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerSupports = CustomerSupport::all();
        return view('customer_supports.index', compact('customerSupports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer_supports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CustomerSupport::create($request->all());
        return redirect()->route('customer_supports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customerSupport = CustomerSupport::findOrFail($id);
        return view('customer_supports.show', compact('customerSupport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customerSupport = CustomerSupport::findOrFail($id);
        return view('customer_supports.edit', compact('customerSupport'));
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
        $customerSupport = CustomerSupport::findOrFail($id);
        $customerSupport->update($request->all());
        return redirect()->route('customer_supports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerSupport = CustomerSupport::findOrFail($id);
        $customerSupport->delete();
        return redirect()->route('customer_supports.index');
    }
}
