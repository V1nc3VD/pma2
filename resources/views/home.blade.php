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
                <td>Web</td>
                <td>Laravel-essentials</td>
                <td>
                    <div class="dropdown show">
                        <a class="dropdown-toggle opdrachten" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            2.1 / 2.0
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">
                                1.9
                                <img src="/img/icons/check.svg" alt="" srcset="">
                            </a>
                            <a class="dropdown-item" href="#">1.8</a>
                            <a class="dropdown-item" href="#">1.7</a>
                            <a class="dropdown-item" href="#">
                                1.6
                                <img src="/img/icons/check.svg" alt="" srcset="">
                            </a>
                            <a class="dropdown-item" href="#">
                                1.5
                                <img src="/img/icons/check.svg" alt="" srcset="">
                            </a>
                            <a class="dropdown-item" href="#">
                                1.4
                                <img src="/img/icons/check.svg" alt="" srcset="">
                            </a>
                        </div>
                    </div>
                </td>
                <td>Donderdag 25/3</td>
            </tr>
            <tr>
                <td>Project</td>
                <td>agile cursus</td>
                <td>1.1</td>
                <td>Achter op schema</td>
            </tr>
            <tr>
                <td>PRG</td>
                <td>PRG-basics</td>
                <td>3</td>
                <td>Voor op schema</td>
            </tr>
            @foreach ($opdrachten as $opdracht)
            <tr>
                <td>PRG</td>
                <td>PRG-basics</td>
                <td>{{ $opdracht->Opdracht }}</td>
                <td>Voor op schema</td>
            </tr>
    
    
        @endforeach
        </tbody>
    </table>



@endsection
