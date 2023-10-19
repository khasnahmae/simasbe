<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan PDF</title>
</head>
<body>
<center>
		<h5>Laporan Data Surat Keluar</h5>
	</center>

  <table border="1" cellpadding="3" cellspacing="0" width="100%" style="border-collapse:collapse;">
      <thead>
        <tr>
          <th>No.Surat</th>
          <th>Tgl. Surat</th>
          <th>Tgl. Keluar</th>
          <th>Tujuan</th>
          <th>Isi Ringkas</th>
        </tr>
      </thead>
      <tbody>
        @foreach($query as $row)
          <tr>
            <td>{{$row->no_surat}}</td>
            <td>{{$row->tgl_surat}}</td>
            <td>{{$row->tgl_keluar}}</td>
            <td>{{$row->tujuan}}</td>
            <td>{{$row->ringkasan}}</td>
            
          </tr>
        @endforeach
      </tbody>
    </table>
</body>
</html>