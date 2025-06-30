<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FieldRequest;
use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Field::sort('asc')->get();

        return view('pages.admin.fields.index', [
            'fields' => $fields,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.fields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FieldRequest $request)
    {
        $data = [
            'name' => $request->name
        ];

        Field::create($data);
        
        return redirect()->route('admin.fields.index')
                         ->with('success', 'New field created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $field = Field::find($id);
        if(empty($field)) {
            abort(404);
        }

        return view('pages.admin.fields.edit', [
            'field' => $field,
        ]);     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FieldRequest $request, $id)
    {
        $field = Field::find($id);
        if(empty($field)) {
            abort(404);
        }

        $data = [
            'name' => $request->name
        ];

        $field->update($data);

        return redirect()->route('admin.fields.index')
                         ->with('success', 'Field updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $field = Field::find($id);
        if(empty($field)) {
            abort(404);
        }
        
        $field->delete();               

        return redirect()->route('admin.fields.index')
                         ->with('success', 'Field deleted successfully');
    }
}
