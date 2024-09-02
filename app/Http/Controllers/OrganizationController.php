<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Rules\UniqueOrg;

class OrganizationController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(){
	
		$queryset = Organization::all();
		return view('organization.index', compact('queryset'));
	}
	
	public function create(){
		return view('organization.create');
	}
	
	public function store(Request $request){
			
		$request->validate([
			'organization_name'=>'required',
			'organization_code'=>['required', new UniqueOrg],
		]);
		Organization::create($request->all());

		return redirect()->route('organization.index')->with('success', 'Organization created successfully');
		
	}

	public function edit($organizationId){
		$organization = Organization::findOrFail($organizationId);
		return view('organization.edit', compact('organization'));
	}
	// TODO cari tau kenapa gabisa di parsing dengan object??
	public function update(Request $request, $organizationId){
		$request->validate([
			'organization_name'=>'required',
			'organization_code'=>['required', new UniqueOrg($organizationId)],
		]);
		$organization = Organization::findOrFail($organizationId);
		$organization->update($request->all());
		return redirect()->route('organization.index')->with('success', 'Organization updated successfully');
	}

	public function destroy($organizationId){
		$organization = Organization::findOrFail($organizationId);
		$organization->delete();
		return redirect()->route('organization.index')->with('success', 'Organization deleted successfully');
	}
	
}
