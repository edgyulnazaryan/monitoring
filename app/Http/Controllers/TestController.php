<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Test;
use App\Models\User;
use App\Models\UserTest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data = Test::all()->pluck('id')->toArray();
        $res = UserTest::where('user_id', Auth::user()->id)->get();

        if (count($res)) {
            $avg_rate = 0;
            $count = 0;
            foreach ($data as $value) {
                foreach ($res as $key => $val) {
                    if ($value == $val->test_id) {
                        $count += 1;
                        $avg_rate += $val->rating;
                        $rate[$value] = $avg_rate / $count;
                    }
                }
                $avg_rate = 0;
                $count = 0;
            }
        }
        else
        {
            $rate = 0;
        }
        $data = Test::all();
        return view('test.index', compact('data', 'rate'));


//        $res = array_unique($res);


    }

    public function home_test()
    {
        $data = Test::all();
        return view('welcome', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('test.create');
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
        $query = Test::create($data);
        return redirect()->route('question_create', $query->id);
    }

    public function monitoring()
    {
        $users = User::all()->pluck('id')->toArray();
        $data = Test::with('question', 'user_test')->get();

        foreach ($data as $dt )
        {
            $query[] = $dt->user_test->pluck('test_id', 'user_id')->toArray();
            /*foreach ($dt->user_test as $ut)
            {
                $query = $ut->pluck('user_id')->toArray();
            }*/
        }


        return view('test.monitoring', compact('data', 'query'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data = Question::where('test_id', $id)->get();
        return view('test.show', compact('data'));
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
