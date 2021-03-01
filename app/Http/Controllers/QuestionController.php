<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
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
    public function store(StoreQuestionRequest $request)
    {
//        print_r($request->all());exit;
        $validated = $request->validated();
        Question::create($request->all());
        return redirect()->route('question.list');

    }
    public function edit(Request $request, Question $question)
    {
        // $record = Question::find($id);
        return view('question.edit', ['record' => $question]);
    }
    public function update(Request $request, Question $question)
    {
        $question->update([
            'detail' => $request->get('detail'),
            'type' => $request->get('type')
        ]);
        return redirect('question/list');
    }
    public function delete(Request $request, Question $question)
    {
        $question->delete();
        return redirect('question/list');
    }
}
