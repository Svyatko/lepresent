@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h1>Дизайнеры</h1>
            </div>
            <div class="col-md-9 text-right">
                <form action="{{ route('admin.designers.search') }}">
                    @csrf
                    <input id="js-search" class="btn btn-outline-dark m-0" placeholder="Поиск дизайнера" name="text">
                    <a href="{{ route('admin.designers.create') }}" class="btn btn-dark m-0">Добавить дизайнера</a>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            @if(count($designers) > 0)
                <div class="js-table w-100">
                    @include('admin.designers.includes.table', ['designers' => $designers])
                </div>
            @else
                <h2>Дизайнеров не найдено</h2>
            @endif
        </div>
    </div>
@endsection