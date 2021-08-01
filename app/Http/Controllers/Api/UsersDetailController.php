<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = UserDetail::create([
            'userId' => $request->userId,
            'email' => $request->email,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'company' => $request->company,
            'address' => $request->address,
            'apartment' => $request->apartment,
            'city' => $request->city,
            'country' => $request->country,
            'postcode' => $request->postcode,
            'phone' => $request->phone,
        ]);

        // $userDetail = UserDetail::find($id);


        return response()->json(array('success' => true, 'data' => $data), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userDetail = DB::table('user_details')->where('id', '=', $id)->first();
        return response()->json(array('success' => true, 'userDetail' => $userDetail), 200);
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
        $userDetail = UserDetail::find($id);

        $userDetail->email = $request->email;
        $userDetail->firstName = $request->firstName;
        $userDetail->lastName = $request->lastName;
        $userDetail->company = $request->company;
        $userDetail->address = $request->address;
        $userDetail->apartment = $request->apartment;
        $userDetail->city = $request->city;
        $userDetail->country = $request->country;
        $userDetail->postcode = $request->postcode;
        $userDetail->phone = $request->phone;

        $userDetail->save();

        return response()->json(array('success' => true, 'data' => $userDetail ), 200);
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
            'email' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postcode' => 'required|digits:5',
            'phone' => 'required|digits:10',
        ]);
    }
}
