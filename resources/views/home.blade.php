@extends('layouts.app')

@section('maincontent')
        <div class="container jumbo">
            <img src="/img/hero.jpg" alt="">
            <div class="container-fluid text-center pb-5">
                <h1 class="text-uppercase text-white">calcola il prezzo del tuo biglietto</h1>
            </div>
        </div>
        <div class="container">
            <div class="card card-input">
                <div class="card-header d-flex justify-content-center gap-5">
                    <h5 class="text-uppercase">andata</h5>
                    <h5 class="text-uppercase">ritorno</h5>
                </div>
                <div id="container" class="container-form">
                    <div class="row d-flex justify-content-center">

                        <div class="col-2 d-flex flex-column align-items-center">
                            <label for="client-name" class=" pb-2 fw-bold">Nome e Cognome</label>
                            <input type="text" name="client-name" id="client-name" placeholder="Inserisci il tuo nome e cognome">
                        </div>
                        <div class="col-2 d-flex flex-column align-items-center">
                            <label for="mileage" class="pb-2 fw-bold">Km di percorrenza</label>
                            <input type="number" min="0" max="1000" step="5" name="mileage" id="mileage" placeholder="Inserisci i km da parcorrere">
                        </div>
                        <div class="col-2 d-flex flex-column align-items-center">
                            <label for="age" class="pb-2 fw-bold">Età del passeggero</label>
                            <select name="age" id="age">
                                <option value="maggiorenne" selected>Maggiorenne</option>
                                <option value="minorenne">Minorenne</option>
                                <option value="over65">Over 65</option>
                            </select>
                        </div>
                        <div class="col-2 d-flex flex-column align-items-center">
                            <label for="date" class="pb-2 fw-bold">Data di partenza</label>
                            <input type="date" name="date" id="date" placeholder="Inserisci la data di partenza">
                        </div>
                        <div class="col-2 d-flex flex-column align-items-center">
                            <div class="box-button d-flex justify-content-center gap-4 py-4">
                                <button class="generate btn border-dark">Genera</button>
                                <button class="cancel btn border-dark">Annulla</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="discount-banner w-75 text-center m-auto py-5 fw-bold">
                <p><em>"Hai mai pensato di <span class="highlighter">risparmiare</span> sul costo dei tuoi viaggi utilizzando i nostri sconti? <br> Se sei minorenne, puoi beneficiare di uno <span class="highlighter">sconto del 20%</span> grazie alla tariffa Junior. <br> Se sei over65, invece, puoi ottenere uno <span class="highlighter">sconto del 40%</span> grazie alla tariffa Senior. <br> Che aspetti? Acquista il tuo biglietto oggi stesso!"</em></p>
            </div>

            <div class="container-output container-fluid text-center py-5 d-none">
                <h1 class="text-uppercase">il tuo biglietto</h1>
            </div>
            <div class="card card-output d-none">
                <div class="row">
                    <div class="col-4 px-5">
                        <h3 class="text-uppercase text-center py-2 fw-bold text-white">dettaglio passeggeri</h3>
                        <div class="box-name d-flex flex-column">
                            <h6 class="text-uppercase pt-3 px-3">nome passeggero:</h6>
                            <div id="print-nameclient" class="px-3 text-uppercase fst-italic"></div>
                            <h6 class="text-uppercase px-3">eta:</h6>
                            <div id="print-age" class="px-3 text-uppercase fst-italic"></div>
                            <h6 class="text-uppercase px-3">tariffa:</h6>
                            <div id="discount" class="px-3 pb-2 text-uppercase fst-italic"></div>


                        </div>
                    </div>
                    <div class="col col-8 py-5">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" class="text-white">Km da percorrere</th>
                                <th scope="col" class="text-white">Carrozza</th>
                                <th scope="col" class="text-white">Posto</th>
                                <th scope="col" class="text-white">Prezzo Totale</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><div id="print-mileage" class="text-white"></div></td>
                                <td><div id="print-carriage" class="text-white"></div></td>
                                <td><div id="print-seat" class="text-white"></div></td>
                                <td><div id="total-price" class="text-white"></div></td>
                              </tr>
                            </tbody>
                        </table>
                        <h6 class="text-white"><em>Questo biglietto è valido solo per il giorno:</em></h6>
                        <div id="print-date" class="text-white"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-output container-fluid text-center py-2">
            <h1 class="text-uppercase">treni in partenza</h1>
        </div>
        <div class="container" id="departing-trains">
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

