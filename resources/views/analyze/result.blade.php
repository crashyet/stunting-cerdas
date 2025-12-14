<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  

<div class="container py-5">

    <h2 class="mb-4 fw-bold">Hasil Analisis AI</h2>

    {{-- Tombol kembali --}}
    <a href="{{ url('/') }}" class="btn btn-secondary mb-4">← Kembali</a>

    {{-- Jika Node error dan raw text ikut dikirim --}}
    @if(session('raw_output'))
        <div class="alert alert-danger">
            <strong>Response dari Node bukan JSON valid:</strong>
            <pre>{{ session('raw_output') }}</pre>
        </div>
    @endif

    {{-- Debug error lain --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tampilkan hasil JSON yang sudah didecode --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header fw-bold">Hasil JSON</div>
        <div class="card-body">
            <pre>{{ json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
        </div>
    </div>

    {{-- Tampilkan output raw dari Gemini (untuk jaga-jaga) --}}
    <div class="card shadow-sm">
        <div class="card-header fw-bold">Raw Output dari Gemini</div>
        <div class="card-body">
            <pre style="white-space: pre-line;">{{ $raw }}</pre>
        </div>
    </div>

</div>

</body>
</html>