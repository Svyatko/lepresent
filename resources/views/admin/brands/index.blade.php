@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h1>Бренды</h1>
            </div>
            <div class="col-md-9 text-right">
                <form action="{{ route('admin.brands.search') }}">
                    @csrf
                    <input id="js-search" class="btn btn-outline-dark m-0" placeholder="Поиск бренда" name="text">
                    <a href="{{ route('admin.brands.create') }}" class="btn btn-dark m-0">Добавить бренд</a>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                @if(count($brands) > 0)
                    <div class="js-table w-100">
                        @include('admin.brands.includes.table', ['brands' => $brands])
                    </div>
                @else
                    <h2>Брендов не найдено</h2>
                @endif
            </div>
        </div>
    </div>
@endsection