@extends('app')

@section('content')
<div class="px-4 py-5">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h4>Detail Surat Masuk</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>No. Surat:</th>
                            <td>{{ $suratmasuk->no_surat }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Surat:</th>
                            <td>{{ $suratmasuk->tgl_surat }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Masuk:</th>
                            <td>{{ $suratmasuk->tgl_masuk }}</td>
                        </tr>
                        <tr>
                            <th>Pengirim:</th>
                            <td>{{ $suratmasuk->pengirim }}</td>
                        </tr>
                        <tr>
                            <th>Isi Ringkas:</th>
                            <td>{{ $suratmasuk->ringkasan }}</td>
                        </tr>
                        <tr>
                            <th>File Surat:</th>
                            <td>{{ $suratmasuk->file_surat }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="{{ route('suratmasuks.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
