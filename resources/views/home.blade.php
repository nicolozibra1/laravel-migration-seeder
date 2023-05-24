@extends('layouts.app')

@section('maincontent')

    <main>
        <h1>ciao</h1>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Treno</th>
                        <th>Stazione di partenza</th>
                        <th>Stazione di arrivo</th>
                        <th>Orario di partenza</th>
                        <th>Orario di arrivo</th>
                        <th>Codice Treno</th>
                        <th>Numero Carrozze</th>
                        <th>In orario</th>
                        <th>Cancellato</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trains as $train)
                    <tr>
                        <td class="fw-semibold">{{$train->company}}</td>
                        <td>{{$train->departure_station}}</td>
                        <td>{{$train->arrival_station}}</td>
                        <td>{{$train->departure_time}}</td>
                        <td>{{$train->arrival_time}}</td>
                        <td>{{$train->train_code}}</td>
                        <td>{{$train->carriage_count}}</td>
                        <td class="text-warning text-uppercase fw-semibold">
                            @if ($train->on_schedule == 1)
                            {{ $train->on_schedule == 1 ? 'In ritardo' : '' }}
                            @endif
                        </td>
                        <td class="text-danger text-uppercase fw-semibold">
                            @if ($train->cancelled == 1)
                            {{ $train->cancelled == 1 ? 'Cancellato' : '' }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>

@endsection

