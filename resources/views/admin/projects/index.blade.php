@extends('layouts.admin')

@section('pageTitle')
    {{ __('page.projects') }} | Dashboard
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    {{ __('page.projectsTitle') }}
                </h1>
            </div>

            <div class="col text-end">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                    {{ __('page.btnAdd') }}
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
                            <th scope="col">{{ __('page.title') }}</th>
                            <th scope="col">{{ __('page.status') }}</th>
                            <th scope="col">{{ __('page.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>{{ $project->title }}</td>

                                <td>
                                    @if ($project->status == 'completed')
                                        {{ __('page.completed') }}
                                        @elseif ($project->status == 'active')
                                        {{ __('page.active') }}
                                        @elseif ($project->status == 'on_hold')
                                        {{ __('page.on_hold') }}
                                        @elseif ($project->status == 'cancelled')
                                        {{ __('page.cancelled') }}
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">
                                        {{-- Dettagli --}}
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">
                                        {{-- Aggiorna --}}
                                        <i class="fa-solid fa-wrench"></i>
                                    </a>
                                    <form class="d-inline-block"
                                        action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                        onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?');">
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
