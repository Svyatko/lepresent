@extends('layouts.admin', ['header' => 'Создать категорию'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 d-flex align-items-center">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-ru" role="tab"
                       aria-controls="v-pills-ru" aria-selected="true">Русский</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-en" role="tab"
                       aria-controls="v-pills-en" aria-selected="false">English</a>
                </div>
            </div>
            <div class="col-md-10">
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('admin.categories.store') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-ru" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <div class="form-group">
                                <label for="name_ru" class="form-label form-label--required">Назва</label>
                                <input id="name_ru" name="name_ru" class="form-control" value="{{ old('name_ru') }}">
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="v-pills-en" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <label for="name_en" class="form-label form-label--required">Назва</label>
                            <input id="name_en" name="name_en" class="form-control" value="{{ old('name_en') }}">
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-outline-primary">@lang('_generic/generic.save')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection