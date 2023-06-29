<h2>Download Edited PDF</h2>

<!-- Display the edited PDF content here -->
<!-- For example: -->
<pre>{{ $pdf->content }}</pre>

<a href="{{ route('pdf.download', $pdf->id) }}">Download PDF</a>