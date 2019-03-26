@extends('layouts.admin', ['header' => "Обновление товара: $item->title"])

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
                <div class="form-group">
                    <label class="form-label">Фотографии продукта</label>
                    <div class="row">
                        @foreach($item->images as $image)
                            <div class="col-md-2">
                                <div class="items__image">
                                    <img src="{{ $image->path }}" class="h-75 w-75" alt="">
                                    <div class="items__image-cross">
                                        <form class="js-delete-image" action="{{ route('admin.images.destroy', $image->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-times d-block"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <form action="{{ route('admin.items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                                        <option value="{{ $category->id }}"
                                                @if($item->category->id === $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="style_id" class="form-label form-label--required">Артикул</label>
                                <input id="style_id" name="style_id" class="form-control" placeholder="Пример: 816811"
                                       value="{{ old('style_id', $item->style_id) }}">
                            </div>
                            <div class="col-md-2">
                                <label for="is_sale" class="form-label">Распродажа?</label>
                                <input type="checkbox" id="is_sale" name="is_sale" @if($item->is_sale) checked @endif>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="brand" class="form-label form-label--required">Бренд / Дизайнер</label>
                            <select id="brand" name="brand_id" class="form-select js-select2-fields"
                                    style="width: 100%">
                                @foreach($designers_brands as $brand)
                                    @php
                                        $brand_id = (isset($brand->designer_id)) ? $brand->designer_id : $brand->id;
                                    @endphp
                                    <option value="{{ get_class($brand).'/'.$brand_id }}" @if($item->model_name === get_class($brand) && (
                                        $item->brand_id === $brand_id || $item->designer_id === $brand_id
                                    )) selected @endif>
                                        {{ ($brand->name) ? $brand->name : $brand->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="price" class="form-label form-label--required">Цена</label>
                            <input id="price" name="price" class="form-control" placeholder="Пример: 100.00"
                                   value="{{ old('price', $item->price) }}">
                        </div>
                        <div class="col-md-3">
                            <label for="sex" class="form-label form-label--required">Пол</label>
                            <select id="sex" class="form-control" name="sex_id">
                                <option disabled selected>Выберите пол</option>
                                <option value="1" @if(old('sex_id', $item->sex_id) == 1) selected @endif>Men</option>
                                <option value="2" @if(old('sex_id', $item->sex_id) == 2) selected @endif>Women</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="colors" class="form-label form-label--required">Цвет</label>
                            <select id="colors" name="colors[]" class="form-select js-select2-fields"
                                    style="width: 100%" multiple>
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}"
                                            @if(in_array($color->id, $item->colors->toArray())) selected @endif>{{ $color->name }}</option>
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
                                <input class="form-control" name="title_ru" id="title_ru" value="{{ old('title_ru', $item->translate('ru')->name) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label form-label--required" for="text_ru">Описание</label>
                                <textarea name="text_ru" id="text_ru" rows="6"
                                          class="form-control">{{ old('text_ru', $item->translate('ru')->text) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label form-label--required" for="character_ru">Характеристика</label>
                                <textarea name="character_ru" id="character_ru" rows="10" class="form-control"
                                          placeholder="Вводить все пункты характеристики через пробел. Пример:
Длина (см): 100
Черное">{{ old('character_ru', $item->translate('ru')->character) }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="v-pills-en" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <div class="form-group">
                                <label for="title_en" class="form-label form-label--required">Название товара</label>
                                <input class="form-control" name="title_en" id="title_en" value="{{ old('title_en', $item->translate('en')->name) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label form-label--required" for="text_en">Описание</label>
                                <textarea name="text_en" id="text_en" rows="6"
                                          class="form-control">{{ old('text_en', $item->translate('en')->text) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label form-label--required" for="character_en">Характеристика</label>
                                <textarea name="character_en" id="character_en" rows="10" class="form-control"
                                          placeholder="Enter all the feature points separated by space. Example:
Length (cm): 100
Black printed">{{ old('character_en', $item->translate('en')->character) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row js-count-size">
                                @foreach($sizes as $size)
                                    <div class="col-md-1">
                                        <label class="btn btn-outline-primary">
                                            {{ $size->size }}
                                            <input type="checkbox" id="size-{{ $size->id }}" name="sizes[]"
                                                   value="{{ $size->id }}"
                                                   @if(in_array($size->id, $item->sizes->toArray())) checked @endif>
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