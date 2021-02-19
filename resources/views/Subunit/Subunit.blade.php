<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <a href="{{ url('add-subunit') }}" class="btn btn-primary">TAMBAH DATA BARU</a>

    </div>
    <div>
        <table border="1">
            <tr>
                <th>Unit</th>
                <th>Subunit</th>
                <th>Aksi</th>
            </tr>
            @foreach ($dt as $item)
            <tr>
                <td>{{ $item->unit->namaunit }}</td>
                <td>{{ $item->namasubunit }}</td>
                <td>
                    <a href="{{ url('edit-subunit/'.$item->id) }}">Edit</a>
                    |
                    <a href="{{ url('hapus-subunit/'.$item->id) }}">Hapus</a>

                </td>
            </tr>
            @endforeach
        </table>
    </div>

</body>
</html>
