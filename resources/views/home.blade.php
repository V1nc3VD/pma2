@extends('layouts.app')

@section('content')
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Les</th>
                <th scope="col">Cursus</th>
                <th scope="col">Mijn progressie</th>
                <th scope="col">Datum aankomende opdracht</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach ($cursussen as $cursus)    

            
            <tr>
                <td>
                    {{-- get the lesson the course belongs to--}}
                    {{ $cursus->VakAfkorting }}
                </td>
                {{--coursename  --}}
                <td>{{ $cursus->CursusNaam }} </td>
                <td>
                    <div class="dropdown">
                        <a class="dropdown-toggle opdrachten" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            
                            {{$cursus->getOpdracht->where('opdrachtvoortgang.IsKlaar', '1')->sortByDesc('OpdrachtID')->first()->opdrachtVoortgang}}
                            {{-- This must show the last finished exercise--}}
                            
                                                        /
                            {{-- Displays exercise (opdracht) with nearest deadline--}}
                            {{$cursus->getAankomendeOpdracht()->Opdracht ?? '0'}}
                            
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                           
                            @foreach ($cursus->getOpdracht as $opdracht)
                                <a class="dropdown-item" href="#">
                                    {{ $opdracht->Opdracht }}
                    
                                    ID{{$opdracht->OpdrachtID}}
                                    {{-- Put check next to exercise in dropdown if it's finished (isKlaar = 1)--}}
                                    @if (isset($opdracht->opdrachtVoortgang->IsKlaar) && $opdracht->opdrachtVoortgang->IsKlaar == 1)
                                        <img src="/img/icons/check.svg" alt="af">
                                    @endif

                                </a>
                            @endforeach

                            {{-- @foreach ($cursus->getVoortgang as $voortgang)
                                         {{ $voortgang }} <img
                                                src="/img/icons/check.svg" alt="">
                                    @endforeach --}}
                        </div>
                    </div>
                </td>
                <td>
                    {{$cursus->getAankomendeOpdracht()->Deadline ?? "No deadline"}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



@endsection
