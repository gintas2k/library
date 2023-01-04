@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Autoriaus redagavimas</div>
                <div class="card-body">

                    <form method="POST" action="{{ route('authors.update', $author->id) }}">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label class="form-label">Vardas</label>
                            <input type="text" class="form-control" name="name" value="{{ $author->name }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pavardė</label>
                            <input type="text" class="form-control" name="surname" value="{{ $author->surname }}">
                        </div>
                        
                        <button class="btn btn-success">Išsaugoti</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection