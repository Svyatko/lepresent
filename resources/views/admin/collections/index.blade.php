@extends('layouts.admin', ['header' => 'Список колекций'])

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{ route('admin.collections.create') }}" class="btn btn-outline-primary m-0">Добавить колекцию</a>
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
                @if(count($collections) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Картинка</th>
                            <th scope="col">Название колекции</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($collections as $collection)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th><img src="{{ $collection->image }}" class="w-25"></th>
                                <td>{{ $collection->title }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>Колекций не найдено</h2>
                @endif
            </div>
        </div>
    </div>
@endsection