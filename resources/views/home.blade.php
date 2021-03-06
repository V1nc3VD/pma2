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

            @foreach ($cursussen as $cursus)
                <tr>

                    <td></td>
                    <td>{{ $cursus->CursusNaam }} </td>
                    <td>


                        <div class="dropdown">
                            <a class="dropdown-toggle opdrachten" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opdrachten
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                    @foreach ($cursus->getOpdracht as $opdracht)
                                        <a class="dropdown-item" href="#">{{$opdracht->Opdracht}} 
                                            @if(isset($opdracht->opdrachtVoortgang->IsKlaar) && $opdracht->opdrachtVoortgang->IsKlaar==1  )
                                            <img   src="/img/icons/check.svg" alt="af">
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
                </tr>
            @endforeach
        </tbody>
    </table>



@endsection
