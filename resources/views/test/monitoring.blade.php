@extends('layouts.app')
@section('content')
<style>
    .checked
    {
        color: #880000;
    }
</style>
<div class="container">

    <div class="row bg-gray-100 dark:bg-gray-900 ">


            @foreach($data as $key => $value)
                <div class="card mt-3 mb-3 col-md-5" style="border: 1px solid #a0aec0; margin: 0px 10px; ">
                    <img src="https://theolivebook.com/wp-content/uploads/2020/04/improve-act-sat-score.jpg"  class="card-img-top" style="width: 100%; height: 200px; margin:10px 0">
                    <div class="card-body">
                        <h2 class="card-title" style="color: #2779bd; text-align: center">{{$value->title}}</h2>

                        <p class="card-text" style="color: #2779bd; padding: 0px 10px;">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>

                    </div>

                </div>

                <div class="card mt-3 mb-3 col-md-5" style="border: 1px solid #a0aec0; margin: 0px 10px; ">
                    <h2>Questions</h2>
                    <ul>
                    @if(count($value->question))
                        @foreach($value->question as $question)
                        <li>{{ $question->title }}</li>
                        @endforeach
                    @else
                        <h5>You are not create questions for this test</h5>
                    @endif
                    </ul>

                    @if(count($value->user_test))
                        <?php $rate = 0 ?>
                        @foreach($value->user_test as $uid => $utest)
                            <?php $rate += $utest->rating ?>
                        @endforeach

                        <div><h2>Rate :
                        @for($i = 1; $i<= 5; $i++)
                            @if($i <= $rate/count($value->user_test) )
                                    <span class="fa fa-star checked"></span>
                            @else
                                <span class="fa fa-star"></span>
                            @endif
                        @endfor
                            </h2>
                        </div>
                    @else
                        <h5>You are not passed this test</h5>
                    @endif


                    <?php $i = 0; ?>
                    @foreach($query as $users_array)
                        @if(count($users_array)>0)
                            @foreach($users_array as $u_key => $u_id)
                                @if($value->id == $u_id)
                                    <?php $i += 1; ?>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    <h2>Persons count : {{ $i; }}</h2>

{{--                    <h2>Persons count : {{ count(array_unique($users)) }}</h2>--}}

                </div>
            @endforeach


        </div>
    </div>
@endsection
