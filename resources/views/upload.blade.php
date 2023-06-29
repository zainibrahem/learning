<form action="{{ route('pdf.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Upload PDF</button>
</form>