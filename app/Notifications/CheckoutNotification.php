<?php

namespace App\Notifications;

use App\Models\OrderProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;

class CheckoutNotification extends Notification
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Narudžbina sa sajta investiciono-zlato.rs')
            ->greeting(' ')
            ->line(new HtmlString($this->generateInvoiceHtml()))
            ->salutation(' ');
    }

    public function generateInvoiceHtml()
    {


        $html = '';
        $html .= '<p>' . $this->order->first_name . ' ' . $this->order->last_name . ',</p>';
        $html .= '<p>Hvala Vam što kupujete u internet prodavnici <a href="https://investiciono-zlato.rs/"> https://investiciono-zlato.rs/ </a></p>';
        $html .= '<p style="border-bottom:1px dotted black;padding-bottom:10px">U nastavku se nalaze instrukcije za uplatu, pa Vas pozivamo da u naznačenom roku izvršite uplatu.</p>';
        $html .= '<p style="color:black"><b> Uplatu izvršiti u korist primaoca: Zlatni Standard d.o.o. Beograd </b></p>';
        $html .= '<p style="color:black"><b> Svrha plaćanja: kupovina proizvoda preko interneta </b></p>';
        $html .= '<p style="color:black"><b> Šifra plaćanja: 289 </b></p>';
        $html .= '<h1 style="color:black;font-size:25px"> Broj računa primaoca kod Raiffeisen banka a.d. Beograd: 265-1110310003931-40 </h1>';
        $html .= '<p style="border-bottom:1px solid black;color:black;padding-bottom:10px"><b> Važna napomena: Uplatu po ovim instrukcijama izvršiti u roku od 2 sata. U slučaju da ne izvršite uplatu u ostavljenom roku, napred navedene cene neće biti važeće, niti će biti obavezujuće za prodavca da po njima izvrši kupoprodajnu transakciju. </b></p>';
        $html .= '<p> Ako imate pitanja, možete nas kontakirati na broj <a href="tel:+381 63 7709 128"> +381 63 7709 128 </a></p>';
        $html .= '<p> Ako imate pitanja o svojoj porudžbini, možete nam poslati e-poštu na <a href="mailto:internet.prodavnica@zlatnistandard.rs"> internet.prodavnica@zlatnistandard.rs. </a></p>';


        $orderProducts = OrderProduct::with('product')->where('order_id', $this->order->id)->get();
        $productsHtml = '<table style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sifra</th>
                                    <th>Naziv</th>
                                    <th>Količina</th>
                                    <th>Pojedinačna cena</th>
                                    <th>Ukupno</th>
                                </tr>
                            </thead>
                            <tbody>';
        foreach ($orderProducts as $oProduct) {
            $cenaStampe = 0;
            $cenaStampeText = '';
            $stampaText = '';
            if ($oProduct->product->categories[0]->slug == 'olovke' || $oProduct->product->categories[0]->slug == 'upaljaci') {
                $cenaStampe = $oProduct->quantity * 0.1;
                $cenaStampeText = '<small>' . $oProduct->quantity . ' x 0.1 = ' . $cenaStampe . '€</small>';
                $stampaText = 'Stampa 0.1€';
            }
            if ($oProduct->product->categories[0]->slug == 'rokovnici-i-notesi' || $oProduct->product->categories[1]->slug == 'papirne-kese' || $oProduct->product->categories[1]->slug == 'biorazgradive-kese') {
                $cenaStampe = $oProduct->quantity * 0.5;
                $cenaStampeText = '<small>' . $oProduct->quantity . ' x 0.5€ = ' . $cenaStampe . '€</small>';
                $stampaText = 'Stampa 0.5€';
            }

            $productsHtml .= '<tr>
                                <td style="text-align:center">' . $oProduct->meta_external_id . '</td>
                                <td style="text-align:center">' . $oProduct->product->name . '</td>
                                <td style="text-align:center">' . $oProduct->quantity . '</td>
                                <td style="text-align:center">' . $oProduct->product->price . '€ <br><small>' . $stampaText . '</small> </td>
                                <td style="text-align:center">' . $oProduct->product->price * $oProduct->quantity . '€ <br> ' . $cenaStampeText . '</td>
                            </tr>';
        }
        $productsHtml .= '<tr>
                            <td colspan="4" style="text-align:right">Međuzbir </td>
                            <td style="text-align:center">' . $this->order->subtotal . '€</td>
                        </tr>';
        $productsHtml .= '<tr>
            <td colspan="4" style="text-align:right">Ovom porudžbinom ste uštedeli </td>
            <td style="text-align:center">' . $this->order->subtotal - $this->order->total . '€</td>
        </tr>';
        $productsHtml .= '<tr>
            <td colspan="4" style="text-align:right">Ukupno </td>
            <td style="text-align:center">' . $this->order->total . '€</td>
        </tr>';
        $productsHtml .= '</tbody>';
        $productsHtml .= '</table>';

        $html .= '<h1 style="text-align:center">Potvrda porudžbine ' . $this->order->oid . '</h1>';
        $html .= '<p style="text-align:center;padding:0;margin:0"><small>Ovaj e-mail je informacionog karaktera o vašoj porudžbini</small></p>';
        $html .= $productsHtml;
        $html .= '<p style="margin-top:70px">Vaša porudžbina je uspešno primljena i evidentirana pod brojem: ' . $this->order->oid . '</p>';
        $html .= '<p>Vaša porudžbina je u procesu obrade i proizvod možete očekivati u roku od 2 do 7 radnih dana. 
                 Ukoliko prilikom obrade porudžbine primetimo da proizvod više nemamo na stanju bićete naknadno 
                 obavešteni na mail adresu koju ste ostavili . Informacije o terminu isporuke, kao i kod kojim ćete moći da 
                 pratite status Vaše pošiljke stići će Vam na registrovan e-mail kada kurirska služba preuzme pošiljku.</p>';
        $html .= '<p>Očekujte potvrdu porudžbine i predračun u sledećem mejlu u što skorijem roku.</p>';
        Log::info($html);
        return $html;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
