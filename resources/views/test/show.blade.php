@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-10">
{{--                <a href="{{ route('test_create') }}" class="btn float-right"><i class="fa fa-plus" aria-hidden="true"></i></a>--}}

                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>QUESTION TITLE</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($data as $value)
                        <tr >
                            <td>{{$value->id}}</td>
                            <td>{{$value->title}}</td>
                            <td>
                                <a href="{{ route('questions_item', $value->id) }}" class="btn">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>

        </div>
    </div>

@endsection
