@extends('layouts.app')

@section('content')
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Les</th>
                <th scope="col">Cursus</th>
                <th scope="col">Mijn progressie</th>
                <th scope="col">Datum</th>
            </tr>
        </thead>
        <tbody>
            <tr>

           {{-- @foreach ($klascursussen as $cursus)
                <tr>
                    <td>d</td>
                    <td>{{ $cursus->CursusNaam }}</td>
                    <td>
                        @foreach ($opdrachten as $opdracht)
                            {{ $opdracht->Opdracht }} 
                        @endforeach
                    </td>
                </tr> --}}

            @foreach ($cursussen as $cursus)
            <tr>
                <td>d</td>
                <td>{{$cursus->CursusNaam}} </td>
                <td>  
                    @foreach($cursus->getOpdracht as $opdracht)
                    <li> {{ $opdracht->Opdracht }}</li>
                  @endforeach
                </td>
            </tr>
                

            @endforeach
        </tbody>
    </table>



@endsection
