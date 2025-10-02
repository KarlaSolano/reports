@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <h1>Report {{$report->id}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col" style="display:flex; flex-direction:row;justify-content: end; gap:10px;">
                <a class="btn btn-secondary mb-2" href="/expenses">Back</a>
                <a class="btn btn-primary mb-2" href="/expenses/{{$report->id}}/confirmSendEmail">Send Email</a>
            </div>
        </div> 
        <div class="row">
            <div class="col">
                <form action="{{ route('expenses.show', $report->id) }}" method="POST">
                    @csrf
                    @method('get')
                    <div class="form-group">
                        <label for="title">Id:</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Type a title" value="{{ $report->id }}" disabled>
                    </div>                
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Type a title" value="{{ $report->title }}" disabled>
                    </div>                
                </form>
                
                <table class="table">
                    <h3 class="mt-5">Details</h3>
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-primary" href="/expenses/{{ $report->id }}/expenses/create" rel="noopener noreferrer">
                                New expense
                            </a>
                        </div>
                    </div>
                    @foreach ($report->expenses as $expense)
                        @if ($expense->description == null)
                            <p>No existen registros, puedes agregar uno.</p>
                        @else  
                            <tr>
                                <td>{{$expense->description}}</td>
                                <td>{{$expense->created_at}}</td>
                                <td>{{$expense->amount}}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection