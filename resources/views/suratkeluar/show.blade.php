@extends('app')

@section('content')
<div class="px-4 py-5">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h4>Detail Surat Keluar</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>No. Surat</th>
                            <td> : {{ $suratkeluar->no_surat }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Surat</th>
                            <td> : {{ $suratkeluar->tgl_surat }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Keluar</th>
                            <td> : {{ $suratkeluar->tgl_keluar }}</td>
                        </tr>
                        <tr>
                            <th>Tujuan</th>
                            <td> : {{ $suratkeluar->tujuan }}</td>
                        </tr>
                        <tr>
                            <th>Isi Ringkas</th>
                            <td> : {{ $suratkeluar->ringkasan }}</td>
                        </tr>
                        <tr>
                            <th>File Surat</th>
                            <td> <p> : <a href="{{ Storage::url('public/suratkeluar/' . $suratkeluar->file_surat) }}" target="_blank">{{ $suratkeluar->file_surat }}</a></p></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="{{ route('suratkeluars.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
