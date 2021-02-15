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
        $user = User::find($user_id);
        if(is_null($user)){
            return response()->json('User record not found', 404);
        }
        $addresses = (new \App\Models\Address)->retrieveRecordsById($user_id);

        return response()->json([$user, $addresses], 200);

    }

    public function showAddresses($user_id): \Illuminate\Http\JsonResponse
    {

        return response()->json((new \App\Models\Address)->retrieveRecordsById($user_id), 200);

    }

    public function updateUser(StoreUserPutRequest $request, $user_id): \Illuminate\Http\JsonResponse
    {
        $user = User::find($user_id);
        if(is_null($user)){
            return response()->json('User record not found', 404);
        }
        $user->update($request->all());
        return response()->json($user, 200);

    }

    public function saveAddress(StorePostRequest $request): \Illuminate\Http\JsonResponse
    {
        $address = Address::create($request->all());
        return response()->json($address, 201);

    }

    public function updateAddress(StorePutRequest $request, $address_id): \Illuminate\Http\JsonResponse
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $address = Address::find($address_id);
        if(is_null($address)){
            return response()->json('Address record not found', 404);
        }
        if(is_null($user)){
            return response()->json('User with specified ID does not exist', 404);
        }
        $address->update($request->all());
        return response()->json($address, 200);


    }

    public function deleteAddress(Request $request, $address_id): \Illuminate\Http\JsonResponse
    {
        $address = Address::find($address_id);
        if(is_null($address)){
            return response()->json('Address record not found', 404);
        }
        $address->delete();
        return response()->json('record has been deleted', 204);

    }

}
