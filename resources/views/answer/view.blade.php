@extends('layouts.app')

@section('content')
<h4>{{ $survey->title }}</h4>
<table class="bordered striped" style="border:1px solid red">
  <thead>
    <tr>
        <th data-field="id">Question</th>
        <th data-field="name">Answer(s)</th>
    </tr>
  </thead>

  <tbody>
    @forelse ($survey->questions as $item)
    <tr style="border:1px solid red">
      <td  style="border:1px solid red">{{ $item->title }}</td>
      @foreach ($item->answers as $answer)
        <td  style="border:1px solid red">{{ $answer->answer }} <br/>
       </td>
      @endforeach
    </tr>
    @empty
      <tr>
        <td>
          No answers provided by you for this Survey
        </td>
        <td></td>
      </tr>
    @endforelse
  </tbody>
</table>
@endsection
