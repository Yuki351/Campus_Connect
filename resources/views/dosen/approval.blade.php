@extends('layouts.index')

@section('content')

<div class="container">
  <div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Manage Data Dosen</h3>
      </div>
    </div>

    <div class="card-body">
        @foreach($requests as $request)
            <div>
                <h4>{{ $request->form_type }}</h4>
                <p>{{ $request->description }}</p>
                <form method="POST" action="{{ route('form-requests.approve', $request->id) }}">
                    @csrf @method('PATCH')
                    <textarea name="dosen_notes" placeholder="Catatan..."></textarea>
                    <button name="action" value="approve">Approve</button>
                    <button name="action" value="disapprove">Disapprove</button>
                </form>
            </div>
        @endforeach
  </div>
</div>

@endsection

@section('ExtraCss')

@endsection

@section('ExtraJS')

@endsection