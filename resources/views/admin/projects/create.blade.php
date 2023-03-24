@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Crea Progetto
                </h1>
            </div>
        </div>

        @include('partials.errors')

        <div class="row mb-4">
            <div class="col">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">
                            Titolo<span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="title" name="title" required maxlength="64"
                            value="{{ old('title') }}" placeholder="Inserisci il titolo...">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">
                            Descrizione<span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" rows="10" id="description" name="description" required maxlength="4096"
                            placeholder="Inserisci la descrizione...">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">
                            Immagine
                        </label>
                        <input
                            type="file"
                            class="form-control"
                            id="image"
                            name="image"
                            accept="image/*"
                            placeholder="Inserisci l'immagine...">
                    </div>

                    <div>
                        <p>
                            N.B. i campi contrassegnati con <span class="text-danger">*</span> sono obbligatori.
                        </p>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">
                            Aggiungi
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
