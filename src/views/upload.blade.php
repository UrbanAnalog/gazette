<form action="{{ route('gazette.upload') }}" method="post" enctype="multipart/form-data">
    <input type="file" name="asset">
    <button type="submit">Upload</button>
    {{ csrf_field() }}
</form>
