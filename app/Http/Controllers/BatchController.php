<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Faculty;

class BatchController extends Controller
{
    public function index(Request $request){
        return view('batches.index', ['batches' => Batch::all()]);
    }

    public function show(Request $request, $id) {
        $batch = Batch::find($id);
        if (is_null($batch))
            abort(404);

        return view('batches.show', ['batch' => $batch]);
    }

    public function add(Request $request) {
        return view('batches.add', ['edit' => false, 'batch' => new Batch(), 'faculty' => Faculty::all()]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'faculty_id' => 'required|exists:faculties,id',
        ]);

        $batch = Batch::create($validated);
        return redirect('/batches');
    }

    public function delete(Request $request, $id) {
        $batch = Batch::find($id);
        if (is_null($batch))
            abort(404);

        $batch -> delete();
        return redirect('/batches');
    }

    public function edit(Request $request, $id) {
        $batch = Batch::find($id);
        if (is_null($batch))
            abort(404);

        return view('batches.add', ['edit' => true, 'batch' => $batch, 'faculty' => Faculty::all()]);
    }

    public function update(Request $request, $id) {
        $batch = Batch::find($id);
        if (is_null($batch))
            abort(404);
        
        $validated = $request->validate([
            'name' => 'required',
            'faculty_id' => 'required|exists:faculties,id', 
        ]);
        
        $batch->fill($validated);
        $batch->save();
        return redirect('/subjects/'.$batch->id);
    }
}
