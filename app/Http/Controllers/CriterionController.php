<?php

namespace App\Http\Controllers;

use App\Models\Criterion;
use Illuminate\Http\Request;

class CriterionController extends Controller
{

    public function index()
    {
        $criteria = Criterion::all();
        return view('pages.criteria.index', ['criteria' => $criteria]);
    }

    public function create()
    {
        return view('pages.criteria.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'valeur' => 'required|string|max:255',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }

        $criterion = new Criterion();
        $criterion->name = $request->name;
        $criterion->description = $request->description;
        $criterion->valeur = $request->valeur;
        $criterion->save();

        return redirect()->route('criteria.index')->with('success', 'Criterion created successfully.');
    }

    public function edit($id)
    {
        $criterion = Criterion::find($id);
        return view('pages.criteria.edit', ['criterion' => $criterion]);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'valeur' => 'required|string|max:255',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }

        $criterion = Criterion::find($id);
        $criterion->name = $request->name;
        $criterion->description = $request->description;
        $criterion->valeur = $request->valeur;
        $criterion->save();

        return redirect()->route('criteria.index')->with('success', 'Criterion updated successfully.');
    }

    public function destroy($id)
    {
        $criterion = Criterion::find($id);
        $criterion->delete();

        return redirect()->route('criteria.index')->with('success', 'Criterion deleted successfully.');
    }
}
