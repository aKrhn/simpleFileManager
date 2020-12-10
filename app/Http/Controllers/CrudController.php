<?php

namespace App\Http\Controllers;
use App\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = Crud::latest()->paginate(5);
		return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,	[
				'file_name' => 'required',
				'description' => 'required', 
				'file' => 'required',  
			]
		);
		$file = $request->file('file');
		$new_name = rand(). '.' . $file->getClientOriginalExtension();
		$file->move(public_path('images'), $new_name); //storage_path
		$formData = array(
			'file_name' => $request->file_name,
			'description' => $request->description,
			'file' => $new_name,
		);

		Crud::create($formData);
		return redirect('crud')->with('success', 'File added successfully!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$data = Crud::findOrFail($id);
		return view('view', compact('data'));
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
		//
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
}
