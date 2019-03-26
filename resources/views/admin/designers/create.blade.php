@extends('layouts.admin', ['header' => 'Добавить дизайнера'])

@section('content')
    <div class="container">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                <form action="{{ route('admin.designers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-ru" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <div class="form-group">
                                <label for="title_ru" class="form-label form-label--required">Название дизайнера</label>
                                <input class="form-control" name="title_ru" id="title_ru" value="{{ old('title_ru') }}">
                                @if($errors->has('title_ru'))
                                    <div class="alert alert-danger mt-3">
                                        {{ $errors->first('title_ru') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="main_banner_ru" class="form-label form-label--required">Сылка на
                                                банер
                                                дизайнера</label>
                                            <input type="url" id="main_banner_ru" name="main_banner_ru" class="form-control" value="{{ old('main_banner_ru') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="additional_banner_ru" class="form-label form-label--required">Сылка
                                                на
                                                дополнительный банер</label>
                                            <input type="url" id="additional_banner_ru" name="additional_banner_ru"
                                                   class="form-control" value="{{ old('additional_banner_ru') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="v-pills-en" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <div class="form-group">
                                <label for="title_en" class="form-label form-label--required">Название дизайнера</label>
                                <input class="form-control" name="title_en" id="title_en" value="{{ old('title_en') }}">
                                @if($errors->has('title_en'))
                                    <div class="alert alert-danger mt-3">
                                        {{ $errors->first('title_en') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="main_banner_en" class="form-label form-label--required">Сылка на
                                                банер
                                                дизайнера</label>
                                            <input type="url" id="main_banner_en" name="main_banner_en" class="form-control" value="{{ old('main_banner_en') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="additional_banner_en" class="form-label">Сылка
                                                на
                                                дополнительный банер</label>
                                            <input type="url" id="additional_banner_en" name="additional_banner_en"
                                                   class="form-control" value="{{ old('additional_banner_en') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="upload-file">
                                        <input type="file" id="banner-main" name="banner_main" value="{{ old('banner_main') }}">
                                        <label for="banner-main">
                                            <span>Выбрать файл</span>
                                            <i class="fas fa-file-upload ml-1"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="upload-file">
                                        <input type="file" id="banner-additional" name="banner_additional" value="{{ old('banner_additional') }}">
                                        <label for="banner-additional">
                                            <span>Выбрать файл</span>
                                            <i class="fas fa-file-upload ml-1"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="is_vip" class="form-label form-label--required">Для VIP-пользователей?</label>
                            <input id="is_vip" type="checkbox" name="is_vip"
                                @if(old('is_vip'))
                                    checked
                                @endif
                            >
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-outline-primary">@lang('_generic/generic.save')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection