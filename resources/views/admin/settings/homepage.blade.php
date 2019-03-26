@extends('layouts.admin', ['header' => 'Настройки: Главная страница'])

@section('content')
    <div class="container">
        <form action="/" method="POST">
            @csrf
            @method('PUT')

            <h2>Коллекции</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="women" class="form-label form-label--required">Для женщин</label>
                            <input class="form-control" name="women" id="women" value="Women New In">
                            @if($errors->has('women'))
                                <div class="alert alert-danger mt-3">
                                    {{ $errors->first('women') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="upload-file">
                                <input type="file" id="xls-file-brands-women" name="file">
                                <label for="xls-file-brands-women">
                                    <span>Картинка для женских брендов</span>
                                    <i class="fas fa-file-upload ml-1"></i>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brands_women" class="form-label form-label--required">Бренды для женщин</label>
                            <select id="brands_women" name="brands_women" class="form-select js-select2-fields" multiple
                                    style="width: 100%">
                                <option selected>Valentino</option>
                                <option selected>Balenciaga</option>
                                <option selected>Acne Studios</option>
                                <option selected>Prada</option>
                                <option selected>Loewe</option>
                                <option selected>Céline</option>
                                <option selected>Jil Sander</option>
                                <option selected>Isabel Marant</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="men" class="form-label form-label--required">Для мужчин</label>
                            <input class="form-control" name="men" id="men" value="Men New In">
                            @if($errors->has('men'))
                                <div class="alert alert-danger mt-3">
                                    {{ $errors->first('men') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="upload-file">
                                <input type="file" id="xls-file" name="file">
                                <label for="xls-file">
                                    <span>Картинка для мужских брендов</span>
                                    <i class="fas fa-file-upload ml-1"></i>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brands_men" class="form-label form-label--required">Бренды для мужчин</label>
                            <select id="brands_men" name="brands_men" class="form-select js-select2-fields" multiple
                                    style="width: 100%">
                                <option selected>Valentino</option>
                                <option selected>Loro Piana</option>
                                <option selected>A.P.C.</option>
                                <option selected>Acne Studios</option>
                                <option selected>Prada</option>
                                <option>Céline</option>
                                <option>Jil Sander</option>
                                <option>Isabel Marant</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <h2>Ексклюзив</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <label for="exclusive" class="form-label form-label--required">Показывать как
                            ексклюзивное</label>
                        <select id="exclusive" name="exclusive" class="form-control">
                            <option>Valentino</option>
                            <option selected>Adidas by Stella McCartney FW 17</option>
                            <option>Loro Piana</option>
                            <option>A.P.C.</option>
                            <option>Acne Studios</option>
                            <option>Prada</option>
                            <option>Céline</option>
                            <option>Jil Sander</option>
                            <option>Isabel Marant</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="exclusive" class="form-label form-label--required">Полотно</label>
                        <div class="upload-file">
                            <input type="file" id="xls-file-s" name="file">
                            <label for="xls-file-s">
                                <span>Выбрать файл</span>
                                <i class="fas fa-file-upload ml-1"></i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <h2>Анонс</h2>
            <div class="form-group">
                <label for="title" class="form-label form-label--required">Титул</label>
                <textarea id="title" name="title" class="form-control" rows="6">Valentino
Fall Winter
Collection soon
                        </textarea>
            </div>
            <div class="form-group">
                <label for="content" class="form-label form-label--required">Содержание</label>
                <textarea id="content" name="content" class="form-control" rows="6">The thing we love about Cuba is the many different memories of the place—African, Spanish, ’50s America.</textarea>
            </div>
            <div class="form-group">
                <div class="upload-file">
                    <input type="file" id="xls-file-anounce" name="file">
                    <label for="xls-file-anounce">
                        <span>Выбрать файл</span>
                        <i class="fas fa-file-upload ml-1"></i>
                    </label>
                </div>
            </div>
        </form>
    </div>
@endsection