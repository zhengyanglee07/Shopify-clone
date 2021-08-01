<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ProductResource::collection(Product::paginate(5));
         }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new ProductResource(Product::create([
            'storeId' => $request->storeId,
            'title' =>  $request->title,
            'description' => $request->description,
            'media' => $request->media,
            'price' => $request->price,
            'compareAtPrice' => $request->compareAtPrice,
            'costPerItem' => $request->costPerItem,
            'chargeTax' => $request->chargeTax,
            'sku' => $request->sku,
            'barcode' => $request->barcode,
            'available' => $request->available,
            'physicalProduct' => $request->physicalProduct,
            'weight' => $request->weight,
            'weightUnit' => $request->weightUnit,
            'country' => $request->country,
            'hsCode' => $request->hsCode,
            'variants' => $request->variants,
            'pageTitle' => $request->pageTitle,
            'pageDescription' => $request->pageDescription,
            'pageUrl' => $request->pageUrl,
            'status' => $request->status,
            'onlineStore' => $request->onlineStore,
            'availableTime' => $request->availableTime,
            'productType' => $request->productType,
            'vendor' => $request->vendor,
            'collections' => $request->collections,
            'tags' => $request->tags,
            'themeTemplate' => $request->themeTemplate,
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($storeId)
    {
        // return response()->json(array('success' => true, 'storeId' => $store->id), 200);
        // return new ProductResource($product);
        return ProductResource::collection(Product::all()->where('storeId', '=', $storeId));
    }

    public function getProduct($id){

        $product = DB::table('products')->find($id);
        return response()->json(array('success' => true, 'product' => $product), 200);
    }

    public function search($storeId, $id)
    {
        // return ProductResource::collection(Product::where('storeId', '=', $storeId)->where('id','=',$id));
        $product = DB::table('products')->where('storeId', '=', $storeId)->where('id', '=', $id)->first();
        return response()->json(array('success' => true, 'product' => $product), 200);
    }

    public function countProduct($id)
    {
        // return response()->json(array('success' => true, 'storeId' => $store->id), 200);
        // return new ProductResource($product);
        // return ProductResource::collection(Product::all()->where('storeId',$product->storeId));

        $count = DB::table('products')->where('storeId', '=', $id)->count();
        return response()->json(array('success' => true, 'count' => $count), 200);
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
    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'storeId'  => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'media' => 'nullable',
            'price' => 'nullable',
            'compareAtPrice' => 'nullable',
            'costPerItem' => 'nullable',
            'chargeTax' => 'nullable',
            'sku' => 'nullable',
            'barcode' => 'nullable',
            'available' => 'nullable',
            'physicalProduct' => 'nullable',
            'weight' => 'nullable',
            'weightUnit' => 'nullable',
            'country' => 'nullable',
            'hsCode' => 'nullable',
            'variants' => 'nullable',
            'pageTitle' => 'nullable',
            'pageDescription' => 'nullable',
            'pageUrl' => 'nullable',
            'status' => 'nullable',
            'onlineStore' => 'nullable',
            'availableTime' => 'nullable',
            'productType' => 'nullable',
            'vendor' => 'nullable',
            'collections' => 'nullable',
            'tags' => 'nullable',
            'themeTemplate' => 'nullable',
        ]);
        $product->update($data);

        return response()->json(array('success' => true, 'pid' => $product->id), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response(null, 204);
    }

    public function validator(Request $request)
    {
        $request->validate([
            'title'  => 'required',
        ]);

        // $data = $request->validate([
        //     'storeId'  => 'required',
        //     'title' => 'nullable',
        //     'description',
        //     'media',
        //     'price',
        //     'compareAtPrice',
        //     'costPerItem',
        //     'chargeTax',
        //     'sku',
        //     'barcode',
        //     'available',
        //     'physicalProduct',
        //     'weight',
        //     'weightUnit',
        //     'country',
        //     'hsCode',
        //     'variants',
        //     'pageTitle',
        //     'pageDescription',
        //     'pageUrl',
        //     'status',
        //     'onlineStore',
        //     'availableTime',
        //     'productType',
        //     'vendor',
        //     'collections',
        //     'tags',
        //     'themeTemplate',
        // ]);
    }
}
