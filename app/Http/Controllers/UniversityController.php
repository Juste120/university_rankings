<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = DB::table('universities')->get();
        return view('pages.university.index', ['universities' => $universities]);
    }
    public function create()
    {
        return view('pages.university.create');
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'localisation' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'image' => 'required|image|max:5242880',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }

        $imagePath = $request->file('image')->store('public/university_images');
        $imageName = basename($imagePath);

        $university = new University();
        $university->name = $request->name;
        $university->localisation = $request->localisation;
        $university->description = $request->description;
        $university->image = $imageName;
        $university->save();

        return redirect()->route('universities.index')->with('success', 'University created successfully.');
    }
    public function edit($id)
    {
        $university = University::find($id);
        return view('pages.university.edit', ['university' => $university]);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'localisation' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'image' => 'image|max:5242880',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }

        $university = University::find($id);
        $university->name = $request->name;
        $university->localisation = $request->localisation;
        $university->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/university_images');
            $imageName = basename($imagePath);
            $university->image = $imageName;
        }

        $university->save();

        return redirect()->route('universities.index')->with('success', 'University updated successfully.');
    }

    public function destroy($id)
    {
        $university = University::find($id);
        $university->delete();

        return redirect()->route('universities.index')->with('success', 'University deleted successfully.');
    }






}
