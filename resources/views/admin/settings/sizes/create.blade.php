@extends('layouts.admin', ['header' => 'Создать размер'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.sizes.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="size" class="form-lable form-label--required">Размер</label>
                        <input id="size" class="form-control w-25" name="size" placeholder="Введите 42 или 42.5">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary">@lang('_generic/generic.save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection