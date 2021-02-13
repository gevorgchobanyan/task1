<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\StorePutRequest;
use App\Http\Requests\StoreUserPutRequest;


class UserController extends Controller
{

    public function index(){
        return view('index');
    }


    //
    public function showAll(): \Illuminate\Http\JsonResponse
    {
        return response()->json(User::retrieveJoinedRecords(), 200);
    }

    public function show($user_id): \Illuminate\Http\JsonResponse
    {

        $user = User::retrieveRecordById($user_id);
        $addresses = (new \App\Models\Address)->retrieveRecordsById($user_id);

        return response()->json([$user, $addresses], 200);

    }

    public function showAddresses($user_id): \Illuminate\Http\JsonResponse
    {

        return response()->json((new \App\Models\Address)->retrieveRecordsById($user_id), 200);

    }

    public function updateUser(StoreUserPutRequest $request, User $user): \Illuminate\Http\JsonResponse
    {
        $user->update($request->all());
        return response()->json($user, 200);

    }

    public function saveAddress(StorePostRequest $request): \Illuminate\Http\JsonResponse
    {
        $address = Address::create($request->all());
        return response()->json($address, 201);

    }


    //ISSUE
    public function updateAddress(StorePutRequest $request, Address $address): \Illuminate\Http\JsonResponse
    {
        $address->update($request->all());
        return response()->json($address, 200);

    }

    public function deleteAddress(Request $request, Address $address): \Illuminate\Http\JsonResponse
    {
        $address->delete();
        return response()->json(null, 204);

    }

}
