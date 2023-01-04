@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Autorių sąrašas</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Vardas</th>
                            <th>Pavardė</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->surname }}</td>
                                <td style="width: 100px;">
                                    <a class="btn btn-sm btn-warning" href="{{ route('authors.edit', $author->id) }}" >Redaguoti</a>
                                </td>
                                <td style="width: 100px;">
                                    <form method="POST" action="{{ route('authors.destroy', $author->id) }}">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Ar tikrai norite ištrinti?');">Ištrinti</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>


                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection