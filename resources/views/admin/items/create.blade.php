@extends('layouts.admin', ['header' => 'Добавить товар'])

@section('content')
    <div class="container">
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
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
                <form action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label form-label--required">Фотографии</label>
                                <input type="file" name="files[]" multiple>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-5">
                                <label for="category_id" class="form-label form-label--required">Категория</label>
                                <select id="category_id" class="form-control" name="category_id">
                                    <option disabled selected>Выберите категорию</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="style_id" class="form-label form-label--required">Артикул</label>
                                <input id="style_id" name="style_id" class="form-control" placeholder="Пример: 816811" value="{{ old('style_id') }}">
                            </div>
                            <div class="col-md-2">
                                <label for="is_sale" class="form-label">Распродажа?</label>
                                <input type="checkbox" id="is_sale" name="is_sale" @if(old('is_sale')) checked @endif>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="brand" class="form-label form-label--required">Бренд / Дизайнер</label>
                            <select id="brand" name="brand_id" class="form-select js-select2-fields"
                                    style="width: 100%">
                                @foreach($designers_brands as $brand)
                                    <option value="{{ get_class($brand).'/'.$brand->id }}" @if(old('brand_id') && old('brand_id') == get_class($brand).'/'.$brand->id) selected @endif>
                                        {{ ($brand->name) ? $brand->name : $brand->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="price" class="form-label form-label--required">Цена</label>
                            <input id="price" name="price" class="form-control" placeholder="Пример: 100.00" value="{{ old('price') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="sex" class="form-label form-label--required">Пол</label>
                            <select id="sex" class="form-control" name="sex_id">
                                <option disabled selected>Выберите пол</option>
                                <option value="1" @if(old('sex_id') == 1) selected @endif>Men</option>
                                <option value="2" @if(old('sex_id') == 2) selected @endif>Women</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="colors" class="form-label form-label--required">Цвет</label>
                            <select id="colors" name="colors[]" class="form-select js-select2-fields"
                                    style="width: 100%" multiple>
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}" @if(old('colors') && in_array($color->id, old('colors'))) selected @endif>{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group"></div>

                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-ru" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <div class="form-group">
                                <label for="title_ru" class="form-label form-label--required">Название товара</label>
                                <input class="form-control" name="title_ru" id="title_ru" value="{{ old('title_ru') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label form-label--required" for="text_ru">Описание</label>
                                <textarea name="text_ru" id="text_ru" rows="6" class="form-control">{{ old('text_ru') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label form-label--required" for="character_ru">Характеристика</label>
                                <textarea name="character_ru" id="character_ru" rows="10" class="form-control"
                                          placeholder="Вводить все пункты характеристики через пробел. Пример:
Длина (см): 100
Черное">{{ old('character_ru') }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="v-pills-en" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <div class="form-group">
                                <label for="title_en" class="form-label form-label--required">Название товара</label>
                                <input class="form-control" name="title_en" id="title_en" value="{{ old('title_en') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label form-label--required" for="text_en">Описание</label>
                                <textarea name="text_en" id="text_en" rows="6" class="form-control">{{ old('text_en') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label form-label--required" for="character_en">Характеристика</label>
                                <textarea name="character_en" id="character_en" rows="10" class="form-control"
                                          placeholder="Enter all the feature points separated by space. Example:
Length (cm): 100
Black printed">{{ old('character_en') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row js-count-size">
                                @foreach($sizes as $size)
                                    <div class="col-md-1">
                                        <label class="btn btn-outline-primary">
                                            {{ $size->size }}
                                            <input type="checkbox" id="size-{{ $size->id }}" name="sizes[]"
                                                   value="{{ $size->id }}" @if(old('sizes') && in_array($size->id, old('sizes'))) checked @endif>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary">@lang('_generic/generic.save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection