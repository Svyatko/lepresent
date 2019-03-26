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
    @foreach($brands as  $brand)
        <tr>
            <th scope="row" class="vertical-middle">{{ $loop->iteration }}</th>
            <th scope="row" class="vertical-middle">{{ $brand->name }}</th>
            <th scope="row" class="vertical-middle"><input type="checkbox" name="is_active"
                                                           value="1"
                                                           class="lcs_tt2 js-visible-switch js-switcher"
                                                           data-route="{{ route('admin.designers.switch', $brand->id) }}"
                                                           data-type="@if($brand->is_vip === 1) off @else on @endif"
                                                           data-model="Brands"
                                                           autocomplete="off"{{ ($brand->is_vip === 1) ? 'checked' : '' }}/>
            </th>
            <th scope="row" class="vertical-middle text-right">
                <a class="btn btn-outline-primary"
                   href="{{ route('admin.brands.edit', $brand->id) }}"> <i class="fas fa-pen"></i></a>
                <a class="btn btn-outline-danger" href="javascript:;"
                   onclick="$('#brand-{{$brand->id}}').submit()"> <i class="fas fa-trash"></i></a>
                <form id="brand-{{$brand->id}}"
                      action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </th>
        </tr>
    @endforeach
    </tbody>
</table>