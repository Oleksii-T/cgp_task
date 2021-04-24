<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->paginate(7);
        return view('company.companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $input = $request->validated();
        $c = new Company($input);
        $c->save();
        if ($input['clients'] != '') {
            $c->clients()->attach( array_unique(explode(', ', $input['clients'])) );
        }
        return redirect(route('company.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $c = Company::findOrFail($id);
        return view('company.edit', compact('c'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $c = Company::findOrFail($id);
        $input = $request->validated();
        $c->update($input);
        $c->clients()->detach();
        $c->clients()->attach( array_unique(explode(', ', $input['clients'])) );
        return redirect(route('company.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = Company::findOrFail($id);
        $c->delete();
        return redirect(route('company.index'));
    }
}
