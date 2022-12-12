<form action="{{route('news.update', $news->id)}}" method="post">
    @csrf
    @method('patch')
    <div>
        <input type="text" name="header" id="" placeholder="заголовок" value="{{$news->header}}">
    </div>
    <div>
        <input type="text" name="anons" id="" placeholder="анонс"  value="{{$news->anons}}">
    </div>
    <div>
        <input type="text" name="body" id="" placeholder="Текст"  value="{{$news->body}}">
    </div>
    <div>
        <input type="text" name="teg" id="" placeholder="Теги"  value="{{$news->teg}}">
    </div>
    <div>
        <input type="datetime-local" name="pub_date" id="" placeholder="дата публикации"  value="{{$news->pub_date}}">
    </div>
    <button type="submit">Update</button>
</form>
