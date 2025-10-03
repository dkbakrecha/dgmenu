<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');

        $questions = Question::select('*')->orderBy('id', 'desc');

        if(!empty($request->filter)){
            $searchFields = ['question'];
            //$searchFields = ['title','content','author_name','category_name'];
            $questions->where(function($query) use($request, $searchFields){
                $searchWildcard = '%' . $request->filter . '%';
                foreach($searchFields as $field){
                $query->orWhere($field, 'LIKE', $searchWildcard);
                }
            });
        }

        $questions = $questions->paginate(10)
                        ->withQueryString();

        return view('admin.questions.index', compact('questions', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question();
        $questionData = $request->all();
        $questionData['sub_category_id'] = ($request->sub_category_id)?$request->sub_category_id:0;
        //dd($questionData);
        $question = Question::create($questionData);


        return redirect()->route('questions.index')->with('message', 'Questions created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updates(Request $request, $id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // the update method, only fire its events when the update happens directly on the model,
        // so we will use save directly on modal instead of mass assignment
        $question = Question::findOrFail($id);
        $question->question = $request->question;
        $question->option1 = $request->option1;
        $question->option2 = $request->option2;
        $question->option3 = $request->option3;
        $question->option4 = $request->option4;
        $question->correct_option = $request->correct_option;
        $question->category_id = ($request->category_id)?$request->category_id:0;
        $question->sub_category_id = ($request->sub_category_id)?$request->sub_category_id:0;
      
        $question->save();
        
        return redirect()->route('questions.index')->with('message', 'Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->route('questions.index')->with('message', 'Question deleted successfully');
    }
}
