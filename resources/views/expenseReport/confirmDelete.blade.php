@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Confirmar eliminar {{$report->id}}??</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-secondary" href="/expenses">Back</a>
            </div>
        </div> 
        <div class="row">
            <div class="col">
                <form action="{{ route('expenses.update', $report->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $report->title }}" readonly>
                    </div>
                    <button class="btn btn-danger" type="submit" >Delete</button>
                </form>
            </div>
        </div>
    </div>    
@endsection