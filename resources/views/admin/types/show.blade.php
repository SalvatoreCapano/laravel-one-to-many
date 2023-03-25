@extends('layouts.admin')

@section('pageTitle')
    {{ $type->name }} | Portfolio
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                @include('partials.success')

                <div class="card">
                    <div class="card-header fw-bold">
                        #{{ $type->id }} - {{ $type->title }}
                    </div>
                    <div class="card-body">

                        <h5 class="card-title">Name</h5>

                        <p class="card-text">{{ $type->name }}</p>

                        <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning">
                            <i class="fa-solid fa-wrench"></i> {{ __('page.edit') }}
                        </a>
                        <form class="d-inline-block" action="{{ route('admin.types.destroy', $type->id) }}"
                            method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo tipo?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                {{-- Elimina --}}
                                <i class="fa-solid fa-trash-can"></i> {{ __('page.delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection