@extends('layouts.index')

@section('content')

<div class="container">
  <div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Manage Data TU</h3>
      </div>
    </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data TU</h4>
              <a class="btn btn-primary btn-round ms-auto" href="{{route ('tuCreate') }}">
                <i class="fa fa-plus">
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
                      <th>NIP</th>
                      <th>Name</th>
                      <th>BirthDate</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>NIP</th>
                      <th>Name</th>
                      <th>BirthDate</th>
                      <th>Email</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($tus as $tu)
                    <tr>
                      <td>{{ $tu->nip }}</td>
                      <td>{{ $tu->name }}</td>
                      <td>{{ $tu->birthdate }}</td>
                      <td>{{ $tu->email }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
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