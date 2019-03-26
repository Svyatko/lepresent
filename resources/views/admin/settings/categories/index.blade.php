@extends('layouts.admin', ['header' => 'Список категорий'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-primary">@lang('_generic/generic.create')</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                @if(count($categories) > 0)
                    {{ $categories->links() }}
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Размер</th>
                            <th scope="col" class="text-right">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $category->name }}</th>
                                <th class="text-right">
                                    <div class="btn-group" role="group" aria-label="Actions">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-outline-primary" onclick="$('#size-{{$category->id}}').submit()">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-outline-danger" onclick="$('#size-{{$category->id}}').submit()">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
                                    <form id="size-{{$category->id}}" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>Размеров не найдено</h2>
                @endif
            </div>
        </div>
    </div>
@endsection