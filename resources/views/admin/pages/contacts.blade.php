@extends('layouts.admin', ['header' => 'Контакты'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.pages.contacts.store') }}" method="POST">
                    @csrf
                    <h3>Добавить контакт</h3>
                    <div class="row">
                        <div class="col-md-8">
                            <label for="address" class="form-label form-label--required">Адресс</label>
                            <input id="address" name="address" value="{{ old('address') }}" class="form-control" autofocus>
                            @if($errors->has('address'))
                                <div class="alert alert-danger mt-3">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="lat" class="form-label form-label--required">Широта</label>
                            <input id="lat" name="lat" value="{{ old('lat') }}" class="form-control">
                            @if($errors->has('lat'))
                                <div class="alert alert-danger mt-3">
                                    {{ $errors->first('lat') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <label for="phone" class="form-label form-label--required">Телефон</label>
                            <input id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                            @if($errors->has('phone'))
                                <div class="alert alert-danger mt-3">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-2">
                            <label for="lng" class="form-label form-label--required">Долгота</label>
                            <input id="lng" name="lng" value="{{ old('lng') }}" class="form-control">
                            @if($errors->has('lng'))
                                <div class="alert alert-danger mt-3">
                                    {{ $errors->first('lng') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-2 text-right">
                            <label for="contact" class="form-label">&nbsp;</label>
                            <button class="btn btn-dark">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                @if(count($contacts) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Адресс</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">Ширина</th>
                            <th scope="col">Долгота</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as  $contact)
                            <tr>
                                <th scope="row" class="vertical-middle">{{ $loop->iteration }}</th>
                                <th scope="row" class="vertical-middle">{{ $contact['address'] }}</th>
                                <th scope="row" class="vertical-middle">{{ $contact['phone'] }}</th>
                                <th scope="row" class="vertical-middle">{{ $contact['lat'] }}</th>
                                <th scope="row" class="vertical-middle">{{ $contact['lng'] }}</th>
                                <th scope="row" class="vertical-middle">
                                    <a class="btn btn-outline-danger" href="javascript:;"
                                       onclick="$('#settings-{{$contact['id']}}').submit()"> <i class="fas fa-trash"></i></a>
                                </th>
                                <form id="settings-{{$contact['id']}}" action="{{ route('admin.settings.destroy', $contact['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>Контактов пока нет</h2>
                @endif
            </div>
        </div>
    </div>
@endsection