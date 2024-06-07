<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Booking Olahraga</title>
</head>
<body>
    <h1>Daftar Booking Olahraga</h1>
    <pre>{{ var_dump($data) }}</pre> <!-- Tambahkan ini untuk debug -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pemesan</th>
                <th>Jenis Olahraga</th>
                <th>Tanggal Booking</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->nama_pemesan }}</td>
                    <td>{{ $booking->jenis_olahraga }}</td>
                    <td>{{ $booking->tanggal_booking }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
