@extends('layouts.app')
@section('content')
<style>
    .checked
    {
        color: #880000;
    }
</style>
<div class="container">

    <a href="{{ route('test_create') }}" class="btn float-right"><span class="p-2 mb-2 bg-info text-white"><i class="fa fa-plus" aria-hidden="true"></i> CREATE NEW TEST </span></a>

    <div class="bg-gray-100 dark:bg-gray-900 " style="
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
">


            @foreach($data as $key => $value)
            <div class="card mt-3 mb-3" style="width:100%; border: 1px solid #a0aec0; margin: 0px 10px; flex : 0 0 26%;">
                <img src="https://cdn3.iconfinder.com/data/icons/flat-seo-part-2/1000/Social_Media_Marketing-512.png" class="card-img-top" style="width: 150px; margin:0 25%">
                <div class="card-body">
                    <h2 class="card-title" style="color: #2779bd; text-align: center">{{$value->title}}</h2>

                    <p class="card-text" style="color: #2779bd; padding: 0px 10px;">
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <p class="card-text" style="padding: 0px 10px;">
                    @if(isset($rate[$value->id]))
                        @for($i=1; $i<=5; $i++)
                            @if($i <= $rate[$value->id])
                                <span class="fa fa-star checked"></span>
                            @else
                                <span class="fa fa-star"></span>
                            @endif
                        @endfor
                    @else
                        <p>{{ 'You are not passed '.$value->title  }}</p>
                    @endif
                    </p>
                    <div id="{{ Auth::user()->id ? Auth::user()->id : 0 }}">
                        <a href="{{ route('test_item', $value->id) }}" class="btn">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                        @if(Auth::user()->id === 1)
                        <a href="{{ route('question_create', $value->id) }}" class="btn">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            @endforeach

    </div>
</div>
@endsection
