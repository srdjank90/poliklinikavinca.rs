<?php

namespace App\Console\Commands;

use App\Models\ServiceItem;
use Illuminate\Console\Command;

class ServiceItemImporter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->insertData();
    }

    public function insertData()
    {
        $data = $this->preparedJson();
        foreach ($data as $item) {
            $prepared = [
                'name' => $item['service'],
                'price' => $item['price'],
                'service_id' => 11,
                'discount' => 20
            ];
            ServiceItem::create($prepared);
        }
    }

    public function preparedJson()
    {
        $servicesOpstaPraksa = [
            [
                'service' => 'Pregled lekara opšte medicine u ambulanti',
                'price' => 2500
            ],
            [
                'service' => 'Kontrolni pregled lekara opšte medicine (do 7 dana nakon obavljenog pregleda)',
                'price' => 2000
            ],
            [
                'service' => 'Konsultacija lekara opšte medicine (izdavanje recepta, tumačenje rezultata i sl.)',
                'price' => 1000
            ],
            [
                'service' => 'Plasiranje katetera (sa kateterom)',
                'price' => 3000
            ],
            [
                'service' => 'Sutura rane',
                'price' => 3500
            ],
            [
                'service' => 'Previjanje i obrada rane (hirurški)',
                'price' => 3000
            ],
            [
                'service' => 'Previjanje manje rane',
                'price' => 800
            ],
            [
                'service' => 'Previjanje veće rane',
                'price' => 1500
            ],
            [
                'service' => 'Postavljanje štrajfne sa lekom',
                'price' => 900
            ],
            [
                'service' => 'Obrada dekubita (manje polje)',
                'price' => 2500
            ],
            [
                'service' => 'Obrada dekubita (veće polje)',
                'price' => 3000
            ],
            [
                'service' => 'Skidanje konaca',
                'price' => 800
            ],
            [
                'service' => 'Ukljanjanje krpelja (hirursko – sa incizijom)',
                'price' => 3500
            ],
            [
                'service' => 'Uklanjanje krpelja',
                'price' => 1500
            ],
            [
                'service' => 'Fiksiranje longetom',
                'price' => 5000
            ],
            [
                'service' => 'Intervencija – vađenje stranog tela',
                'price' => 2000
            ],
            [
                'service' => 'Oksigenoterapija',
                'price' => 1000
            ],
            [
                'service' => 'Ispiranje cerumena iz uha',
                'price' => 2000
            ],
            [
                'service' => 'Fiksacioni zavoj',
                'price' => 800
            ],
            [
                'service' => 'Obrada opekotine',
                'price' => 2500
            ],
            [
                'service' => 'Incizija apscesa',
                'price' => 3500
            ],
            [
                'service' => 'Davanje infuzije',
                'price' => 1500
            ],
            [
                'service' => 'Inhalacija',
                'price' => 900
            ],
            [
                'service' => 'Davanje parenteralne terapije- IM, SC, IV, ID',
                'price' => 600
            ],
            [
                'service' => 'Polivitaminska infuzija',
                'price' => 2600
            ],
            [
                'service' => 'Doplata ampule/leka I',
                'price' => 200
            ],
            [
                'service' => 'Doplata ampule/leka II',
                'price' => 300
            ],
            [
                'service' => 'Doplata ampule/leka III',
                'price' => 400
            ],
            [
                'service' => 'EKG',
                'price' => 500
            ],
            [
                'service' => 'Ušivanje rane/strip i obrada rane',
                'price' => 1500
            ],
            [
                'service' => 'Pregled lekara opšte medicine u kućnim uslovima',
                'price' => 6000
            ],
            [
                'service' => 'Kontrolni pregled lekara opšte medicine u kućnim uslovima',
                'price' => 4000
            ],
            [
                'service' => 'Davanje parenteralne terapije- i.m, s.c i.v (sa našim ampulama)',
                'price' => 2800
            ],
            [
                'service' => 'Davanje parenteralne terapije- i.m, s.c i.v (pacijent ima svoju terapiju)',
                'price' => 2000
            ],
            [
                'service' => 'Davanje I.V infuzije (sa našim ampulama i rastvorom)',
                'price' => 4000
            ],
            [
                'service' => 'Davanje infuzije (pacijent ima svoju terapiju)',
                'price' => 2500
            ],
            [
                'service' => 'Polivitaminska infuzija',
                'price' => 4000
            ],
            [
                'service' => 'Plasiranje katetera (sa kateterom)',
                'price' => 3800
            ],
            [
                'service' => 'Skidanje konaca sa previjanjem',
                'price' => 2800
            ],
            [
                'service' => 'Previjanje manje rane',
                'price' => 2000
            ],
            [
                'service' => 'Previjanje veće rane',
                'price' => 3000
            ],
            [
                'service' => 'Vađenje krvi (analize se dodatno naplaćuju)',
                'price' => 400
            ]
        ];

        $servicesKardiologija = [
            [
                'service' => 'Holter EKG sa očitavanjem i mišljenjem',
                'price' => 6000
            ],
            [
                'service' => 'Holter pritiska sa očitavanjem i mišljenjem',
                'price' => 6000
            ],
            [
                'service' => 'Osnovni kardiološki pregled (prof. specijalista kardiologije)',
                'price' => 8000
            ],
            [
                'service' => 'Pregled i ultrazvuk srca (prof. specijalista kardiologije)',
                'price' => 10000
            ],
            [
                'service' => 'Ultrazvuk srca (prof. specijalista kardiologije)',
                'price' => 7000
            ],
            [
                'service' => 'Kontrola kardiologa do mesec dana (prof. specijalista kardiologije)',
                'price' => 5000
            ],
            [
                'service' => 'Test opterećenja / Ergometrija',
                'price' => 12000
            ],
            [
                'service' => 'Stres EHO',
                'price' => 13000
            ],
            [
                'service' => 'Farmakološki (dobutaminski) test',
                'price' => 13000
            ],
            [
                'service' => 'Koronarna rezerva protoka – CFR',
                'price' => 13000
            ]
        ];

        $servicesEndokrinologija = [
            [
                'service' => 'Pregled endokrinologa',
                'price' => 6000
            ],
            [
                'service' => 'Kontrola endokrinologa',
                'price' => 4000
            ]
        ];

        $servicesPulmologija = [
            [
                'service' => 'Pregled specijaliste pneumoftiziologije',
                'price' => 6000
            ],
            [
                'service' => 'Spirometrija',
                'price' => 3000
            ],
            [
                'service' => 'Pulmološki pregled sa spirometrijom',
                'price' => 8000
            ],
            [
                'service' => 'Bronhodilatotroni test',
                'price' => 3000
            ],
            [
                'service' => 'Algerološke probe na inhalacione alergene',
                'price' => 3000
            ]
        ];

        $servicesPsihologija = [
            [
                'service' => 'Pregled psihologa',
                'price' => 3500
            ],
            [
                'service' => 'Psihološko savetovanje',
                'price' => 2800
            ],
            [
                'service' => 'Psiho-dijagnostičko testiranje',
                'price' => 6000
            ],
            [
                'service' => 'Profesionalna orijentacija dece za upis u srednju školu i fakultet',
                'price' => 5000
            ]
        ];

        $servicesPedijatrija = [
            [
                'service' => 'Spec. pregled bolesnog deteta',
                'price' => 3500
            ],
            [
                'service' => 'Spec. pregled dvoje bolesne dece',
                'price' => 5500
            ],
            [
                'service' => 'Spec. pregled bolesnog deteta sa otoskopijom',
                'price' => 4000
            ],
            [
                'service' => 'Spec. pregled bolesnog deteta sa spirometrijom',
                'price' => 5000
            ],
            [
                'service' => 'Spec. pregled pedijatra i alergo testiranje (PRICK test) na inhalatorne i nutritivne alergene',
                'price' => 5000
            ],
            [
                'service' => 'Spec. pregled pedijatra i alergo testiranje (PRICK test) na inhalatorne i nutritivne alergene za dva deteta',
                'price' => 7500
            ],
            [
                'service' => 'Pedijatrijski pregled pred vakcinaciju sa uslužnim davanjem vakcine',
                'price' => 4000
            ],
            [
                'service' => 'Pregled konsultanta (phD, docent, profesor)',
                'price' => 6000
            ],
            [
                'service' => 'Potvrda za kolektiv',
                'price' => 500
            ],
            [
                'service' => 'Potvrda za odlazak na rekreativnu nastavu ili ekskurziju',
                'price' => 2000
            ],
            [
                'service' => 'Sistematski pregled pred polazak u školu',
                'price' => 7800
            ],
            [
                'service' => 'Sistematski pregled pred polazak u školu, drugo i treće dete iz iste porodice imaju besplatan paket pregleda',
                'price' => 7800
            ],
            [
                'service' => 'Sistematski pregled za upis u srednju školu',
                'price' => 5500
            ],
            [
                'service' => 'Sistematski pregled za upis u vrtić (kks i urin)',
                'price' => 4000
            ],
            [
                'service' => 'Sistematski pregled – potvrda za sport (spec. pregled+EKG+laboratorija)',
                'price' => 4500
            ],
            [
                'service' => 'Sistematski pregled dvoje dece (istog godišta)',
                'price' => 6000
            ],
            [
                'service' => 'Konsultacija pedijatra (bez pregleda)',
                'price' => 2000
            ],
            [
                'service' => 'Prva kontrola bolesnog deteta u roku od sedam dana sa besplatnom potvrdom za kolektiv',
                'price' => 2000
            ],
            [
                'service' => 'Druga kontrola bolesnog deteta u roku od deset dana sa besplatnom potvrdom za kolektiv',
                'price' => 1000
            ],
            [
                'service' => 'Kontrolno testiranje na inhalatorne i nutritivne alergene (PRICK test)',
                'price' => 4000
            ],
            [
                'service' => 'Specijalistički pregled zdravog deteta sa UZ kukova',
                'price' => 6000
            ],
            [
                'service' => 'Ultrazvuk kukova',
                'price' => 4000
            ],
            [
                'service' => 'Prvi pregled deteta u razvojnom savetovalištu, antropometrija, transkutana kontrola nivoa bilirubina, savet za ishranu',
                'price' => 4500
            ],
            [
                'service' => 'Razvojno savetovalište (praćenje deteta u 3m, 6m, 12m)',
                'price' => 2000
            ],
            [
                'service' => 'Razvojno savetovalište (praćenje deteta u 18m, 36m)',
                'price' => 3000
            ],
            [
                'service' => 'Savetovalište za ishranu BIA merenje, antropometrija, individualni jelovnik',
                'price' => 5000
            ],
            [
                'service' => 'Obrada pupčane rane bez lapsiranja',
                'price' => 1500
            ],
            [
                'service' => 'Lapisiranje pupčane rane',
                'price' => 1500
            ],
            [
                'service' => 'Vađenje krpelja',
                'price' => 1500
            ],
            [
                'service' => 'Obrada i previjanje rane',
                'price' => 1500
            ],
            [
                'service' => 'Spirometrija (bez pregleda)',
                'price' => 2000
            ],
            [
                'service' => 'Ušivanje rane/strip i obrada rane',
                'price' => 1500
            ],
            [
                'service' => 'Aspiracija ušnog kanala sa aplikacijom leka',
                'price' => 1500
            ],
            [
                'service' => 'EKG snimak',
                'price' => 500
            ],
            [
                'service' => 'Aspiracija ušnog kanala bez leka',
                'price' => 1000
            ],
            [
                'service' => 'Postavljanje štrajfne sa lekom',
                'price' => 900
            ],
            ['service' => 'Davanje I.V infuzije', 'price' => 1500],
            ['service' => 'Davanje parenteralne terapije- IM, SC, ID', 'price' => 600],
            ['service' => 'Doplata ampule/leka I', 'price' => 200],
            ['service' => 'Doplata ampule/leka II', 'price' => 300],
            ['service' => 'Doplata ampule/leka III', 'price' => 400],
            ['service' => 'Inhalacija', 'price' => 900],
            ['service' => 'Oksigenoterapija', 'price' => 1000],
            ['service' => 'Pregled pedijatra u kućnim uslovima', 'price' => 6000],
            ['service' => 'Kontrolni pedijatra u kućnim uslovima', 'price' => 4000],
            ['service' => 'Obrada pupčane rane bez lapisiranja u kućnim uslovima', 'price' => 2000],
            ['service' => 'Poseta patronažne sestre novorođenčetu u kućnim uslovima', 'price' => 3000],
            ['service' => 'Pedijatrijski pregled sa spirometrijom u kućnim uslovima', 'price' => 10000],
            ['service' => 'Inhalacija sa lekom u kućnim uslovima', 'price' => 2000],
            ['service' => 'Davanje parenteralne terapije- i.m, s.c (sa našim ampulama)', 'price' => 2800],
            ['service' => 'Davanje i.m (bez leka)', 'price' => 2000],
            ['service' => 'Davanje I.V infuzije (sa našima ampulama i rastvorom)', 'price' => 4000],
            ['service' => 'Previjanje manje rane', 'price' => 2000],
            ['service' => 'Previjanje veće rane', 'price' => 3000],
            ['service' => 'Vađenje krvi (analize se dodatno naplaćuju)', 'price' => 400],
            ['service' => 'Davanje S.C (bez leka)', 'price' => 2000],
            ['service' => 'Merenje glukoze u krvi – samo uz pregled', 'price' => 300],
            ['service' => 'EKG snimak (samo uz pregled)', 'price' => 1000],
        ];

        $servicesGinekologija = [
            ['service' => 'Specijalistički pregled ginekologa', 'price' => 5500],
            ['service' => 'Ultrazvuk dojke', 'price' => 4000],
            ['service' => 'Konsultativni pregled ultrazvučni', 'price' => 5500],
            ['service' => 'Ginekološki paket (spec. pregled, UZ pregled, digitalna kolposkopija+PA)', 'price' => 10000],
            ['service' => 'Ginekološka konsultacija – tumačenje nalaza', 'price' => 3500],
            ['service' => 'Dopler UZ ginekološki', 'price' => 4400],
            ['service' => 'Ginekološki ultrazvuk', 'price' => 4000],
            ['service' => 'Reproduktivno savetovalište', 'price' => 5500],
            ['service' => 'Ultrazvuk u trudnoći do 12 nedelje gestacije', 'price' => 5500],
            ['service' => 'Ultrazvuk u trudnoći preko 12 nedelje gestacije', 'price' => 6600],
            ['service' => 'Dabl test', 'price' => 7000],
            ['service' => 'Triple test', 'price' => 6500],
            ['service' => '4D ultrazvuk', 'price' => 8000],
            ['service' => 'Digitalna kolposkopija', 'price' => 3500],
            ['service' => 'CTG pregled', 'price' => 2500],
            ['service' => 'CTG i akušerski pregled', 'price' => 6000],
            ['service' => 'Kolposkopija sa PAPA testom', 'price' => 4000],
            ['service' => 'Folikulometrija', 'price' => 2500],
            ['service' => 'HPV bris', 'price' => 6900],
            ['service' => 'HyCosy', 'price' => 16000],
            ['service' => 'Aplikacija spirale sa lokalnom anestezijom', 'price' => 5000],
            ['service' => 'Uzimanje briseva (cervikalni i vaginalni bris)', 'price' => 1500],
            ['service' => 'PAPA test – citološki bris', 'price' => 1000],
            ['service' => 'Hlamidija', 'price' => 1000],
            ['service' => 'Mikoplazma', 'price' => 1000],
            ['service' => 'Ureaplazma', 'price' => 1000],
            ['service' => 'PCR Hlamidija', 'price' => 3000],
            ['service' => 'PCR Mikoplazma', 'price' => 3000],
            ['service' => 'STD 7 bolesti', 'price' => 6000],
            ['service' => 'Bris vulve i spoljnih genitalija', 'price' => 800],
            ['service' => 'Bris rane', 'price' => 800],
            ['service' => 'HSG', 'price' => 12000],
            ['service' => 'Previjanje rane nakon carskog reza ili rane apiziotomija', 'price' => 2500],
        ];

        $servicesOrtopedija = [
            ['service' => 'Specijalistički pregled ortopeda', 'price' => 5500],
            ['service' => 'Kontrola ortopeda', 'price' => 3000],
            ['service' => 'Postavljanje longete sa repozicijom', 'price' => 5000],
            ['service' => 'Postavljanje longete bez repozicije', 'price' => 4000],
            ['service' => 'Fiksacioni zavoj', 'price' => 2000],
        ];

        $servicesPsihijatrija = [
            ['service' => 'Spec. pregled psihijatra', 'price' => 7000],
            ['service' => 'Spec. pregled psihijatra u kućnim uslovima', 'price' => 10000],
            ['service' => 'Kontrola psihijatra (do mesec dana)', 'price' => 4000],
        ];

        $servicesReumatologija = [
            ['service' => 'Specijalistički pregled reumatologa', 'price' => 6000],
            ['service' => 'Kontrolni pregled reumatologa do mesec dana', 'price' => 4000],
        ];

        $servicesRadiologija = [
            ['service' => 'Rendgenski snimak glave', 'price' => 4100],
            ['service' => 'Rendgen paranazalnih šupljina', 'price' => 4100],
            ['service' => 'Rendgenski snimak nosa', 'price' => 4100],
            ['service' => 'Rendgen vratnog dela kičme', 'price' => 4100],
            ['service' => 'Rendgen torakalne kičme', 'price' => 4100],
            ['service' => 'LS kičme', 'price' => 4100],
            ['service' => 'Rendgen ramena', 'price' => 4100],
            ['service' => 'Rendgen nadlaktice', 'price' => 4100],
            ['service' => 'Rendgen lakta', 'price' => 4100],
            ['service' => 'Rendgen podlaktice', 'price' => 4100],
            ['service' => 'Rendgen ručnog zgloba', 'price' => 4100],
            ['service' => 'Rendgen šake', 'price' => 4100],
            ['service' => 'Rendgen grudnog koša', 'price' => 4100],
            ['service' => 'Rendgen pluća', 'price' => 4100],
            ['service' => 'Rendgen abdomena – nativni snimak', 'price' => 4100],
            ['service' => 'Rendgen urotrakta – nativni snimak', 'price' => 4100],
            ['service' => 'Rendgen krsnog dela kičme', 'price' => 4100],
            ['service' => 'Rendgen karlice i kukova', 'price' => 4100],
            ['service' => 'Rendgen natkolenice', 'price' => 4100],
            ['service' => 'Rendgen kolena', 'price' => 4100],
            ['service' => 'Rendgen potkolenice', 'price' => 4100],
            ['service' => 'Rendgen skočnog zgloba', 'price' => 4100],
            ['service' => 'Rendgen pete', 'price' => 4100],
            ['service' => 'Rendgen stopala', 'price' => 4100],
            ['service' => 'Film', 'price' => 300],
            ['service' => 'MR glave', 'price' => 12500],
            ['service' => 'MR angiografija glave (magistralnih arterija)', 'price' => 12500],
            ['service' => 'MR angiografija vrata', 'price' => 13000],
            ['service' => 'MR vratnog dela kičme', 'price' => 13000],
            ['service' => 'MR grudnog dela kičme', 'price' => 12500],
            ['service' => 'MR lumbalnog dela kičme', 'price' => 12500],
            ['service' => 'MR angiografija hipofize', 'price' => 18000],
            ['service' => 'MR angiografija glave (vena i venskih sinusa)', 'price' => 12500],
            ['service' => 'MR hipofize (sa kontrastom)', 'price' => 18000],
            ['service' => 'MR sinusa', 'price' => 13000],
            ['service' => 'MR abdomena', 'price' => 15000],
            ['service' => 'MR karlice', 'price' => 15000],
            ['service' => 'MR šake', 'price' => 15000],
            ['service' => 'MR žučnih puteva i abdomena', 'price' => 32000],
            ['service' => 'MR urograﬁja', 'price' => 22000],
            ['service' => 'MR mekih tkiva po regiji', 'price' => 15000],
            ['service' => 'MR grudnog koša', 'price' => 13000],
            ['service' => 'MR po kolenu', 'price' => 14500],
            ['service' => 'MR kukova', 'price' => 14500],
            ['service' => 'MR po zglobu', 'price' => 15000],
            ['service' => 'Aplikacija kontrastnog sredstva', 'price' => 5800],
            ['service' => 'MR glave sa angiografijom magistralnih arterija', 'price' => 17500],
            ['service' => 'MR žučnih puteva', 'price' => 22000],
            ['service' => 'Kontrast za skener', 'price' => 3000],
            ['service' => 'MSCT sinusa bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT kukova bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT kolena bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT skener glave bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT orbita bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT vratnog dela kičme bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT angiografija krvnih sudova vrata sa kontrastom', 'price' => 16000],
            ['service' => 'MSCT ramena bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT nadlaktice bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT podlaktice bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT ručnog zgloba bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT grudnog dela kičme bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT grudnog koša bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT angiografija grudne aorte sa kontrastom', 'price' => 16000],
            ['service' => 'MSCT krsnog dela kičme bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT abdomena bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT angiografija stomačne aorte sa kontrastom', 'price' => 16000],
            ['service' => 'MSCT urografija sa kontrastom', 'price' => 16000],
            ['service' => 'MSCT male karlice bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT angiografija donjih ekstremiteta sa kontrastom', 'price' => 15000],
            ['service' => 'MSCT natkolenice bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT potkolenice bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT stopala bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT zgloba bez kontrasta', 'price' => 9300],
            ['service' => 'MSCT mekih tkiva bez kontrasta', 'price' => 9300],
        ];

        $servicesNeurologija = [
            ['service' => 'Specijalistički pregled neurologa', 'price' => 6000],
            ['service' => 'Kontrolni pregled neurologa (unutar 15 dana)', 'price' => 4000],
            ['service' => 'Pregled neurologa sa doplerom krvnih sudova vrata', 'price' => 8000],
            ['service' => 'Pregled neurologa u kućnim uslovima', 'price' => 10000],
        ];

        $servicesOrl = [
            ['service' => 'Specijalistički pregled ORL', 'price' => 5500],
            ['service' => 'Audiometrija', 'price' => 2500],
            ['service' => 'Timpanometrija', 'price' => 2500],
            ['service' => 'Ispiranje ušiju', 'price' => 1500],
            ['service' => 'Bris grla – bakteriološki i mikološki', 'price' => 900],
            ['service' => 'Bris grla – samo bakteriološki', 'price' => 500],
            ['service' => 'Bris nosa – bakteriološki i mikološki', 'price' => 900],
            ['service' => 'Bris nosa – samo bakteriološki', 'price' => 500],
            ['service' => 'Bris uha jednostrano', 'price' => 1000],
            ['service' => 'Plasiranje strajfne u uvo jednostrano', 'price' => 600],
            ['service' => 'Resekcija frenuluma', 'price' => 6000],
            ['service' => 'Repozicija nosnih kostiju', 'price' => 12000],
            ['service' => 'Biopsije u lokalnoj anesteziji sa HP analizom', 'price' => 4000],
        ];

        $servicesDermatologija = [
            ['service' => 'Spec. pregled dermatologa', 'price' => 4800],
            ['service' => 'Dermatoskopija', 'price' => 4750],
            ['service' => 'Radiotalasi (uklanjanje više od 5 promena)', 'price' => 10000],
            ['service' => 'Radiotalasi (uklanjanje do 5 promena)', 'price' => 5000],
            ['service' => 'Kiretiranje moluski za decu', 'price' => 5000],
            ['service' => 'Kiretiranje moluski za odrasle genitalno', 'price' => 8000],
            ['service' => 'Vađenje krpelja', 'price' => 2500],
            ['service' => 'Otklanjanje xantelasmi po kapku', 'price' => 6000],
            ['service' => 'Otklanjanje epidermalnih cista (po promeni)', 'price' => 5000],
            ['service' => 'Otklanjanje syringoma (po promeni)', 'price' => 5000],
            ['service' => 'Otklanjanje sebacealnih (hiperplazija) po promeni', 'price' => 5000],
        ];

        $servicesDefektologija = [
            ['service' => 'Stimulativni tretman defektologa 30 min', 'price' => 1500],
            ['service' => 'Stimulativni tretman defektologa 45 min', 'price' => 1800],
            ['service' => 'Procena grafomotornih veština, veštine pisanja i čitanja', 'price' => 2000],
            ['service' => 'Podrška u učenju (defektolog)', 'price' => 1500],
            ['service' => 'Predškolski paket (razvoj fine i grube motorike, razvoj i bogaćenje rečnika, pripreme za početno pisanje i čitanje, razvoj matematičkih pojmova)', 'price' => 2000],
            ['service' => 'Psihološko-defektološki tretman', 'price' => 2800],
            ['service' => 'Psihološko-defektološka procena', 'price' => 3400],
            ['service' => 'Paket 8 defektoloških tretmana', 'price' => 12000],
            ['service' => 'Paket 8 psihološko-defektoloških tretmana', 'price' => 20000],
        ];

        $servicesSanitetskiPrevoz = [
            ['service' => 'Vinča', 'price' => 3500],
            ['service' => 'Leštane', 'price' => 3500],
            ['service' => 'Boleč', 'price' => 3800],
            ['service' => 'Ritopek', 'price' => 3800],
            ['service' => 'Zaklopača', 'price' => 4000],
            ['service' => 'Pudarci', 'price' => 4700],
            ['service' => 'Vrčin', 'price' => 3800],
            ['service' => 'Begaljica', 'price' => 4600],
            ['service' => 'Mali Požarevac', 'price' => 4900],
            ['service' => 'Kaluđerica', 'price' => 3300],
            ['service' => 'Beograd – uži deo grada', 'price' => 3000],
            ['service' => 'Beograd – Lečilišta i banje u Republici Srbiji', 'price' => 130],
            ['service' => 'Čekanje po započetom satu', 'price' => 1200],
        ];

        $servicesUltrazvuk = [
            ['service' => 'Ultrazvuk abdomena', 'price' => 4500],
            ['service' => 'Ultrazvuk štitaste žlezde/vrata', 'price' => 4500],
            ['service' => 'Ultrazvuk mekih tkiva/mišića', 'price' => 4500],
            ['service' => 'Ultrazvuk zgloba', 'price' => 4500],
            ['service' => 'Ultrazvuk ahilove tetive', 'price' => 4500],
            ['service' => 'Ultrazvuk skrotuma (testisa)', 'price' => 4500],
            ['service' => 'Ultrazvuk abdomena sa doplerom renalnih arterija', 'price' => 4500],
            ['service' => 'Ultrazvuk abdomena sa Doplerom venae portae', 'price' => 4500],
            ['service' => 'Ultrazvuk karotida', 'price' => 4500],
            ['service' => 'Ultrazvuk dojki', 'price' => 4500],
            ['service' => 'Dopler krvnih sudova obe noge', 'price' => 4500],
            ['service' => 'Dopler krvnih sudova obe ruke', 'price' => 4500],
            ['service' => 'Dopler krvnih sudova vrata', 'price' => 4500],
            ['service' => 'Dopler abdominalne aorte', 'price' => 4500],
        ];

        $servicesUrologija = [
            ['service' => 'Pregled urologa', 'price' => 6000],
            ['service' => 'Kontrola urologa do mesec dana', 'price' => 4000],
        ];

        $servicesGastroentorologija = [
            ['service' => 'Osnovni gastroenterološki pregled', 'price' => 4800],
            ['service' => 'Gastroskopija', 'price' => 12000],
            ['service' => 'Kolonoskopija', 'price' => 15000],
            ['service' => 'Anestezija', 'price' => 6000],
            ['service' => 'HP po uzorku (histopatologija)', 'price' => 4000],
            ['service' => 'Gastroskopija sa kolonoskopijom sa anestezijom', 'price' => 33000],
        ];

        $servicesOnkologija = [
            ['service' => 'Prvi pregled onkologa', 'price' => 7000],
            ['service' => 'Kontrolni pregled onkologa (do 12 nedelja)', 'price' => 5000],
        ];

        $servicesVaskularnaHirurgija = [
            ['service' => 'Pregled specijaliste vaskularne hirurgije', 'price' => 5000],
        ];


        return $servicesVaskularnaHirurgija;
    }
}
