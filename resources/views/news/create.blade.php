<form action="{{route('news.store')}}" method="post">
    @csrf
    <div>
        <input type="text" name="header" id="" placeholder="заголовок">
    </div>
    <div>
        <input type="text" name="anons" id="" placeholder="анонс">
    </div>
    <div>
        <input type="text" name="body" id="" placeholder="Текст">
    </div>
    <div>
        <input type="text" name="teg" id="" placeholder="Теги">
    </div>
    <div>
        <input type="datetime-local" name="pub_date" id="" placeholder="дата публикации">
    </div>
    <button type="submit">Submit</button>
</form>
