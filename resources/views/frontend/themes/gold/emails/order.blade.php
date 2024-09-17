<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
        }

        .info {
            margin-bottom: 20px;
        }

        .info h3 {
            margin-bottom: 10px;
        }

        .contact {
            margin-top: 20px;
            display: flex;
            width: 100%;
            margin-bottom: 30px;
        }

        .contact p {
            margin: 5px 0;
        }

        .contact .payment {
            width: 50%;
        }

        .contact .delivery {
            width: 50%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Porudžbina #{{ $order->oid }}</h2>
        <div class="info">
            <p>{{ $order->first_name }} {{ $order->last_name }},</p>
            <p>Hvala Vam što kupujete u internet prodavnici <a rel="noopener nofollow noreferrer"
                    href="https://investiciono-zlato.rs/">https://investiciono-zlato.rs/</a></p>
            <p>U nastavku se nalaze instrukcije za uplatu, pa Vas pozivamo da u naznačenom roku izvršite uplatu.</p>
            <hr>
            @if ($order->shipping_service_id > 1 && $order->payment_method_id == 2)
                <p> <b> Plaćanje prilikom preuzimanja porudžbine od kurira </b></p>
            @else
                <p><b> Uplatu izvršiti u korist primaoca: Zlatni Standard d.o.o. Beograd </b></p>
                <p><b> Svrha plaćanja: kupovina proizvoda preko interneta </b></p>
                <p><b>Šifra plaćanja: 289 </b></p>
                <h2>Broj računa primaoca kod Raiffeisen banka a.d. Beograd: 265-1110310003931-40</h2>
                <p><b>Važna napomena: Uplatu po ovim instrukcijama izvršiti u roku od 2 sata. U slučaju da ne izvršite
                        uplatu u
                        ostavljenom roku, napred navedene cene neće biti važeće, niti će biti obavezujuće za prodavca da
                        po
                        njima izvrši kupoprodajnu transakciju. </b></p>
            @endif

        </div>
        <hr>
        <div>
            <h2>Vaša porudžbina #{{ $order->oid }}</h2>
            <hr>
            {{ $order->created_at }}
        </div>
        <div class="contact">
            <div class="payment">
                <h3>Informacije o naplati</h3>
                <p>{{ $order->first_name }} {{ $order->last_name }}</p>
                <p>{{ $order->address }}</p>
                <p>{{ $order->zip }}, {{ $order->city }}</p>
                <p>{{ $order->phone }}</p>
                <p>JMBG: {{ $order->jmbg }}</p>
                <div>
                    <h3>Način plaćanja</h3>
                    <p>{{ $order->pmethod->name }}</p>
                </div>
            </div>
            <div class="delivery">
                <h3>Informacije o dostavi</h3>
                <p>{{ $order->first_name }} {{ $order->last_name }}</p>
                <p>{{ $order->address }}</p>
                <p>{{ $order->zip }}, {{ $order->city }}</p>
                <p>{{ $order->phone }}</p>
                <p>JMBG: {{ $order->jmbg }}</p>
                <div>
                    <h3>Način dostave</h3>
                    <p>{{ $order->shipp->name }}</p>
                </div>

            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Proizvod/a</th>
                    <th>Količina</th>
                    <th>Cena</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderProducts as $product)
                    <tr>
                        <td>
                            {{ $product->product->name }}
                            @if ($product->avans_price)
                                <span style="font-size: 10px">Avansna cena</span>
                            @else
                                <span style="font-size: 10px">Lager cena</span>
                            @endif
                        </td>
                        <td style="text-align: right;"> {{ $product->quantity }}</td>
                        @if (isset($product->total_price_without_pdv))
                            <td style="text-align: right;">
                                {{ number_format($product->total_price_without_pdv, 2, ',', '.') }}
                                {{ $currency }}
                            </td>
                        @else
                            <td style="text-align: right;">
                                {{ number_format($product->total_price, 2, ',', '.') }}
                                {{ $currency }}
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="total" style="text-align: right">Ukupno</td>
                    <td style="text-align: right;" class="total">{{ number_format($order->subtotal, 2, ',', '.') }}
                        {{ $currency }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="total" style="text-align: right">Dostava</td>
                    <td style="text-align: right;" class="total">{{ number_format($order->shipping, 2, ',', '.') }}
                        {{ $currency }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="total" style="text-align: right">PDV</td>
                    <td style="text-align: right;" class="total">
                        {{ number_format($pdvPrice, 2, ',', '.') }} {{ $currency }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="total" style="text-align: right">Ukupno</td>
                    <td style="text-align: right;" class="total">{{ number_format($order->total, 2, ',', '.') }}
                        {{ $currency }}</td>
                </tr>
            </tfoot>
        </table>
        <div>
            <p><b>Virmansko plaćanje ili plaćanje uplatnicom prema dostavljenim instrukcijama za plaćanje</b></p>
            <p><b>Način dostave:</b> Isporuka - dostava kurirskom službom, odnosno preuzimanje proizvoda, prema
                obaveštenju koje je dato prilkom kreiranja porudžine</p>
            <p><b> OPŠTE USLOVE KUPOVINE NA INTERNET STRANICI </b> možete ponovo pročitati <a
                    href="https://investiciono-zlato.rs/opsti-uslovi-kupovine"> ovde</a></p>
            <i>U prilogu ove poruke možete naći Opšte uslove kupovine, Obaveštenje o obradi podataka o ličnosti i
                Obaveštenje vezano za primenu Zakona o zaštiti potrošača.</i>
        </div>

    </div>
    <div class="footer">
        <p>Ime društva: Zlatni Standard d.o.o. Beograd</p>
        <p>Datum osnivanja: 7. februar 2020. godine</p>
        <p>Matični broj: 21554723</p>
        <p>Poreski identifikacioni broj: 111859731</p>
        <p>+381 63 7709 128</p>
        <p><a href="mailto:internet.prodavnica@zlatnistandard.rs">internet.prodavnica@zlatnistandard.rs</a></p>
        <p>© Zlatni Standard. Sva prava zadržana.</p>
    </div>
</body>

</html>
