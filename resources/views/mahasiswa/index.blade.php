@extends('layouts.index')

@section('content')

<div class="container">
  <div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Manage Data Mahasiswa</h3>
        <h6 class="op-7 mb-2">Managing Students Data</h6>
      </div>
    </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Mahasiswa</h4>
              <a class="btn btn-primary btn-round ms-auto" href="{{ route('mahasiswaCreate') }}">
                <i class="fa fa-plus"></i>
                add row
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table
                  id="basic-datatables"
                  class="display table table-striped table-hover"
                >
                  <thead>
                    <tr>
                      <th>NRP</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Birth Date</th>
                      <th>Phone Number</th>
                      <th>Program Studi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($mahasiswas as $mahasiswa)
                    <tr>
                      <td>{{ $mahasiswa->nrp }}</td>
                      <td>{{ $mahasiswa->nama }}</td>
                      <td>{{ $mahasiswa->email }}</td>
                      <td>{{ $mahasiswa->address }}</td>
                      <td>{{ $mahasiswa->birthdate }}</td>
                      <td>{{ $mahasiswa->phone_number }}</td>
                      <td>{{ $mahasiswa->program_studi }}</td>
                      <td></td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>NRP</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Birth Date</th>
                      <th>Phone Number</th>
                      <th>Program Studi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection

@section('ExtraCss')

@endsection

@section('ExtraJS')

@endsection