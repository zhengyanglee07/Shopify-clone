<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StoreResource;
use Illuminate\Support\Facades\DB;
use App\Models\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'userId' => 'required',
            'storeName' => 'required|min:4|max:255',
        ]);

        $store = Store::create([
            'userId' => $data['userId'],
            'storeName' => $data['storeName'],
        ]);
        
        return response()->json(array('success' => true, 'storeId' => $store->id), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = DB::table('stores')->where('userId', $id)->first();
        return response()->json(array('success' => true, 'store' => $store), 200);

        // return new StoreResource($store);
    }

    public function getStoreId($storeName)
    {
        $store = DB::table('stores')->where('storeName', $storeName)->first();
        return response()->json(array('success' => true, 'store' => $store), 200);

        // return new StoreResource($store);
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
    public function update(Store $store, Request $request)
    {
        $data = $request->validate([
            'selling' => 'required',
            'revenue' => 'required',
            'industry' => 'required',
            'forClient' => 'required',
        ]);

        $store->update($data);

        return response()->json(array('success' => true, 'storeId' => $store->id), 200);
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

    public function validator(Request $request)
    {
        $data = $request->validate([
            'storeName' => 'required|min:4|unique:stores',
        ]);
    }
}
