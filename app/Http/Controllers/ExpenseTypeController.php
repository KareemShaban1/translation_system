<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $expense_types = ExpenseType::all();

        return view('backend2.pages.expense_type.index',compact('expense_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend2.pages.expense_type.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        ExpenseType::create($validatedData);

        return redirect()->route('expense_types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $expense_type = ExpenseType::findOrFail($id);

        return view('backend2.pages.expense_type.edit',compact('expense_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $expense_type = ExpenseType::findOrFail($id);
        $expense_type->update($validatedData);

        return redirect()->route('expense_types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $expense_type = ExpenseType::findOrFail($id);
        $expense_type->delete();

        return redirect()->route('expense_types.index');
    }
}