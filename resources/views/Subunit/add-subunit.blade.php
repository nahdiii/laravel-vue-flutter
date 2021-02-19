<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('simpan-subunit') }}" method="post">
        {{ csrf_field() }}
        <div>
            <select name="unit_id" id="unit_id">
                <option disabled value>Pilih Unit</option>
                @foreach ($dataunit as $item)
                <option value="{{ $item->id }}">{{ $item->namaunit }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="text" name="namasubunit" id="namasubunit">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</body>
</html>
