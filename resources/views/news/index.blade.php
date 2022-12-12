<table>
    <tr>
        <th>header</th>
        <th>anons</th>
        <th>body</th>
        <th>teg</th>
        <th>pub_date</th>
        <th>actions</th>
    </tr>
    @foreach($data as $item)
        <tr>
            <td>{{$item->header}}</td>
            <td>{{$item->anons}}</td>
            <td>{{$item->body}}</td>
            <td>{{$item->teg}}</td>
            <td>{{$item->pub_date}}</td>
            <td><a href="{{ route('news.show', $item->id) }}">Че там?</a></td>
            <td><a href="{{ route('news.edit', $item->id) }}">Меняй</a></td>
            <td>
                <form action="{{ route('news.delete', $item->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Не надо?</button>
                </form>
            </td>
        </tr>
    @endforeach

</table>
