<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #b40c0c;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #2baa5c;
}

.tengah{
    text-align: center;
    text-decoration: underline;
}

</style>
</head>
<body>

<h2 class="tengah">Data Member</h2>

<table>
  <tr>
      <th>NO.</th>
      <th>Nama Lengkap</th>
      <th>NPM</th>
      <th>Tempat, Tanggal Lahir</th>
      <th>Email</th>
      <th>Jenis Kelamin</th>
  </tr>
  @php $no=1;  @endphp
  @foreach($data as $member)
    <tr>
        <td> {{ $no++ }} </td>
        <td> {{ $member->nama }} </td>
        <td> {{ $member->npm }} </td>
        <td> {{ $member->tempat_lahir }}, {{ date('d-m-Y', strtotime($member->tgl_lahir)) }} </td>
        <td> {{ $member->user->email }} </td>
        <td> {{ $member->jk == 'L' ? 'Laki-laki' : 'Perempuan' }} </td>
    </tr>
  @endforeach
</table>

</body>
</html>
