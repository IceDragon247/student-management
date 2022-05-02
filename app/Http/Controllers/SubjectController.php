<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index(Request $request){
        return view('subjects.index', ['subjects' => Subject::all()]);
    }

    public function show(Request $request, $id) {
        $subject = Subject::find($id);
        if (is_null($subject))
            abort(404);

        return view('subjects.show', ['subject' => $subject]);
    }

    public function add(Request $request) {
        return view('subjects.add', ['edit' => false, 'subject' => new Subject()]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'credits' => 'required',
        ]);

        $subject = Subject::create($validated);
        return redirect('/subjects');
    }

    public function delete(Request $request, $id) {
        $subject = Subject::find($id);
        if (is_null($subject))
            abort(404);

        $subject -> delete();
        return redirect('/subjects');
    }

    public function edit(Request $request, $id) {
        $subject = Subject::find($id);
        if (is_null($subject))
            abort(404);

        return view('subjects.add', ['edit' => true, 'subject' => $subject]);
    }

    public function update(Request $request, $id) {
        $subject = Subject::find($id);
        if (is_null($subject))
            abort(404);
        
        $validated = $request->validate([
            'name' => 'required',
            'credits' => 'required', 
        ]);
        
        $subject->fill($validated);
        $subject->save();
        return redirect('/subjects/'.$subject->id);
    }
}
