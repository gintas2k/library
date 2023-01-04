@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Knygos redagavimas</div>
                <div class="card-body">

                    <form method="POST" action="{{ route('books.update', $book->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Pavadinimas</label>
                            <input type="text" class="form-control" name="title" value="{{ $book->title }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Autorius</label>
                            <select name="author_id" class="form-select">
                                @foreach($authors as $author)
                                <option value="{{ $author->id }}" 
                                    {{ ($author->id==$book->author_id)?'selected':'' }}
                                
                                >{{ $author->name }} {{ $author->surname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ISBN</label>
                            <input type="text" class="form-control" name="isbn" value="{{ $book->isbn }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Puslapių skaičius</label>
                            <input type="number" class="form-control" name="pages" value="{{ $book->pages }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Aprašymas</label>
                            <input type="text" class="form-control" name="short_description" value="{{ $book->short_description }}">
                        </div>
                        
                        <button class="btn btn-success">Išsaugoti</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection