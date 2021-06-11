@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Vak</th>
                <th scope="col">Cursus</th>
                <th scope="col">Progressie / Aankomende </th>
                <th scope="col">Datum aankomende opdracht</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($cursussen as $cursus)
            {{--Tablerow class verandert naar "af" wanneer het op schema is --}}

                 
            <tr class="{{$cursus->checkOpSchema()}}">
                        <td>
                            {{-- get the lesson the course belongs to --}}
                            {{ $cursus->VakAfkorting }}
                        </td>
                        {{-- coursename --}}
                        <td>{{ $cursus->CursusNaam }} </td>
                        <td>
                        <div class="dropdown">
                                <a class="dropdown-toggle opdrachten" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    {{ $cursus->getOpdrachtLaatstAfgemaakt()->Opdracht ?? 0}}
                                    /
                                    {{-- Displays exercise (opdracht) with nearest deadline --}}
                                    {{ $cursus->getAankomendeOpdracht()->Opdracht ??  $cursus->getOpdrachtLaatstAfgemaakt()->Opdracht ?? '' }}

                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                    @foreach ($cursus->getOpdracht as $opdracht)
                                        <a class="dropdown-item" href="#">
                                            {{ $opdracht->Opdracht }}
                                            {{-- Put check next to exercise in dropdown if it's finished (isKlaar = 1) --}}
                                            @if (isset($opdracht->opdrachtVoortgang->IsKlaar) && $opdracht->opdrachtVoortgang->IsKlaar == 1)
                                                <img src="/img/icons/check.svg" alt="af">
                                            @endif

                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $cursus->getAankomendeOpdracht()->Deadline ?? 'Geen nieuwe deadline' }}
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
