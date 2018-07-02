<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Store::all();
        return view('stores.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Store::create($request->all());
        session()->flash('added', 'model added successfully');
        return redirect('/admin/stores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $model = Store::with('users')->find($id);
        if($model){
            return view('stores.view', compact('model'));
        }else{
            session()->flash('error', 'store not found');
            return redirect('/admin/stores');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Store::find($id);
        if($model){
            return view('stores.edit', compact('model'));
        }else{
            session()->flash('error', 'store not found');
            return redirect('/admin/stores');
        }
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
        Store::find($id)->update($request->all());
        session()->flash('updated', 'model updated successfully');
        return redirect('/admin/stores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Store::find($id);
        if($model){
            $model->delete();
            session()->flash('delete', 'model deleted successfully');
            return redirect('/admin/stores');
        }else{
            session()->flash('error', 'store not found');
            return redirect('/admin/stores');
        }
    }

}
