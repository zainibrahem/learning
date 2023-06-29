<h2>Edit PDF</h2>

<form action="{{ route('pdf.save', $pdf->id) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="POST">

    <!-- Add your PDF editing fields here -->
    <!-- For example: -->
    <textarea name="content" rows="10" cols="50">{{ $pdf->content }}</textarea>

    <button type="submit">Save PDF</button>
</form>