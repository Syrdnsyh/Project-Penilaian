@extends('main.layout')
@section('content')
    <center>
        <br>
            <h2>TAMBAH DATA NILAI</h2>
            <form method="POST" action="/nilai/store">
                @csrf
                <table width="50%">
                    <tr>
                        <td width="bar">Guru & Mapel</td>
                        <td width="bar">
                            <select name="mengajar_id">
                                <option></option>
                                @foreach ($mengajar as $each)
                                    <option value="{{ $each->id }}">
                                        {{ $each->mapel->nama_mapel }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="bar">Siswa</td>
                        <td width="bar">
                            <select name="siswa_id">
                                <option></option>
                                @foreach ($siswa as $each)
                                    <option value="{{ $each->id }}">
                                        {{ $each->nama_siswa }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="bar">UH</td>
                        <td width="bar"><input type="number" name="uh"></td>
                    </tr>
                    <tr>
                        <td width="bar">UTS</td>
                        <td width="bar"><input type="number" name="uts"></td>
                    </tr>
                    <tr>
                        <td width="bar">UAS</td>
                        <td width="bar"><input type="number" name="uas"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><button class="button-primary" type="submit"> SIMPAN </button></center>
                        </td>
                    </tr>
                </table>
            </form>
    </center>
@endsection