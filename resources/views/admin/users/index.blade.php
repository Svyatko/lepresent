@extends('layouts.admin', ['header' => 'Пользователи'])

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                @if(count($users) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Имья</th>
                            <th scope="col">Фамилия</th>
                            <th scope="col">На сайте с (мм/дд/год)</th>
                            <th scope="col">VIP ?</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->created_at->format('m/d/Y') }}</td>
                                <td>
                                    <input type="checkbox" name="is_active"
                                           value="1"
                                           class="lcs_tt2 js-visible-switch js-switcher"
                                           data-route="{{ route('admin.designers.switch', $user->id) }}"
                                           data-type="@if($user->is_vip === 1) off @else on @endif"
                                           data-model="User"
                                           autocomplete="off"{{ ($user->is_vip === 1) ? 'checked' : '' }}/>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>Пользователей не найдено</h2>
                @endif
            </div>
        </div>
    </div>
@endsection