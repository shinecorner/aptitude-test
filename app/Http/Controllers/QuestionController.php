<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Question;

class QuestionController extends Controller
{
    public function list(Request $request)
    {
        $records = Question::all();
        return view('question.list', compact('records'));
    }
    public function insert()
    {
        return view('question.insert');
    }
    public function store(Request $request)
    {
//        print_r($request->all());exit;
        Question::create($request->all());
        return redirect()->route('question.list');

    }
    public function edit(Request $request, $id)
    {
        $record = Question::find($id);
        return view('question.edit', compact('record'));
    }
    public function update(Request $request, $id)
    {
        Question::find($id)->update([
            'detail' => $request->get('detail'),
            'type' => $request->get('type')
        ]);
        return redirect('question/list');
    }
    public function delete(Request $request, $id)
    {
        Question::where('id', $id)->delete();
        return redirect('question/list');
    }
}
