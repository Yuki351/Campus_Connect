@extends('layouts.index')

@section('content')

<div class="container">
  <div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Create Data Mahasiswa</h3>
        <h6 class="op-7 mb-2">Adding Students Data into Database</h6>
      </div>
    </div>

    <div class="card-body">
      <form method = "POST" action="{{ route('mahasiswaStore') }}">
        @csrf
        <div class="form-group">
          <label for="nrp">NRP</label>
          <input type="text" class="form-control" id="nrp" placeholder="Enter NIK" required autofocus maxlength="7"/>
        </div>

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" placeholder="Enter Name" required/>
        </div>

        <div class="card-action">
          <input type="submit" class="btn btn-success">
          <input type="reset", value="cancel" class="btn btn-danger">
        </div>
      </form>
    </div>

  </div>
</div>
@endsection

@section('ExtraCss')

@endsection

@section('ExtraJS')

@endsection