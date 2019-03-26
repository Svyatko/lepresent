@extends('layouts.admin', ['header' => "Обновитиь цвет: $color->name"])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.colors.update', $color->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="form-group">
                        <label for="name" class="form-lable form-label--required">Цвет</label>
                        <input id="name" class="form-control w-25" name="name" placeholder="Введите black или navy" value="{{ old('name', $color->name) }}" autofocus>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary">@lang('_generic/generic.save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection