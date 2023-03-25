@extends('layouts.admin')

@section('pageTitle')
    Types | Dashboard
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Tutti i tipi
                </h1>
            </div>

            <div class="col text-end">
                <a href="{{ route('admin.types.create') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                    Aggiungi Tipo
                </a>
            </div>
        </div>

        @include('partials.success')

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <th scope="row">{{ $type->id }}</th>
                                <td>{{ $type->name }}</td>

                                <td>
                                    <a href="{{ route('admin.types.show', $type->id) }}" class="btn btn-primary">
                                        {{-- Dettagli --}}
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning">
                                        {{-- Aggiorna --}}
                                        <i class="fa-solid fa-wrench"></i>
                                    </a>
                                    <form class="d-inline-block" action="{{ route('admin.types.destroy', $type->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Sei sicuro di voler eliminare questo tipo?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            {{-- Elimina --}}
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection