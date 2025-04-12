@extends('layouts.index')

@section('content')

<div class="container">
  <div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Manage Data Tata Usaha</h3>
      </div>
    </div>

    <div class="card-body">
      <form method = "POST" action="{{ route('tuStore') }}">
        @csrf
        <div class="form-group">
          <label for="nip">NIP</label>
          <input type="text" class="form-control" name="nip" id="nip" placeholder="Enter NIK" required autofocus maxlength="7"/>
        </div>

        <div class="form-group">
          <label for="nama">Name</label>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Name" required/>
        </div>

        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required/>
        </div>
        
        <div class="form-group">
          <label for="dosenWali">Dosen Wali</label>
          <select class="form-control" name="dosen_nik">
            @foreach($dosens as $dosen)
            
          </select>
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