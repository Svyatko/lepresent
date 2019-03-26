<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Название</th>
        <th scope="col">Для VIP-пользователей ?</th>
        <th scope="col" class="text-right">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($designers as  $designer)
        <tr>
            <th scope="row" class="vertical-middle">{{ $loop->iteration }}</th>
            <th scope="row" class="vertical-middle">{{ $designer->title }}</th>
            <th scope="row" class="vertical-middle"><input type="checkbox" name="is_active"
                                                           value="1"
                                                           class="lcs_tt2 js-visible-switch js-switcher"
                                                           data-route="{{ route('admin.designers.switch', $designer->id) }}"
                                                           data-type="@if($designer->is_vip === 1) off @else on @endif"
                                                           data-model="Designer"
                                                           autocomplete="off"{{ ($designer->is_vip === 1) ? 'checked' : '' }}/>
            </th>
            <th scope="row" class="vertical-middle text-right">
                <a class="btn btn-outline-primary"
                   href="{{ route('admin.designers.edit', $designer->id) }}"> <i class="fas fa-pen"></i></a>
                <a class="btn btn-outline-danger" href="javascript:;"
                   onclick="$('#designer-{{$designer->id}}').submit()"> <i class="fas fa-trash"></i></a>
                <form id="designer-{{$designer->id}}"
                      action="{{ route('admin.designers.destroy', $designer->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </th>
        </tr>
    @endforeach
    </tbody>
</table>