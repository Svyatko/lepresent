@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h1>Бренды</h1>
            </div>
            <div class="col-md-9 text-right">
                <form action="{{ route('admin.items.search') }}">
                    @csrf
                    <input id="js-search" class="btn btn-outline-dark m-0" placeholder="Поиск товара" name="text">
                    <a href="{{ route('admin.items.create') }}" class="btn btn-dark m-0">Добавить товар</a>
                </form>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                @if(count($items) > 0)
                    <div class="js-table w-100">
                        @include('admin.items.includes.table', ['items' => $items])
                    </div>
                @else
                    <h2>Продуктов не найдено</h2>
                @endif
            </div>
        </div>
    </div>
@endsection