@extends('layouts.app')

@section('page-title', $project->title . 'Edit')

@section('main-content')
    <h1 class="text-center">
        {{ $project->title }}
    </h1>

    <div class="row">
        <div class="col py-4">
            <div class="container">
                <div class="mb-4">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
                        Torna all'index del project
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.projects.show', ['project' => $project->slug]) }}" method="POST">

                    @csrf

                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                        <input value="{{ old('title', $project->title) }}" type="text"
                            class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            placeholder="Inserisci il titolo..." maxlength="255">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Thumb</label>
                        <input value="{{ old('slug', $project->slug) }}" type="text"
                            class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                            placeholder="Inserisci la slug..." maxlength="255">
                        @error('slug')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3"
                            placeholder="Inserisci il Content...">{{ old('content', $project->content) }}</textarea>
                        @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-warning w-100">
                            Modifica
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
