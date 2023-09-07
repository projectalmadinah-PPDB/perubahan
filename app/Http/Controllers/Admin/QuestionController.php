<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $question = Question::get();
        return view('pages.admin.dashboard.question.index',compact('question'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);
        $data['active'] = 'on';

        Question::create($data);

        return redirect()->route('admin.question.index');
    }

    public function active(Request $request,$id)
    {
        $question = Question::find($id);
        $data = $request->validate([
            'active' => 'required'
        ]);

        if($question->active == 'off')
        {
            $data['active'] == 'on';
            $question->update($data);
        }else
        {
            $data['active'] == 'off';
            $question->update($data);
        }

        return redirect()->route('admin.question.index');
    }
}
