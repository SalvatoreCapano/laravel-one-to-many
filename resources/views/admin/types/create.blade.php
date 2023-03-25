@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Crea Tipo Progetto
                </h1>
            </div>
        </div>

        @include('partials.errors')

        <div class="row mb-4">
            <div class="col">
                <form action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Nome<span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" required maxlength="64"
                            value="{{ old('name') }}" placeholder="Inserisci il nome...">
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