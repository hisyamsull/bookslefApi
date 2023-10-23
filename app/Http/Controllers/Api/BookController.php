<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Js;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = book::orderBy('judul', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data Found',
            'data'=> $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $databook = new book;
        $rules = [
            'judul'=> 'required',
            'pengarang'=> 'required',
            'publikasi'=> 'required|date',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json([
                'status'=> false,
                'message'=> 'Bad request',
                'data' => $validator->errors()
            ], 400);
        }
        $databook->judul = $request->judul;
        $databook->pengarang = $request->pengarang;
        $databook->publikasi = $request->publikasi;

        $databook->save();

        return response()->json([
            'status' => true,
            'message' => 'succes create data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = book::find($id);
        if($data){
            return response()->json([
                'status' => true,
                'message' => 'Data Found',
                'data' => $data
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Not Found',
            ],404 );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $databook = book::find($id);
        if(empty($databook)){
            return response([
                'status' => false,
                'message'=> 'bad resuest'
            ], 404);
        }
        $rules = [
            'judul'=> 'required',
            'pengarang'=> 'required',
            'publikasi'=> 'required|date',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json([
                'status'=> false,
                'message'=> 'Bad request',
                'data' => $validator->errors()
            ], 400);
        }
        $databook->judul = $request->judul;
        $databook->pengarang = $request->pengarang;
        $databook->publikasi = $request->publikasi;

        $databook->save();

        return response()->json([
            'status' => true,
            'message' => 'succes update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $databook = book::find($id);
        if(empty($databook)){
            return response([
                'status' => false,
                'message'=> 'bad resuest'
            ], 404);
        };
        $databook->delete();

        return response()->json([
            'status' => true,
            'message' => 'succes delete'
        ]);
    }
}
