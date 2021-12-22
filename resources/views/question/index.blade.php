@extends('layouts.app')
@section('content')
    <style type="text/css">
        .my-active span{
            background-color: #5cb85c !important;
            color: white !important;
            border-color: #5cb85c !important;
        }
        .question_answer_block
        {
            display: flex;
            flex-direction: column;
        }
        .answer_class
        {
            display: flex;
            justify-content: space-between;
        }
        .answer_class_items
        {
            width: 30px;
            height: 30px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6">



                @foreach($data as $key => $value)
                    <form action="{{ route('answer_create') }}" method="get">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="question_id" value="{{$data->links('vendor.pagination.custom')->paginator->currentPage()}}">
                        <input type="hidden" name="total_questions" value="{{$data->links('vendor.pagination.custom')->paginator->total()}}">
                        <input type="hidden" name="data" value="" class="data_answer">
                        <input type="hidden" name="test_id" value="{{ $value->test_id }}">
                        <input type="hidden" name="rating" value="" class="rating">

                    <div class="question_data" >
                        <div class="float-left" data-id="{{$data->links('vendor.pagination.custom')->paginator->currentPage()}}">Question : {{ $data->links('vendor.pagination.custom')->paginator->currentPage()  ."/". $data->links('vendor.pagination.custom')->paginator->total() }}</div>
                        <!--<div class="float-right"></div>-->
                        <div>
                            <h2 style="margin: 0 30%">{{$value->title}}</h2>
                            <div class="question_answer_block">
                                <div class="answer_class">
                                    <h2>{{$value->answer_1}}</h2>
                                    <input type="radio" name="answer_{{$key+1}}" class="answer_{{$key+1}} answer_class_items" value="{{$value->answer_1}}" required data-rate="2">
                                </div>

                                <div class="answer_class">
                                    <h2>{{$value->answer_2}}</h2>
                                    <input type="radio" name="answer_{{$key+1}}" class="answer_{{$key+1}} answer_class_items" value="{{$value->answer_2}}" required data-rate="3">
                                </div>

                                <div class="answer_class">
                                    <h2>{{$value->answer_3}}</h2>
                                    <input type="radio" name="answer_{{$key+1}}" class="answer_{{$key+1}} answer_class_items" value="{{$value->answer_3}}" required data-rate="4">
                                </div>

                                <div class="answer_class">
                                    <h2>{{$value->answer_4}}</h2>
                                    <input type="radio" name="answer_{{$key+1}}" class="answer_{{$key+1}} answer_class_items" value="{{$value->answer_4}}" required data-rate="5">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block col-md-12 btn-result-test" value="NEXT ">
                    </div>

                    {{--@if($data->links('vendor.pagination.custom')->paginator->currentPage() == $data->links('vendor.pagination.custom')->paginator->total() )
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success btn-block col-md-12 btn-result-test">
                    </div>
                    @endif--}}
                    <br>
                    </form>
                @endforeach
                    <div class="form-group">
                        {{ $data->links('vendor.pagination.custom') }}
                    </div>




            </div>

        </div>
    </div>

@endsection
