@extends('main.layout')
@section('content')
    <center>
        <br>
            <h2>EDIT DATA NILAI</h2>
            <form method="POST" action="/nilai/update/{{ $nilai->id }}}">
                @csrf
                <table width="50%">
                    <tr>
                        <td width="bar">Guru & Mapel</td>
                        <td width="bar">
                            <select name="mengajar_id">
                                <option></option>
                                @foreach ($mengajar as $each)
                                    <option value="{{ $each->id }}" @if ($each->id == $nilai->mengajar_id) selected @endif>
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
                                    <option value="{{ $each->id }}" @if ($each->id == $nilai->siswa_id) selected @endif>
                                        {{ $each->nama_siswa }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="bar">UH</td>
                        <td width="bar"><input type="number" name="uh" value="{{ $nilai->uh }}"></td>
                    </tr>
                    <tr>
                        <td width="bar">UTS</td>
                        <td width="bar"><input type="number" name="uts" value="{{ $nilai->uts }}"></td>
                    </tr>
                    <tr>
                        <td width="bar">UAS</td>
                        <td width="bar"><input type="number" name="uas" value="{{ $nilai->uas }}"></td>
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