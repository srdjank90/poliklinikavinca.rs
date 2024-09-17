   <!-- Best Offer -->
   <div class="advantages_ecommerce">
       <div class="container">
           <div class="row align-items-center">
               <div class="col-lg-7 col-md-8 col-sm-12">
                   <div class="advantages_content">
                       <span class="fs-3">Ako ste negde pronašli povoljniju ponudu</span>
                       <p>kontaktirajte nas i potrudićemo se da Vam pružimo još bolje uslove.</p>
                   </div>
               </div>
               <div class="col-lg-5 col-md-4 col-sm-12">
                   <div class="advantages_button">
                       <p class="p-0 m-0">Pozovite nas odmah</p>
                       <a href="tel:+381637709128">+381 63 7709 128</a>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- #Best Offer -->
   <!-- Newsletter Section -->
   <div class="newsletter_area">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="newsletter_content">
                       <span class="fs-2">Prijavite se na Periodični Bilten
                       </span>
                       <p>Najnovije promene cena zlata na našem sajtu, kao i personalizovane ponude, samo za Vas!</p>
                       <div class="">
                           <form id="newsletterForm">
                               @csrf
                               <input id="newsletterEmail" type="email" name="email" required autocomplete="off"
                                   placeholder="Upišite Vašu email adresu" />
                               <button name="submit" type="submit">Prijavi se</button>
                               <div class="newsletterMsg"
                                   style="text-align: left;
                               background: #daa31a;
                               padding-left: 15px;
                               color: white;
                           }">

                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- #Newsletter Section -->

   <!-- Footer -->
   <footer class="footer_widgets">
       <div class="container">
           <div class="footer_top pt-5">
               <div class="row">
                   <div class="col-lg-4 col-md-6 col-sm-8">
                       <div class="widgets_container contact_us">
                           <span class="text-white fs-3">Kontaktirajte nas</span>
                           <div class="footer_contact">
                               <p><a rel="noopener nofollow noreferrer"
                                       href="https://www.google.rs/maps/place/Balkanska+2,+Beograd/@44.8125304,20.4594604,17z/data=!3m1!4b1!4m6!3m5!1s0x475a7aadd6cc9529:0x1cf2565716b48577!8m2!3d44.8125304!4d20.4594604!16s%2Fg%2F1vk6x_s7?entry=ttu">
                                       Adresa: Balkanska 2, 11000 Beograd</a></p>
                               <p>Telefon: <a href="tel:+381637709128">+381 63 7709 128</a></p>
                               <p>Email: <a href="mailto:info@zlatnistandard.rs"> info@zlatnistandard.rs</a></p>
                               <ul>
                                   <li>
                                       <a rel="noopener nofollow noreferrer" target="_blank"
                                           href="https://www.facebook.com/ZlatniStandarddoo"><i
                                               class="fab fa-facebook"></i></a>
                                   </li>
                                   <li>
                                       <a rel="noopener nofollow noreferrer" target="_blank"
                                           href="https://twitter.com/ZlatniStandard"><i
                                               class="fa-brands fa-x-twitter"></i></i></a>
                                   </li>
                                   <li>
                                       <a rel="noopener nofollow noreferrer" target="_blank"
                                           href="https://www.linkedin.com/company/zlatnistandard/"><i
                                               class="fab fa-linkedin"></i></a>
                                   </li>
                                   <li>
                                       <a rel="noopener nofollow noreferrer" target="_blank"
                                           href="https://www.youtube.com/@ZlatniStandard"><i
                                               class="ion-social-youtube"></i></a>
                                   </li>
                               </ul>
                           </div>
                       </div>
                   </div>


                   <div class="col-lg-8 col-md-6 col-sm-7">

                       <div class="widgets_container contact_us">
                           <span class="text-white fs-3">Zlatni Standard</span>
                           <div class="footer_contact">
                               <p>Otkrijte kako Zlatni Standard omogućava zaštitu vašeg kapitala i štednje uz našu
                                   ekskluzivnu ponudu Fine Gold 999,9 / 24 karata investicionog zlata i srebra. Naši
                                   proizvodi, dostupni u obliku pločica i poluga težine od 1g do 1kg, potiču od vodećih
                                   svetskih proizvođača.

                               </p>
                               <p>Svi artikli u našem asortimanu su sertifikovani (LBMA Good Delivery) od strane
                                   Londonskog udruženja trgovaca plemenitim metalima (LBMA), što garantuje najviše
                                   standarde u proizvodnji i trgovini dragocenim metalima širom sveta. Iskoristite
                                   prednosti LBMA sertifikacije koja efikasno eliminiše mogućnost manipulacije robom,
                                   pružajući vam maksimalnu sigurnost. Investirajte pametno i sigurno uz Zlatni
                                   Standard, već danas.</p>

                           </div>
                       </div>

                   </div>
               </div>
           </div>
           <div class="footer_middel">
               <div class="row">
                   <div class="col-12">
                       <div class="footer_middel_menu">
                           <ul>
                               <li><a href="{{ route('frontend.index') }}">Investiciono zlato</a></li>
                               <li><a href="{{ route('frontend.category.products', 'zlatne-plocice') }}">Zlatne
                                       pločice</a></li>
                               <li><a href="{{ route('frontend.category.products', 'zlatne-poluge') }}">Zlatne
                                       poluge</a>
                               </li>
                               <li><a href="{{ route('frontend.category.products', 'zlatni-dukati') }}">Zlatni
                                       dukati</a>
                               </li>
                               <li><a href="{{ route('frontend.goldprice') }}">Cena zlata</a></li>
                               <li><a href="{{ route('frontend.wholesale') }}">Veleprodaja zlata</a></li>
                               <li><a href="tel:+381637709128">Pomoć prilikom kupovine zlata</a></li>
                               <li><a href="#">Sitemap</a></li>
                           </ul>
                       </div>
                       <div class="d-flex justify-content-center align-items-center mt-3">
                           <a target="_blank" rel="noopener nofollow noreferrer"
                               href="https://www.c-hafner.de/en/home.html" class="me-2">
                               <img src="{{ asset('themes/gold/assets/img/chafner.webp') }}" alt="c.hafner">
                           </a>
                           <a target="_blank" rel="noopener nofollow noreferrer" href="https://argor-heraeus.com/"
                               class="me-2">
                               <img src="{{ asset('themes/gold/assets/img/argor.webp') }}" alt="argor">
                           </a>
                           <a target="_blank" rel="noopener nofollow noreferrer" href="https://www.royalmint.com/"
                               class="me-2">
                               <img src="{{ asset('themes/gold/assets/img/trm.webp') }}" alt="trm">
                           </a>
                           <a target="_blank" rel="noopener nofollow noreferrer" href="https://www.muenzeoesterreich.at"
                               class="me-2">
                               <img src="{{ asset('themes/gold/assets/img/munze.webp') }}" alt="munze">
                           </a>
                       </div>
                   </div>
               </div>
           </div>
           <div class="footer_bottom">
               <div class="row">
                   <div class="col-12">
                       <div class="copyright_area">
                           <p>
                               &copy; 2024 Zlatni Standard.</a> Sva prava zadržana. <br>Made with <i
                                   class="fa fa-heart"></i> by
                               <a target="_blank" rel="noopener nofollow noreferrer"
                                   href="https://allinclusive.agency">Allinclusive.</a>
                           </p>

                       </div>
                   </div>
               </div>
           </div>
       </div>
   </footer>
   <!-- #Footer -->

   {{-- <div id="cookie-container" class="containercookie show">
       <div class="cookie-content container">
           <p>Koristimo kolačiće kako bismo unapredili funkcionalnost našeg sajta. Pritiskom na dugme prihvatate
               korišćenje kolačića.</p>
           <div class="cookie-actions">
               <a class="privacy-policy-link" href="https://zlatnistandard.rs/uslovi-koriscenja-i-politika-privatnosti/"
                   rel="privacy-policy">Uslovi korišćenja i politika privatnosti</a> <button
                   class="btn-accept">Prihvatam</button>
           </div>
       </div>
   </div>
 --}}
   <div id="cookie-container" class="cookie">
       <div class="container">
           <div class="row">
               <div class="col-12 col-md-8 p-3">
                   <p>Koristimo kolačiće kako bismo unapredili funkcionalnost našeg sajta. Pritiskom na dugme prihvatate
                       korišćenje kolačića.</p>
               </div>
               <div class="col-12 col-md-4 d-flex justify-content-end align-items-center">
                   <a class="privacy-policy-link" target="_blank"
                       href="{{ route('frontend.page', 'uslovi-koriscenja-i-politika-privatnosti') }}"
                       rel="privacy-policy">Uslovi korišćenja i politika privatnosti</a>
                   <button id="accept-cookies"" class="btn-accept">Prihvatam</button>
               </div>
           </div>
       </div>
   </div>

   <!-- Shopping Cart Modal -->
   <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
               <div class="modal_body">
                   <div class="container">
                       <div class="row">
                           <div class="col-lg-5 col-md-5 col-sm-12">
                               <div class="modal_tab">
                                   <div class="tab-content product-details-large">
                                       <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                           <div class="modal_tab_img">
                                               <a href="#"><img
                                                       src="/themes/gold/assets/img/product/product1.jpg"
                                                       alt="" /></a>
                                           </div>
                                       </div>
                                       <div class="tab-pane fade" id="tab2" role="tabpanel">
                                           <div class="modal_tab_img">
                                               <a href="#"><img
                                                       src="/themes/gold/assets/img/product/product2.jpg"
                                                       alt="" /></a>
                                           </div>
                                       </div>
                                       <div class="tab-pane fade" id="tab3" role="tabpanel">
                                           <div class="modal_tab_img">
                                               <a href="#"><img
                                                       src="/themes/gold/assets/img/product/product3.jpg"
                                                       alt="" /></a>
                                           </div>
                                       </div>
                                       <div class="tab-pane fade" id="tab4" role="tabpanel">
                                           <div class="modal_tab_img">
                                               <a href="#"><img
                                                       src="/themes/gold/assets/img/product/product5.jpg"
                                                       alt="" /></a>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="modal_tab_button">
                                       <ul class="nav product_navactive owl-carousel" role="tablist">
                                           <li>
                                               <a class="nav-link active" data-bs-toggle="tab" href="#tab1"
                                                   role="tab" aria-controls="tab1" aria-selected="false"><img
                                                       src="/themes/gold/assets/img/product/product1.jpg"
                                                       alt="" /></a>
                                           </li>
                                           <li>
                                               <a class="nav-link" data-bs-toggle="tab" href="#tab2"
                                                   role="tab" aria-controls="tab2" aria-selected="false"><img
                                                       src="/themes/gold/assets/img/product/product2.jpg"
                                                       alt="" /></a>
                                           </li>
                                           <li>
                                               <a class="nav-link button_three" data-bs-toggle="tab" href="#tab3"
                                                   role="tab" aria-controls="tab3" aria-selected="false"><img
                                                       src="/themes/gold/assets/img/product/product3.jpg"
                                                       alt="" /></a>
                                           </li>
                                           <li>
                                               <a class="nav-link" data-bs-toggle="tab" href="#tab4"
                                                   role="tab" aria-controls="tab4" aria-selected="false"><img
                                                       src="/themes/gold/assets/img/product/product5.jpg"
                                                       alt="" /></a>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-7 col-md-7 col-sm-12">
                               <div class="modal_right">
                                   <div class="modal_title mb-10">
                                       <span class="fs-2">Donec eu furniture</span>
                                   </div>
                                   <div class="modal_price mb-10">
                                       <span class="new_price">$64.99</span>
                                       <span class="old_price">$78.99</span>
                                   </div>
                                   <div class="see_all">
                                       <a href="product-details.html">See all features</a>
                                   </div>
                                   <div class="modal_add_to_cart mb-15">
                                       <form action="#">
                                           <input min="0" max="100" step="2" value="1"
                                               type="number" />
                                           <button type="submit">add to cart</button>
                                       </form>
                                   </div>
                                   <div class="modal_description mb-15">
                                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                       </p>
                                   </div>
                                   <div class="modal_social">
                                       <span class="fs-2">Share this product</span>
                                       <ul>
                                           <li>
                                               <a href="#"><i class="fa fa-facebook"></i></a>
                                           </li>
                                           <li>
                                               <a href="#"><i class="fa-brands fa-x-twitter"></i></i></a>
                                           </li>
                                           <li>
                                               <a href="#"><i class="fa fa-pinterest"></i></a>
                                           </li>
                                           <li>
                                               <a href="#"><i class="fa fa-google-plus"></i></a>
                                           </li>
                                           <li>
                                               <a href="#"><i class="fa fa-linkedin"></i></a>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- #Shopping Cart Modal -->
