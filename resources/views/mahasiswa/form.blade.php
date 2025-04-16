@extends('layouts.index')

@section('content')

<div class="container">
  <div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Create Form Pengajuan</h3>
        <h5 class="fw-bold mb-3">Isi Sesuai Keperluan</h4>
      </div>
    </div>

    <div class="card-body">
      <form method = "POST" action="{{ route('mahasiswaForm') }}">
        @csrf
        <div class="form-group">
          <label for="jenis_surat">Select Form Type:</label>
          <select name="jenis_surat" id="jenis_surat" required>
              <option value="">-- Choose a Form --</option>
              <option value="aktif">Surat Keterangan Mahasiswa Aktif</option>
              <option value="tugas">Surat Pengantar Tugas Mata Kuliah</option>
              <option value="lulus">Surat Keterangan Lulus</option>
              <option value="laporan">Surat Laporan Hasil Studi</option>
          </select>
        </div>

        <div class="form-group">
          <label for="nrp">NRP</label>
          <input type="text" class="form-control" name="nrp" id="nrp" placeholder="Enter NIK" required autofocus maxlength="7"/>
        </div>

        <div class="form-group">
          <label for="nama">Name</label>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Name" required/>
        </div>
        
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address"/>
        </div>
        
        <div class="form-group">
          <label for="semester">Semester</label>
          <input type="text" class="form-control" name="semester" id="semester" placeholder="Enter Semester"/>
        </div>

        <div class="form-group">
          <label for="tujuan">Tujuan</label>
          <input type="text" class="form-control" name="tujuan" id="tujuan"/>
        </div>

        <div class="form-group">
          <label for="topik">Topik</label>
          <input class="form-control" name="topik"></select>
        </div>
        <div class="form-group">
          <label for="kodeMK">Kode MK</label>
          <input class="form-control" name="kodeMK"></select>
        </div>
        <div class="form-group">
          <label for="namaMK">Nama MK</label>
          <input class="form-control" name="namaMK"></select>
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


<form action="{{ route('form-requests.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Jenis Surat:</label>
    <select name="form_type" required>
        <option value="aktif">Surat Keterangan Mahasiswa Aktif</option>
        <option value="tugas">Surat Pengantar Tugas Mata Kuliah</option>
        <option value="lulus">Surat Keterangan Lulus</option>
        <option value="laporan">Surat Laporan Hasil Studi</option>
    </select>

    <br><br>

    <label>Keterangan Tambahan:</label>
    <textarea name="description"></textarea>

    <br><br>

    <button type="submit">Kirim</button>
</form>
