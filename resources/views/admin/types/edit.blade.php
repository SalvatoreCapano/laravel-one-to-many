@extends('layouts.admin')

@section('pageTitle')
    Modifica {{ $type->name }} | Portfolio
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Modifica Tupo
                </h1>
            </div>
        </div>

        @include('partials.success')

        @include('partials.errors')

        <div class="row mb-4">
            <div class="col">
                <form action="{{ route('admin.types.update', $type->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Nome<span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" required maxlength="64"
                            value="{{ old('name', $type->name) }}" placeholder="Inserisci il nome...">
                    </div>

                    <div>
                        <p>
                            N.B. i campi contrassegnati con <span class="text-danger">*</span> sono obbligatori.
                        </p>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-warning">
                            Aggiorna
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection