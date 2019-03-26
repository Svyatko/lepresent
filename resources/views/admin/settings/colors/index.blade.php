@extends('layouts.admin', ['header' => 'Список цветов'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.colors.create') }}" class="btn btn-outline-primary">@lang('_generic/generic.create')</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                @if(count($colors) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Цвет</th>
                            <th scope="col" class="text-right">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($colors as $color)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $color->name }}</th>
                                <th class="text-right">
                                    <div class="btn-group" role="group" aria-label="Actions">
                                        <a href="{{ route('admin.colors.edit', $color->id) }}" class="btn btn-outline-primary" onclick="$('#color-{{$color->id}}').submit()">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-outline-danger" onclick="$('#color-{{$color->id}}').submit()">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
                                    <form id="color-{{$color->id}}" action="{{ route('admin.colors.destroy', $color->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>Цветов не найдено</h2>
                @endif
            </div>
        </div>
    </div>
@endsection