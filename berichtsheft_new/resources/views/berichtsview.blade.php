@extends('index')

@section('body')
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #228B22;
            color: white;
        }

        td, th {
            border: 1px solid black;
            padding: 8px;
        }

        td {
            background-color: White;
        }
    </style>
    <table border='1px solid black;'>
        <tr>
            <th>Mitarbeiter ID</th>
            <th>Datum</th>
            <th>Bericht</th>
            <th>actions</th>
        </tr>
        @foreach($berichte as $bericht)
            <tr>
                <td>{{$bericht->mitarbeiter->Vorname}} {{$bericht->mitarbeiter->Nachname}}</td>
                <td>{{$bericht->Datum}}</td>
                <td>{{$bericht->Bericht}}</td>
            </tr>
        @endforeach
    </table>
@endsection

