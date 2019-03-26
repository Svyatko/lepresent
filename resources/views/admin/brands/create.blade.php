@extends('layouts.admin', ['header' => 'Добавить бренд'])

@section('content')
    <div class="container">
        <form action="{{ route('admin.brands.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-10">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label form-label--required">@lang('_generic/generic.name')</label>
                        <input class="form-control" name="name" id="name" value="{{ old('name') }}">
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
                        <input id="is_vip" type="checkbox" name="is_vip">
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