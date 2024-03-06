@extends('layouts.app')

@section('page-title', '$project->title')

@section('main-content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center text-success">
                    {{ $project->title }}
                </h1>

                <h2>
                    Slug: {{ $project->slug }}
                </h2>

                <p>
                    {{ $project->content }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
