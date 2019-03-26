@extends('layouts.admin', ['header' => "Редактировать размер: $size->size"])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.sizes.update', $size->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="size" class="form-lable form-label--required">Размер</label>
                        <input id="size" type="number" class="form-control w-25" name="size" value="{{ old('size', $size->size) }}" placeholder="Введите 42 или 42.5">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary">@lang('_generic/generic.save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection