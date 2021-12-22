<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>

    <style>
        .checked
        {
            color: #880000;
        }
    </style>
    <div class="container">
            @if (Route::has('login'))
                <div class="hidden  top-0 left-0 px-6 py-4 sm:block">
                    @auth

                        <a href="{{ url('/test') }}" class="btn btn-success">Tests</a>
                        <a href="{{ url('/send-mail') }}" class="btn btn-success">Subscribe <i class="fa fa-envelope" aria-hidden="true"></i></a>
                        @if(Auth::user()->name == 'admin')
                            <a href="{{ route('test_create') }}" class="btn btn-success">New Test <i class="fa fa-plus" aria-hidden="true"></i></a>
                        @endif
                        <a href="{{ route('monitoring') }}" class="btn btn-dark">Test Monitoring <i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                        <a class="btn btn-secondary" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 btn btn-primary">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        <div class="bg-gray-100 dark:bg-gray-900 row " style="
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
">
            @foreach($data as $key => $value)
                    <div class="card mt-3 mb-3 colo-md-4" style="width:100%; border: 1px solid #a0aec0; margin: 0px 10px; flex : 0 0 26%;">
                        <a href={{ route('test_item', $value->id) }} style="text-decoration:none">
                        <img src="https://cdn3.iconfinder.com/data/icons/flat-seo-part-2/1000/Social_Media_Marketing-512.png" class="card-img-top" style="width: 150px; margin:0 25%">
                        <div class="card-body">
                            <h2 class="card-title" style="color: #2779bd; text-align: center">{{$value->title}}</h2>

                            <p class="card-text" style="color: #2779bd; padding: 0px 10px;">
                                Some quick example text to build on the card title and make up the bulk of the card's content.
                            </p>
                        </div>
                        </a>
                    </div>

            @endforeach
        </div>
    </div>

</body>
</html>
