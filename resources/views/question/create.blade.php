@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Questions') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('question_store') }}">
                            @csrf
                            <input type="hidden" name="test_id" value="{{ $id }}">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Question title') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Answer 1') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control answer_1" name="answer_1" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Answer 2') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control answer_2" name="answer_2" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Answer 3') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control answer_3" name="answer_3" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Answer 4') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control answer_4" name="answer_4" required>
                                </div>
                            </div>

<!--                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Correct answer') }}</label>

                                <div class="col-md-6">
                                    <select name="correct_answer" class="form-control correct_answer">
                                        <option value="answers" disabled selected></option>
                                    </select>
                                </div>
                            </div>-->

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('CREATE') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
