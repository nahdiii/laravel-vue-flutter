<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('update-subunit/'.$dtSu->id) }}" method="post">
        {{ csrf_field() }}
        <div>
            <select name="unit_id" id="unit_id">
                <option disabled value>Pilih Unit</option>
                <option value="{{ $dtSu->id }}">{{ $dtSu->unit->namaunit }} (v)</option>
                @foreach ($dataunit as $item)
                <option value="{{ $item->id }}">{{ $item->namaunit }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="text" name="namasubunit" id="namasubunit" value="{{ $dtSu->namasubunit }}">

        </div>
        <div>
            <button type="submit">Ubah</button>
        </div>
    </form>
</body>
</html>
