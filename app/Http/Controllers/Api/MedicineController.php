<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $medicines = Medicine::paginate(5);
        if($medicines){
            return response()->json($medicines);
        }else{
            return response()->json(['message' => 'Not Found!'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'active_ingredient_id' => 'required|integer',
            'manufacturer_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:150',
            'slug' => 'required|string|max:150',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 404);
        }
        $medicine = new Medicine();
        $medicine->active_ingredient_id = $request->active_ingredient_id;
        $medicine->manufacturer_id = $request->manufacturer_id;
        $medicine->name = $request->name;
        $medicine->short_name = $request->short_name;
        $medicine->slug = $request->slug;
        $medicine->save();
        return response()->json($medicine);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $medicine = Medicine::with('manufacturer', 'active_ingredient', 'categories', 'attachments', 'descriptions', 'metas')->find($id);
        if($medicine){
            return response()->json($medicine);
        }else{
            return response()->json(['message' => 'Not Found!'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $medicine = Medicine::find($id);
        if($medicine) {
            $validator = Validator::make($request->all(), [
                'active_ingredient_id' => 'required|integer',
                'manufacturer_id' => 'required|integer',
                'name' => 'required|string|max:255',
                'short_name' => 'required|string|max:150',
                'slug' => 'required|string|max:150',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 404);
            }
            $medicine->active_ingredient_id = $request->active_ingredient_id;
            $medicine->manufacturer_id = $request->manufacturer_id;
            $medicine->name = $request->name;
            $medicine->short_name = $request->short_name;
            $medicine->slug = $request->slug;
            $medicine->save();
            return response()->json(array_merge($request->all(), ['updated' => true]));
        }else{
            return response()->json(['message' => 'Not Found!'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $medicine = Medicine::find($id);
        if($medicine){
            $medicine->delete();
            return response()->json(['deleted' => true]);
        }else{
            return response()->json(['message' => 'Not Found!'], 404);
        }
    }
}
