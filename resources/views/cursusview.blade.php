@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>{{ $cursus->CursusNaam }}</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Opdracht</th>
                    <th scope="col">Af</th>
                    <th scope="col">Deadline</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursus->getOpdracht as $opdracht)
                    <tr>
                        <td>{{$opdracht->Opdracht}}</td>
                        <td>d</td>
                        <td>d</td>
                    </tr>
                @endforeach






            </tbody>
        </table>
    </div>

@endsection
