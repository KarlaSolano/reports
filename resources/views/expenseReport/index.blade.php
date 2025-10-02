@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-2xl font-bold mb-4">Expense Reports</h1>
            </div>
        </div>
        <div class="row">
            <div class="col mt-8 mb-4">
                <a class="btn btn-primary" href="/expenses/create">Create a new report</a>
            </div>
        </div>
        <div class="row">
            <div class="col mt-8 mb-4">
                <table class="table-auto border-collapse border border-gray-400 w-full">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Title</th>
                            <th class="border border-gray-300 px-4 py-2">Editar</th>
                            <th class="border border-gray-300 px-4 py-2">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($expenseReports as $expenseReport)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $expenseReport->id }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="/expenses/{{$expenseReport->id}}">{{$expenseReport->title}}</a>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="/expenses/{{$expenseReport->id}}/edit">Edit</a>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="/expenses/{{$expenseReport->id}}/confirmDelete">Eliminar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center py-4">No hay registros</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
@endsection