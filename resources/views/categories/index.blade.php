@extends('layout.app')
@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h1> Categorias </h1>

            <select name="" id="select-site" class="form-select" aria-label="Default select example">
                @foreach ($sites as $site)
                    <option {{ $site->id === request('site_id', 'MLB') ? 'selected' : '' }} value="{{ $site->id }}">
                        {{ $site->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-12 mt-4">
            @if (count($categories) == 0)
                <button class="btn bg-success mb-4" id="download" data-id="{{ request('site_id', 'MLB') }}">
                    Baixar Categorias
                </button>
            @endif
            <div id="tree" class="bstreeview">
                @foreach ($categories as $category)
                    <div data-loaded="false" id="{{ $category->id }}" data-level="1" data-id="{{ $category->id }}"
                        role="treeitem" style="padding-left: 1.25rem;" class="list-group-item collapsed observe-item"
                        arial-level="1" data-bs-toggle="collapse" data-bs-target="#tree-item-{{ $category->id }}">
                        {{ $category->name }} {{ $category->categories()->count() }}
                    </div>
                    <div role="group" id="tree-item-{{ $category->id }}" class="list-group collapse">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/category.js') }}"></script>
@endsection
