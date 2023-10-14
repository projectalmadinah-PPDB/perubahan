<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $question = Question::orderby('id','desc')->get();
        return view('pages.admin.dashboard.question.index',compact('question'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'question' => 'required',
            'answer' => ''
        ]);
        $data['active'] = 'off';

        Question::create($data);

        return redirect()->route('admin.question.index')->with('success','Berhasil Membuat Pertanyaan Dan Jawaban');
    }

    public function jawab(Request $request,$id)
    {
        $jawab = Question::find($id);
        $data = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $jawab->update($data);

        return redirect()->route('admin.question.index')->with('success','Berhasil mengubah data');
    }

    public function active(Request $request,$id)
    {
        $question = Question::find($id);
        $data = $request->validate([
            'active' => 'required'
        ]);

        if(!$question->answer){
            return redirect()->route('admin.question.index')->with('delete',"Wajib memiliki jawaban jika ingin diaktifkan");
        }else{
            if($question->active == 'off')
            {
                $data['active'] == 'on';
                $question->update($data);
            }else
            {
                $data['active'] == 'off';
                $question->update($data);
            }
            return redirect()->route('admin.question.index')->with('success',"Berhasil mengganti status");
        }

    }

    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();

        return redirect()->route('admin.question.index')->with('delete','Berhasil menghapus pertanyaan');
    }
}
