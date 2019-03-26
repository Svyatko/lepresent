@extends('layouts.admin', ['header' => 'Добавить колекцию'])

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
                <form action="{{ route('admin.collections.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-ru" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <div class="form-group">
                                <label for="title_ru" class="form-label form-label--required">Название колекции</label>
                                <input class="form-control" name="title_ru" id="title_ru" value="{{ old('title_ru') }}">
                                @if($errors->has('title_ru'))
                                    <div class="alert alert-danger mt-3">
                                        {{ $errors->first('title_ru') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="v-pills-en" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <div class="form-group">
                                <label for="title_en" class="form-label form-label--required">Название колекции</label>
                                <input class="form-control" name="title_en" id="title_en" value="{{ old('title_en') }}">
                                @if($errors->has('title_en'))
                                    <div class="alert alert-danger mt-3">
                                        {{ $errors->first('title_en') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="upload-file">
                                        <input type="file" id="xls-file-anounce" name="image">
                                        <label for="xls-file-anounce">
                                            <span>Выбрать файл</span>
                                            <i class="fas fa-file-upload ml-1"></i>
                                        </label>
                                        @if($errors->has('image'))
                                            <div class="alert alert-danger mt-3">
                                                {{ $errors->first('image') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exclusive" class="form-label form-label--required">Показывать как
                                ексклюзивное</label>
                            <select id="exclusive" name="brands_men" class="form-select js-select2-fields" multiple
                                    style="width: 100%">
                                <option>Valentino</option>
                                <option selected>Panther-print silk-cady dress</option>
                                <option>Loro Piana</option>
                                <option>A.P.C.</option>
                                <option selected>Panther-print silk-cady bag</option>
                                <option>Prada</option>
                                <option>Céline</option>
                                <option selected>Panther-print silk-cady shoes</option>
                                <option>Isabel Marant</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-primary">@lang('_generic/generic.save')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection