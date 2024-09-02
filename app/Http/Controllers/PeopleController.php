<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Organization;


class PeopleController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(){

		$queryset = People::all();
        $person = People::all();
		return view('people.index', compact('queryset', 'person'));
	}

	public function create(){
		$organizations = Organization::all();
		return view('people.create', compact('organizations'));
	}

	public function store(Request $request){
		// dd($request);
		$request->validate([
			'employee_number'=>'required',
			'employee_name'=>'required',
			'organization_id' => 'required|exists:organizations,id',
			'legal_address'=>'required',
			'domicile_address'=>'required',
		]);
		People::create($request->all());

		return redirect()->route('people.index')->with('success', 'People created successfully');

	}

	public function edit($personId){
		$person = People::findOrFail($personId);

		$organizations = Organization::all();
		return view('people.edit', compact('person', 'organizations'));
	}
	// TODO cari tau kenapa gabisa di parsing dengan object??
	public function update(Request $request, $personId){
		$request->validate([
			'employee_number'=>'required',
			'employee_name'=>'required',
			'organization_id' => 'required|exists:organizations,id',
			'legal_address'=>'required',
			'domicile_address'=>'required',
		]);
		$people = People::findOrFail($personId);
		$people->update($request->all());
		return redirect()->route('people.index')->with('success', 'People updated successfully');
	}

	public function destroy($personId){
		$people = People::findOrFail($personId);
		$people->delete();
		return redirect()->route('people.index')->with('success', 'People deleted successfully');
	}

}
