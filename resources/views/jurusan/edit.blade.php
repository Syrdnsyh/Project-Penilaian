@extends('main.layout')
@section('content')
    <center>
        <br>
            <h2>EDIT JURUSAN</h2>
            @if (session('success'))
            <p class="text-success">{{ session('success') }}</p>
            @endif
            @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
            @endif
            <form method="post" action="/jurusan/update/{{ $jurusan->id }}">
                @csrf
                <table width="50%">
                    <tr>
                        <td class="bar">Nama Jurusan</td>
                        <td>
                            <input type="text" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><button class="button-primary" type="submit"> PERBARUI </button></center>
                        </td>
                    </tr>
                </table>
            </form>
    </center>
@endsection