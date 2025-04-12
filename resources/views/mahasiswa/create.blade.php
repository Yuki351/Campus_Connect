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
          <input type="text" class="form-control" name="nrp" id="nrp" placeholder="Enter NRP" required autofocus maxlength="9"/>
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
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" required/>
        </div>

        <div class="form-group">
          <label for="birthdate">Birth Date</label>
          <input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="DD/MM/YYYY" required/>
        </div>
        
        <div class="form-group">
          <label for="phone_number">Phone Number</label>
          <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter Phone Number" required/>
        </div>
        
        <div class="form-group">
          <label for="program_studi">Program Studi</label>
          <input type="text" class="form-control" name="program_studi" id="program_studi" placeholder="Enter Program Studi" required/>
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