@extends('frontend.themes.gold.layout.layout')
@section('title', 'Zlatni Standard | Investiciono zlato | Prodaja Investicionog zlata | Cena zlata')
@section('description', '')
@section('keywords', '')
@section('canonical', url()->current())
@section('content')

    <!-- Breadcrumbs With Background -->
    <div class="container-fluid"
        style="background: url('/themes/gold/assets/img/cena-zlata.webp') no-repeat scroll center center/cover">
        <div class="row align-items-center">
            <div class="col-12 pb-5">
                <div class="banner_text text-white">
                    <a href="{{ route('frontend.index') }}">{{ __('Home') }}</a> / Cena zlata
                    <h2 class="text-white">Cena zlata</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumbs With Background -->

    <!-- Gold Price Cart -->
    <section class="container">
        <div class="row">
            <div class="col-12 py-5">
                <p>Da li znate kolika je trenutno cena zlata na svetskom tržištu? Određivanje cene ovog plemenitog metala je
                    veoma kompleksan proces, a od suštinske je važnosti da kao ulagač u zlato redovno i pažljivo pratite
                    cenu zlata.
                </p>
                <p>Promene vrednosti zlata su neprekidne i često nepredvidive.</p>
                <p>Kako bi investitori i štediše mogli adekvatno da ocene stanje na tržištu, ključno je razumeti koji
                    faktori utiču na cenu zlata, te gde i kako se ta cena formira.</p>
            </div>
            <div class="col-12 gold-price py-5">
                <div class="elementor-widget-container">
                    <script src="https://charts.kt-solutions.de/assets/js/jquery.canvasjs.min.js"></script>
                    <script src="https://charts.kt-solutions.de/assets/js/ktcharts.js"></script>
                    <div class="row mb-4">
                        <div class="col-12 col-md-3">
                            <select name="" id="date-select" class="w-100">
                                <option value="1D">1 Dan</option>
                                <option value="1W" selected>1 Nedelja</option>
                                <option value="1M">1 Mesec</option>
                                <option value="1Y">1 Godina</option>
                                <option value="3M">1 Meseca</option>
                                <option value="3Y">3 Godine</option>
                                <option value="5Y">5 Godina</option>
                                <option value="10Y">10 Godina</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-3">
                            <select name="" id="weight-select" class="">
                                <option value="G">Gram</option>
                                <option value="KG">Kilogram</option>
                                <option value="OZ" selected>Unca</option>
                            </select>
                        </div>

                    </div>
                    <div id="goldChart" style="width:100%;height:50vh;padding-top:30px;padding-bottom:70px">
                        <div class="canvasjs-chart-container" style="position: relative; text-align: left; cursor: auto;">
                            <canvas class="canvasjs-chart-canvas" width="1031" height="456"
                                style="position: absolute; user-select: none;"></canvas><canvas
                                class="canvasjs-chart-canvas" width="1031" height="456"
                                style="position: absolute; -webkit-tap-highlight-color: transparent; user-select: none; cursor: default;"></canvas>
                            <div class="canvasjs-chart-toolbar"
                                style="position: absolute; right: 1px; top: 1px; border: 1px solid transparent;">
                                <button state="pan" type="button" title="Pan"
                                    style="display: none; background-color: white; color: black; border-top: none; border-right: 1px solid rgb(33, 150, 243); border-bottom: none; border-left: none; border-image: initial; user-select: none; padding: 5px 12px; cursor: pointer; float: left; width: 40px; height: 25px; outline: 0px; vertical-align: baseline; line-height: 0;"><img
                                        style="height:95%; pointer-events: none;"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAICSURBVEhLxZbPahNRGMUn/5MpuAiBEAIufQGfzr5E40YptBXajYzudCEuGqS+gGlrFwquDGRTutBdYfydzJ3LzeQmJGZue+Dw/Z17Mnfmu5Pof9Hr9Z61Wq0bWZMKj263O6xWq99wU9lOpzPMKgEhEcRucNOcioOK+0RzBhNvt9tPV4nmVF19+OWhVqt9xXgFXZq+8lCv119UKpUJ7iX2FmvFTKz8RH34YdBsNk8wVtjE4fGYwm8wrrDi3WBG5oKXZGRSS9hGuNFojLTe2lFz5xThWZIktayyiE2FdT3rzXBXz7krKiL8c17wAKFDjCus2AvW+YGZ9y2JF0VFRuMPfI//rsCE/C+s26s4gQu9ul7r4NteKx7H8XOC724xNNGbaNu++IrBqbOV7Tj3FgMRvc/YKOr3+3sE47wgEt/Bl/gaK5cHbNU11vYSXylfpK7XOvjuumPp4Wcoipu30Qsez2uMXYz4lfI+mOmwothY+SLiXJy7mKVpWs3Si0CoOMfeI9Od43Wic+jO+ZVv+crsm9QSNhUW9LXSeoPBYLXopthGuFQgdIxxhY+UDwlt1x5CZ1hX+NTUdt/OIvjKaDSmuOJfaIVNPKX+W18j/PLA2/kR44p5Sd8HbHngT/yTfNRWUXX14ZcL3wmX0+TLf8YO7CGT8yFE5zB3/gney25/OETRP9CtPDFe5jShAAAAAElFTkSuQmCC"
                                        alt="Pan"></button><button state="reset" type="button" title="Reset"
                                    style="display: none; background-color: white; color: black; border-top: none; border-right: 0px solid rgb(33, 150, 243); border-bottom: none; border-left: none; border-image: initial; user-select: none; padding: 5px 12px; cursor: pointer; float: left; width: 40px; height: 25px; outline: 0px; vertical-align: baseline; line-height: 0;"><img
                                        style="height:95%; pointer-events: none;"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAeCAYAAABJ/8wUAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAPjSURBVFhHxVdJaFNRFP1J/jwkP5MxsbaC1WJEglSxOFAXIsFpVRE3ggi1K90obioRRBA33XXnQnciirhQcMCdorgQxBkXWlREkFKsWkv5npvckp/XnzRpKh64kLw733fffe9L/wrL0+mVUdO8uTSZ3MBL/we2qg4rkuSpodCELstXE46ziVkLQ6FQcGOmeSSq6wd4aV50d3drWjj8kQKZJTUc9kxFGenv79dZrDksTSTWWJp2QYtEPiErysyzdX0LsxsCQR8keX8gs6RHIk8ysdgKFg2G53mhuOPsshTlBjKaFo1g7SqLNoShKLdFXT8huQ/paLSbxatYnc2mHMM4hr18Vi8TIvCmXF3vYrW6cF23gGTOk0M1wA4RKvOmq6vLZRVJipvmSWT6tZ6CSEYkco5V50VPT4+D7RwOqi6RiSZm0fJ+vggSqkeoypdsNmuyelNwbXsbgvkWYMtzDWNvWaijoyOBqE+hVK8abcssUeXQ/YfKyi0gFYv1Ipgfoj34fYGTJLOYJA0ODirok32GLN8XhUWCwSes1hIwBg6LydJ/tEeRRapAdUp+wSAiZchtZZWWgAZ+JNpD8peYXQVK9UwUxNpzOK8pq97kURZhYTCKBwPD7h2zK+js7Myi7D8Fod+0TkMI8+EMAngLGc/WtBFWawkFHFnoj/t9KLgGmF0B3QfkxC+EarxkdhnFYlFLY06USqUwL7UMjICHfh/wOc2sCqhpxGbCkLvL7EUDbF73+6DkmVWB6zi7xUDQSLeYvWjAILvm9zEnkJhlbRcDQZcv6Kg2AipyT/Axw6wKlqVSqxDdjF8Izfod13qURdrG/nxehY+xGh+h0CSzKygGvSNQIcc097BI24jb9hax6kj2E7OrMFX1il+ICEf2NrPbhiXLl+fYl+U7zK4iYdsDcyLGf+ofFlkwcN+s10KhmpuYhhtm0hCLVIFL0MDsqNlDIqy9x2CLs1jL6OvrI7vPRbtohXG6eFmsFnHDGAp6n9AgyuVySRZrGvROxRgIfLXhzjrNYnNBUxNX/dMgRWT1mt4XLDovaApD53E9W3ilNX5M55LJHpRtIsgAvciR4WWcgK2Dvb1YqgXevmF8z2zEBTcKG39EfSKsT9EbhVUaI2FZO+oZIqImxol6j66/hcAu4sSN4vc1ZPoKeoE6RGhYL2YYA+ymOSSi0Z0wWntbtkGUWCvfSDXIxONraZ/FY90KUfNTpfC5spnNLgxoYNnR9RO4F8ofXEHOgogCQE99w+fF2Xw+b7O59rEOsyRqGEfpVoaDMQQ1CZrG46bcM6AZ0C/wPqNfHliqejyTySxh9TqQpL+xmbIlkB9SlAAAAABJRU5ErkJggg=="
                                        alt="Reset"></button>
                            </div>
                            <div class="canvasjs-chart-tooltip"
                                style="position: absolute; height: auto; box-shadow: rgba(0, 0, 0, 0.1) 1px 1px 2px 2px; z-index: 1000; pointer-events: none; display: none; border-radius: 5px;">
                                <div
                                    style=" width: auto;height: auto;min-width: 50px;line-height: auto;margin: 0px 0px 0px 0px;padding: 5px;font-family: Calibri, Arial, Georgia, serif;font-weight: normal;font-style: italic;font-size: 14px;color: #000000;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);text-align: left;border: 2px solid gray;background: rgba(255,255,255,.9);text-indent: 0px;white-space: nowrap;border-radius: 5px;-moz-user-select:none;-khtml-user-select: none;-webkit-user-select: none;-ms-user-select: none;user-select: none;} ">
                                    Sample Tooltip</div>
                            </div>
                        </div>
                    </div>
                    <script>
                        window.addEventListener('load', function() {
                            const website = 'zlatnistandard';
                            // General settings to configure the look of the charts
                            options = {
                                color: "#E0B649",
                                backgroundColor: "#FFFFFF",
                                showTitle: true,
                                animationEnabled: true,
                                language: "EN",
                            }

                            // Initialize Gold price, in EUR, 1 week, per ounce
                            let chart = new KtsysChart(website, 'goldChart', 'GOLD', 'EUR', '1W', 'OZ', options);

                            setInterval(() => {
                                chart.interval = document?.querySelector('#interval')?.value || '1W';
                                chart.weight = document?.querySelector('#weight')?.value || 'OZ';

                            }, 30000);


                            $('#date-select').on('change', function() {
                                let period = $(this).val();
                                let weight = $('#weight-select').val();
                                chart.interval = period
                                chart.weight = weight
                            })

                            $('#weight-select').on('change', function() {
                                let period = $('#date-select').val();
                                let weight = $(this).val();
                                chart.interval = period
                                chart.weight = weight
                            })

                            document.addEventListener('change', e => {
                                if (!e.target.closest('#interval')) return;

                                chart.interval = document?.querySelector('#interval')?.value || '1W';
                                chart.weight = document?.querySelector('#weight')?.value || 'OZ';
                            });

                            document.addEventListener('change', e => {
                                if (!e.target.closest('#weight')) return;

                                chart.interval = document?.querySelector('#interval')?.value || '1W';
                                chart.weight = document?.querySelector('#weight')?.value || 'OZ';
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>
    <!-- #Gold Price Cart -->

    <!-- Page Content -->
    <section class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <img style="height: 100%; object-fit: cover;" src="/themes/gold/assets/img/cena-zlata1.webp"
                            alt="">
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <h2>Značaj zlata na tržištu</h2>
                        <p>Zlato predstavlja jedan od izuzetno cenjenih resursa, jer&nbsp;<strong>simbolizuje bogatstvo i
                                stabilnost</strong>&nbsp;kroz istoriju.</p>
                        <p>Kao monetarni standard, zlato čuva vrednost i u turbulentnim ekonomskim
                            periodima,&nbsp;<strong>održavajući svoju kupovnu moć</strong>.</p>
                        <p>Uloge zlata kao investicione imovine i &bdquo;sigurne luke&ldquo; dolaze do izražaja u vremenima
                            ekonomskih neizvesnosti, čime privlače investitore i &scaron;tedi&scaron;e. Nezavisno od
                            inflatornih tendencija,&nbsp;<strong>zlato često zadržava svoju vrednost</strong>, &scaron;to ga
                            čini privlačnim za diversifikaciju portfolija.</p>
                        <p>Kao rezultat svoje finansijske nezavisnosti od nacionalnih valuta i ekonomskih sistema, zlato
                            često postaje predmet globalne trgovine. Univerzalni karakater zlata obezbeđuje visoku
                            likvidnost i &scaron;iroko prihvaćenu vrednost bez granica.</p>
                        <h2>Indikatori&nbsp;promene cene</h2>
                        <p><strong>Inflacija i realne kamatne stope</strong>&nbsp;su ključni faktori koji utiče na
                            promenu cena zlata, kao i očekivanu cenu zlata.</p>
                        <p>Vrednost američkog dolara ima svoj uticaj na cenu zlata, jer slabiji dolar čini zlato
                            jeftinijim za kupce koji koriste druge valute. Postoji prilično jak inverzan odnos
                            između cene zlata i američkog dolara:&nbsp;<strong>&scaron;to je dolar slabiji, to je
                                cena zlata vi&scaron;a</strong>.</p>
                        <p><strong>Politička nestabilnost i ekonomski &scaron;okovi</strong>&nbsp;često dovode do porasta
                            cene, po&scaron;to investitori traže sigurnost u zlatu kao &bdquo;sigurnoj luci&ldquo; koja
                            pruža utoči&scaron;te.</p>
                        <p>Monetarna politika centralnih banaka, poput&nbsp;<strong>promene kamatnih stopa</strong>,
                            direktno utiče na atraktivnost zlata kao investicije.</p>
                        <p>Analizu trži&scaron;nih indikatora treba dopuniti praćenjem zaliha zlata i trendovima tražnje na
                            globalnom nivou.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <h2>Digitalni&nbsp;alati za praćenje</h2>
                        <p>Praćenje cene zlata tradicionalno se odvijalo preko finansijskih medija i novina, dok
                            dana&scaron;nje digitalno doba nudi razne digitalne alate.&nbsp;<strong>Online
                                platforme</strong>&nbsp;i aplikacije omogućavaju investitorima i &scaron;tedi&scaron;ama
                            uvid u promene cena zlata u realnom vremenu.</p>
                        <p>Za one koji preferiraju&nbsp;<strong>automatizovano praćenje</strong>, postoji niz servisa za
                            obave&scaron;tenja, koji korisnicima &scaron;alju ažuriranja o cenama kroz e-mail ili SMS
                            notifikacije. Osim toga, integracija sa trži&scaron;nim alatima i podacima omogućava detaljnu
                            analizu trendova i istorijskih podataka o cenama zlata.</p>
                        <p><strong>Mobilne aplikacije</strong>&nbsp;su posebno korisne kada je potreban pristup
                            informacijama u pokretu.</p>

                        <h3>Aplikacije i platforme</h3>

                        <p>Pristup informacijama o ceni zlata nikada nije bio pristupačniji zahvaljujući modernim
                            aplikacijama i platformama:</p>
                        <ul>
                            <li>Kitco &ndash; vodeći izvor za cene metala i trži&scaron;ne analize;</li>
                            <li>Gold Price Live &ndash; aplikacija koja pruža trenutne cene;</li>
                            <li>Bloomberg &ndash; mesto za sveobuhvatne finansijske vesti i podatke;</li>
                            <li>Investing.com &ndash; prati cene i nudi raznovrsne finansijske instrumente;</li>
                            <li>Reuters &ndash; pouzdan izvor za praćenje trži&scaron;ta i cene;</li>
                            <li>CNBC &ndash; pruža aktualne finansijske vesti i podatke o trži&scaron;tima;</li>
                            <li>Yahoo Finance &ndash; kombinuje vesti, podatke i alate za investitore;</li>
                            <li>Gold Tracker &ndash; specijalizovana aplikacija za praćenje zlata;</li>
                            <li>MarketWatch &ndash; informacije i analize cenovnih trendova zlata.</li>
                        </ul>
                        <p>Ove aplikacije nude različite funkcionalnosti, od prikaza aktuelnih cena do analitičkih
                            alata i istorijskih podataka.</p>

                        <h3>Finansijski portali i grafikoni</h3>
                        <p>Finansijski portali nude ažurne informacije i grafikone koji prikazuju i analiziraju
                            kretanje cena zlata.</p>
                        <p>Napredni alati koje nude ovi portali uključuju&nbsp;<strong>interaktivne grafikone,
                                analitičke alate, različite vremenske okvire i indikatore</strong>&nbsp;koji pomažu
                            u predviđanju budućih trendova cene zlata. Takođe, investitori imaju mogućnost da
                            pristupe istorijskim cenama, &scaron;to može biti od ključne važnosti za analizu
                            dugoročnih tendencija na trži&scaron;tu. Osim toga, mnogi portali pružaju mogućnost
                            personalizovanja grafikona prema ličnim preferencijama korisnika, doprinoseći jasnijem
                            razumevanju dinamike cena.</p>
                        <p>Finansijski portali često uključuju informacije o&nbsp;<strong>inflaciji, kamatnim
                                stopama, promenama u vrednosti valut</strong>a i drugim makroekonomskim indikatorima
                            koji direktno ili indirektno utiču na vrednost zlata.</p>
                        <p>Konačno, ne treba zanemariti i tehničku analizu koju pružaju finansijski portali.
                            Grafikoni su često opremljeni sa različitim tehničkim analizama, uključujući trend
                            linije, nivoe podr&scaron;ke, odnosno otpora i razne druge oblike tehničkih analiza.</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <img style="height: 100%; object-fit: cover;" src="/themes/gold/assets/img/cena-zlata2.webp"
                            alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <img style="height: 100%; object-fit: cover;" src="/themes/gold/assets/img/cena-zlata3.webp"
                            alt="">
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <h2>Zlato&nbsp;na globalnom trži&scaron;tu</h2>
                        <p>Zlato kao investicija zauzima centralno mesto u finansijskom svetu, a njegova cena se određuje na
                            globalnom trži&scaron;tu metala. Ključni faktori koji utiču na cenu zlata
                            uključuju&nbsp;<strong>trži&scaron;nu ponudu i potražnju, globalne ekonomske tendencije i
                                monetarne politike</strong>&nbsp;vodećih svetskih centralnih banaka.</p>
                        <p>Cenu zlata diktiraju i sentimenti na trži&scaron;tima. Spekulacije, politička nestabilnost i
                            ekonomska nesigurnost često utiču na porast interesa za zlato kao sigurnim utoči&scaron;tem.
                            Stoga je važno pratiti vesti i analize specijalizovanih finansijskih platformi.</p>

                        <h3>Uloga Londonskog fiksa</h3>
                        <p>Londonski fiks predstavlja&nbsp;<strong>referentnu cenu zlata</strong>&nbsp;ustanovljenu
                            dva puta dnevno kroz proces poznat kao fiksing. Ova praksa omogućava postavljanje
                            stabilne cene koja se globalno prihvata i koristi u transakcijama.</p>
                        <p>Cenu tokom fiksinga&nbsp;<strong>određuje grupa velikih međunarodnih banaka</strong>.
                            Fiksing pruža relativno transparentan mehanizam formiranja cene zlata.</p>
                        <p>Svaka promena u ponudi i potražnji zlata tokom dana može značajno uticati na proces
                            fiksinga, koji zauzvrat odražava trenutnu globalnu vrednost zlata. Na ovaj
                            način,&nbsp;<strong>Londonski fiks služi kao ključna referenca</strong>&nbsp;za rudarske
                            kompanije, investitore, juvelire i centralne banke u svojim transakcijama.</p>
                        <p>Londonski fiks koristi specifične procedure i pravila koja osiguravaju da cenovni
                            konsenzus odražava pravu trži&scaron;nu ravnotežu između ponude i potražnje.</p>

                        <h3>Uticaj svetskih berzi</h3>
                        <p>Svetske berze igraju nedvosmisleno ključnu ulogu u određivanju cene, reflektujući stanje
                            globalne ekonomije i geopolitičkih dinamika.&nbsp;<strong>Cene na berzama u Njujorku,
                                Londonu, Hong Kongu</strong>&nbsp;i drugim finansijskim centrima su često osnova za
                            analizu i predviđanja.</p>
                        <p><strong>Prediktivna moć ovih berzi je ogromna</strong>, jer se na njima obavlja većina
                            trgovine plemenitim metalima. One su, dakle, barometar za cenu zlata.</p>
                        <p>Kretanje cene na svetskom trži&scaron;tu zlata u velikoj meri zavisi od de&scaron;avanja
                            na berzi&nbsp;<strong>COMEX u Njujorku i LME/LBMA u Londonu</strong>, koje zajedno
                            formiraju epicentar globalne trgovine ovim plemenitim metalom. Od kretanja na ovim
                            berzama zavisi kako će se formirati cena zlata u realnom vremenu.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <h2>Kupovina&nbsp;i prodaja zlata</h2>
                        <p>Prilikom&nbsp;<strong>kupovine i prodaje zlata</strong>, osnovni parametar je trenutna
                            trži&scaron;na vrednost ovog plemenitog metala. Ova vrednost je subjekt stalnih promena, čime se
                            pruža temelj za investicione odluke.</p>
                        <p>Trži&scaron;te zlata je dinamično, a njegova likvidnost omogućava investitorima brzu realizaciju
                            transakcija.&nbsp;<strong>Spot cena</strong>&nbsp;zlata određuje se na osnovu trenutne ponude i
                            potražnje na međunarodnom trži&scaron;tu, često u odnosu na LME/LBMA referentnu vrednost.</p>
                        <p>Praćenje&nbsp;<strong>LME/LBMA cene</strong>&nbsp;pruža jasnu smerodavnost prilikom trgovanja,
                            a&nbsp;<strong>investitori koriste brojne alate</strong>&nbsp;i platforme radi osiguranja
                            optimalnih investicionih poteza.</p>

                        <h3>Kako odrediti pravi trenutak za kupovinu zlata?</h3>

                        <p>Istorija je pokazala da se u&nbsp;<strong>vremenima ekonomske neizvesnosti</strong>&nbsp;zlato
                            često percipira kao stabilan investicioni instrument.</p>
                        <p>Zbog toga su detaljni&nbsp;<strong>pregledi istorijskih podataka</strong>&nbsp;i obrasci kretanja
                            cena zlata ključni u proceni vremena za kupovinu ili prodaju. Vreme kada je trži&scaron;te
                            volatilno može biti povoljno za izvr&scaron;enje transakcija, pod uslovom da se visoko
                            kvalitetni podaci koriste pri dono&scaron;enju odluka.</p>
                        <p>Takođe,&nbsp;<strong>osmatranje sezonskih trendova</strong>&nbsp;može biti od su&scaron;tinskog
                            značaja za izbor pravog trenutka. Neke studije ukazuju na sezonske obrasce prema kojima se cene
                            zlata povećavaju ili smanjuju u određenim periodima godine. Ove analize preporučuju dodatan sloj
                            razmatranja kada se ocenjuju dugoročne investicione strategije.</p>
                        <p>Na kraju, korisno je koristiti tehničku analizu trži&scaron;nih kretanja i pona&scaron;anja
                            zlata. Kombinovanjem fundamentalne i tehničke analize, investitori mogu predvideti trendove i
                            prepoznati signale koji su indikativni za kupovinu ili prodaju.</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <img style="height: 100%; object-fit: cover;" src="/themes/gold/assets/img/cena-zlata4.webp"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #Page Content -->

    <!-- Posts -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h5>SVE ŠTO JE POTREBNO DA ZNAŠ O</h5>
                <h3>KUPOVINI INVESTICIONOG ZLATA</h3>
            </div>
            @foreach ($footerPosts as $post)
                <div class="col-12 col-lg-4 mb-3">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            @if ($post->image)
                                <img style="border-radius: 4px" src="{{ $storageUrl }}{{ $post->image->path }}"
                                    alt="{{ $post->title }}">
                            @endif
                        </div>
                        <div class="blog_content">
                            <h3><a href="{{ route('frontend.post', $post->slug) }}">{{ $post->title }}</a></h3>
                            <div class="post_desc">
                                {!! $post->excerpt !!}
                            </div>
                            <div class="read_more">
                                <a href="{{ route('frontend.post', $post->slug) }}">Detaljnije</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- #Posts -->

@endsection
@section('scripts')
    <script></script>
@endsection
