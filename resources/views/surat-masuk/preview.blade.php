@extends('layouts.main')

@section('title','Preview Surat')

@section('content')

<h4>📄 Preview Surat</h4>

<iframe 
    src="/uploads/{{ $surat->file_surat }}" 
    width="100%" 
    height="600px"
    style="border:1px solid #ccc;">
</iframe>

@endsection
