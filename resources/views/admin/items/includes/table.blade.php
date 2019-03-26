<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Картинка</th>
        <th scope="col">Название товара</th>
        <th scope="col">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        @php
            $item = $item->original;
        @endphp
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <div class="row">
                    @foreach($item->images as $image)
                        @if($loop->iteration < 3)
                            <img src="{{ $image->path }}" class="w-10 h-10 p-1">
                        @endif
                    @endforeach
                </div>
            </td>
            <td>{{ $item->name }}</td>
            <td>
                <a class="btn btn-outline-primary"
                   href="{{ route('admin.items.edit', $item->id) }}"> <i class="fas fa-pen"></i></a>
                <a class="btn btn-outline-danger" href="javascript:;"
                   onclick="$('#item-{{$item->id}}').submit()"> <i class="fas fa-trash"></i></a>
                <form id="item-{{$item->id}}" action="{{ route('admin.items.destroy', $item->id) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>