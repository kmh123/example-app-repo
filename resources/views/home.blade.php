@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

               
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <ul class="collection with-header">
        <li class="collection-header">
            <h2 class="flow-text">Recent Surveys
                {{-- <span style="float:right;">{{ link_to_route('new.survey', 'Create new') }}
                </span> --}}

                <a href="{{ url("/survey/new") }}" class="close">
                    Create new
                    </a>
            </h2>
        </li>
        @forelse ($surveys ?? '' as $survey)
          <li class="collection-item">
            <div>
                {{-- {{ link_to_route('detail.survey', $survey->title, ['id'=>$survey->id])}} --}}
                <a href="survey/view/{{ $survey->id }}" title="Take Survey" class="secondary-content"><i class="material-icons">send</i></a>
                <a href="survey/{{ $survey->id }}" title="Edit Survey" class="secondary-content"><i class="material-icons">edit</i></a>
                <a href="survey/answers/{{ $survey->id }}" title="View Survey Answers" class="secondary-content"><i class="material-icons">textsms</i></a>
            </div>
            </li>
        @empty
            <p class="flow-text center-align">Nothing to show</p>
        @endforelse
        </ul>
</div>
@endsection
