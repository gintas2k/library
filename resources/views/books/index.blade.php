@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Knygų sąrašas</div>
                <div class="card-body">
                    <form action="{{ route('books.search') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="search" placeholder="Knygos paieška" value="{{ $search }}">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-sm btn-success">Ieškoti</button>
                            </div>
                            <div class="col-md-1">
                                    <a href="{{ route('books.search.reset') }}" class="btn btn-sm btn-warning">Išvalyti</a>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Pavadinimas</th>
                            <th>Autorius</th>
                            <th>ISBN</th>
                            <th>puslapių sk.</th>
                            <th>Aprašymas</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author->name }} {{ $book->author->surname }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->pages }}</td>
                                <td>{{ $book->short_description }}</td>
                                <td style="width: 100px;">
                                    <a class="btn btn-sm btn-warning" href="{{ route('books.edit', $book->id) }}" >Redaguoti</a>
                                </td>
                                <td style="width: 100px;">
                                    <form method="POST" action="{{ route('books.destroy', $book->id) }}">
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