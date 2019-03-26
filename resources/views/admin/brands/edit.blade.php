@extends('layouts.admin', ['header' => "Обновить бренд: $brand->name"])

@section('content')
    <div class="container">
        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-10">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label form-label--required">@lang('_generic/generic.name')</label>
                        <input class="form-control" name="name" id="name" value="{{ old('name', $brand->name) }}">
                        @if($errors->has('name'))
                            <div class="alert alert-danger mt-3">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <button class="btn btn-outline-primary">@lang('_generic/generic.save')</button>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="is_vip" class="form-label">Для VIP-пользователей?</label>
                        <input id="is_vip" type="checkbox" name="is_vip" @if($brand->is_vip === 1) checked @endif>
                    @if($errors->has('is_vip'))
                        <div class="alert alert-danger mt-3">
                            {{ $errors->first('is_vip') }}
                        </div>
                    @endif

                </div>
            </div>
        </form>
    </div>
@endsection