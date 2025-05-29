<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class APISiswaController extends Controller
{
	/**
 	* Display a listing of the resource.
 	*/
	public function index()
	{
    	$siswa = Siswa::get();
    	return response()->json($siswa, 200);
	}

	/**
 	* Store a newly created resource in storage.
 	*/
	public function store(Request $request)
	{
    	$validated = $request->validate([
        	'nama' => 'required|string|max:255',
        	'nis' => 'required|string|max:20|unique:siswa,nis',
        	'gender' => 'required|in:L,P',
        	'alamat' => 'required|string|max:255',
        	'kontak' => 'required|string|max:15',
        	'email' => 'required|email|max:255|unique:siswa,email',
        	'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        	'status_lapor_pkl' => 'required|boolean',
        	'is_approved' => 'required|boolean',
        	'tanggal_lahir' => 'required|date',
    	]);

    	$siswa = Siswa::create($validated);

    	return response()->json($siswa, 201);
	}

	/**
 	* Display the specified resource.
 	*/
	public function show(string $id)
	{
    	$siswa = Siswa::find($id);
    	if (!$siswa) {
        	return response()->json(['message' => 'Siswa not found'], 404);
    	}
    	return response()->json($siswa, 200);
	}

	/**
 	* Update the specified resource in storage.
 	*/
	public function update(Request $request, string $id)
	{
    	$siswa = Siswa::find($id);
    	if (!$siswa) {
        	return response()->json(['message' => 'Siswa not found'], 404);
    	}

    	$validated = $request->validate([
        	'nama' => 'sometimes|required|string|max:255',
        	'nis' => 'required|string|max:255',
        	'gender' => 'sometimes|required|in:L,P',
        	'alamat' => 'sometimes|required|string|max:255',
        	'kontak' => 'sometimes|required|string|max:15',
        	'email' => 'sometimes|required|email|max:255|unique:siswa,email,' . $siswa->id,
        	'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        	'status_lapor_pkl' => 'sometimes|required|boolean',
        	'is_approved' => 'sometimes|required|boolean',
        	'tanggal_lahir' => 'sometimes|required|date',
    	]);
    	$siswa->update($validated);
    	return response()->json($siswa, 200);
	}

	/**
 	* Remove the specified resource from storage.
 	*/
	public function destroy(string $id)
	{
    	$siswa = Siswa::find($id);
    	if (!$siswa) {
        	return response()->json(['message' => 'Siswa not found'], 404);
    	}

    	$siswa->delete();
    	return response()->json(['message' => 'Siswa deleted successfully'], 200);
	}
}