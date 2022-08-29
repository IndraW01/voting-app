<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Rekap Mahasiswa</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #header {
            margin-top: 10px;
        }

        #header h2 {
            text-align: center;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #046aaa;
            color: white;
        }

        #content-table {
            width: 90%;
            display: flex;
            justify-content: center;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <section id="header">
            <header>
                <h2>Rekap Pemilih</h2>
            </header>
        </section>
        <section id="content">
            <div id="content-table">
                <table id="customers">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Angkatan</th>
                            <th>Kelas</th>
                            <th>Foto</th>
                            <th>Voting</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemilihs as $pemilih)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pemilih->nama }}</td>
                            <td>{{ $pemilih->nim }}</td>
                            <td>{{ $pemilih->angkatan }}</td>
                            <td>{{ $pemilih->kelas }}</td>
                            <td>
                                <img src="{{ asset('storage/pemilih/' . $pemilih->foto_pemilih) }}" width="60px">
                            </td>
                            <td>{{ $pemilih->voting->calon->nama ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
