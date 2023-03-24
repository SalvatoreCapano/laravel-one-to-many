@extends('layouts.admin')

@section('pageTitle')
    {{ $project->title }} | Portfolio
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                @include('partials.success')

                <div class="card">
                    <div class="card-header fw-bold">
                        #{{ $project->id }} - {{ $project->title }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="imgContainer col-3 mb-4">
                                @if ($project->image)
                                    <div>
                                        <img src="{{ asset('storage/' . $project->image) }}" alt="">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <h5 class="card-title">{{ __('page.description') }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                        <p>
                            <span class="fw-bold">Slug:</span>
                            {{ $project->slug }}
                        </p>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">
                            <i class="fa-solid fa-wrench"></i> {{ __('page.edit') }}
                        </a>
                        <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->id) }}"
                            method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?');">
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
