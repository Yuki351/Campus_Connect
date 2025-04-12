@extends('layouts.index')

@section('content')
<div class="container">
  <div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Upload a PDF File</h3>
      </div>
    </div>
    <div class="card-body">
        @if(session('success'))
          <p style="color: green;">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
          <ul style="color: red;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        @endif
        <div class="form-group">
          <form action="{{ route('tuUpload') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <label for="pdf">Choose PDF file:</label>
              <input type="file" name="pdf" accept="pdf" required>
              <br><br>
              <button type="submit" class="btn btn-success">Upload</button>
          </form>
        </div>
    </div>
  </div>
</div>

@endsection

@section('ExtraCss')

@endsection

@section('ExtraJS')

@endsection