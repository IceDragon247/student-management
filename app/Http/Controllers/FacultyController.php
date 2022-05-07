<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index(Request $request){
        return view('faculties.index', ['faculties' => Faculty::all()]);
    }

    public function show(Request $request, $id) {
        $faculty = Faculty::find($id);
        if (is_null($faculty))
            abort(404);

        return view('faculties.show', ['faculty' => $faculty]);
    }

    public function add(Request $request) {
        return view('faculties.add', ['edit' => false, 'faculty' => new Faculty()]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $faculty = Faculty::create($validated);
        return redirect('/faculties');
    }

    public function delete(Request $request, $id) {
        $faculty = Faculty::find($id);
        if (is_null($faculty))
            abort(404);

        $faculty -> delete();
        return redirect('/faculties');
    }

    public function edit(Request $request, $id) {
        $faculty = Faculty::find($id);
        if (is_null($faculty))
            abort(404);

        return view('faculties.add', ['edit' => true, 'faculty' => $faculty]);
    }

    public function update(Request $request, $id) {
        $faculty = Faculty::find($id);
        if (is_null($faculty))
            abort(404);
        
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required', 
        ]);
        
        $faculty->fill($validated);
        $faculty->save();
        return redirect('/faculties/'.$faculty->id);
    }
}
