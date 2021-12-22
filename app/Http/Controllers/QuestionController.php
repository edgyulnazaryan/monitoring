<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\Test;
use App\Models\UserTest;
use App\Models\UserTestSubmitted;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request, $id)
    {
        $data = Question::where('test_id', $id)->paginate(1);
        return view('question.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        return view('question.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Question::create($data);
        return redirect()->route('test');
    }

    public function answer_create(Request $request) {
        $data = $request->all();
        UserTest::create($data);
        /*$data_test = [
            'test_id' => $request->test_id,
            'user_id' => $request->user_id,
            'rate'    => $request->rating,
        ];*/

//        UserTestSubmitted::create($data_test);
        $page = $request->question_id+1;
        if ($page <= $request->total_questions)
            return redirect("test/show/".$request->test_id."?page=".$page)->with('Message');
        else
            return redirect()->route('test');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
