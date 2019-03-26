@extends('layouts.admin', ['header' => 'Список размеров'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.sizes.create') }}" class="btn btn-outline-primary">@lang('_generic/generic.create')</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                @if(count($sizes) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Размер</th>
                            <th scope="col" class="text-right">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sizes as $size)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $size->size }}</th>
                                <th class="text-right">
                                    <div class="btn-group" role="group" aria-label="Actions">
                                        <a href="{{ route('admin.sizes.edit', $size->id) }}" class="btn btn-outline-primary" onclick="$('#size-{{$size->id}}').submit()">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-outline-danger" onclick="$('#size-{{$size->id}}').submit()">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
                                    <form id="size-{{$size->id}}" action="{{ route('admin.sizes.destroy', $size->id) }}" method="POST">
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