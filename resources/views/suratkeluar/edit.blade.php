@extends('app')
@section('content')
<div class="px-4 py-5">
<div class="card">
<div class="card-header">
<div class="card-title"><h4>Ubah Surat Keluar</h4></div>
</div>
<div class="card-body">

<form action="{{ route('suratkeluars.update', $suratkeluar->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <p><b>Kolom bertanda <span class="text-danger">*)</span> tidak boleh kosong</b></p>
  <div class="row">
      <div class="col">
        <label for="">No. Surat <span class="text-danger">*)</span></label>
        <input type="text" name="nosurat" class="form-control @if($errors->has('nosurat')) is-invalid @endif" placeholder="Masukkan No. Surat" value="{{$suratkeluar->no_surat}}">                  
          @if($errors->has('nosurat'))
          <small class="text-danger">
            {{$errors->first('nosurat')}}
          </small>
          @endif
        
      </div>
  </div>
  <div class="row mt-3">
      <div class="col">
        <label for="">Tgl. Surat <span class="text-danger">*)</span></label>
        <input type="date" name="tglsurat" class="form-control @if($errors->has('tglsurat')) is-invalid @endif" placeholder="Masukkan Tgl. Surat" value="{{$suratkeluar->tgl_surat}}">                  
          @if($errors->has('tglsurat'))
          <small class="text-danger">
            {{$errors->first('tglsurat')}}
          </small>
          @endif
        
      </div>
  </div>
  <div class="row mt-3">
      <div class="col">
        <label for="">Tgl. Keluar <span class="text-danger">*)</span></label>
        <input type="date" name="tglkeluar" class="form-control @if($errors->has('tglkeluar')) is-invalid @endif" placeholder="Masukkan Tgl. Keluar" value="{{$suratkeluar->tgl_keluar}}">                  
          @if($errors->has('tglkeluar'))
          <small class="text-danger">
            {{$errors->first('tglkeluar')}}
          </small>
          @endif
        
      </div>
  </div>
  <div class="row mt-3">
      <div class="col">
        <label for="">Tujuan <span class="text-danger">*)</span></label>
        <input type="text" name="tujuan" class="form-control @if($errors->has('tujuan')) is-invalid @endif" placeholder="Masukkan Penerima Surat" value="{{$suratkeluar->tujuan}}">                  
          @if($errors->has('tujuan'))
          <small class="text-danger">
            {{$errors->first('tujuan')}}
          </small>
          @endif
        
      </div>
  </div>

  <div class="row mt-3">
      <div class="col">
        <label for="">Isi Ringkas <span class="text-danger">*)</span></label>
        <textarea name="isi" class="form-control @if($errors->has('isi')) is-invalid @endif" placeholder="Masukkan Isi Ringkas" rows="5">{{$suratkeluar->ringkasan}}</textarea>
        
          @if($errors->has('isi'))
          <small class="text-danger">
            {{$errors->first('isi')}}
          </small>
          @endif
        
      </div>
  </div>

  <div class="row mt-3">
      <div class="col">
        <label for="">File Surat <span class="text-danger">*)</span></label>
        <input type="file" name="file" class="form-control @if($errors->has('file')) is-invalid @endif" placeholder="Pilih File" value="{{old('file')}}">
        <small>Tipe File : PDF. Max : 10 MB.</small>     <br> 
        <a href="{{url('suratkeluarfile/'.$suratkeluar->file_surat)}}" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-file"></i> Lihat File</a>            
          @if($errors->has('file'))
          <br>
          <small class="text-danger">
            {{$errors->first('file')}}
          </small>
          @endif
        
      </div>
  </div>

</div>
<div class="card-footer">
<div class="my-2">
    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan Data</button>
    <a href="{{route('suratkeluars.index')}}" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
</div>
</form>
</div>
</div>    
</div>
@endsection