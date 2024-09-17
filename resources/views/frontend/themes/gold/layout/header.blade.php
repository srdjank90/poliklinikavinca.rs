  <!-- Mobile Menu -->
  <div class="Offcanvas_menu">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="canvas_open">
                      <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                  </div>
                  <div class="Offcanvas_menu_wrapper">
                      <div class="canvas_close">
                          <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                      </div>
                      <div class="welcome_text">
                          <p>Vaša potraga za najboljom <span>cenom zlata</span> se završava ovde!</p>
                      </div>

                      <div class="top_right text-right">
                          <ul class="d-none">
                              <li class="top_links">
                                  @if (!Auth::check())
                                      <a class="" href="{{ route('login') }}"> <i class="bi bi-door-open"></i>
                                          {{ __('Login') }}</a>
                                  @else
                                      <a href="#">Moj nalog<i class="ion-chevron-down"></i></a>
                                      <ul class="dropdown_links">
                                          <li><a href="{{ route('frontend.profile.index') }}">Moj nalog </a></li>
                                          @if (Auth::user()->role_id < 3)
                                              <li><a class="text-warning" href="{{ route('backend') }}">Admin </a>
                                              </li>
                                          @endif
                                          <li><a href="#"
                                                  onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                      class="bi bi-door-open"></i> Odjavi se</a></li>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                              @csrf
                                          </form>
                                      </ul>
                                  @endif

                              </li>
                          </ul>
                      </div>
                      <div class="home_contact">
                          <div class="contact_box">
                              <label style="font-size: 14px">Posetite nas</label>
                              <p><a target="_blank" rel="noopener nofollow noreferrer"
                                      href="https://www.google.rs/maps/place/Balkanska+2,+Beograd/@44.8125304,20.4594604,17z/data=!3m1!4b1!4m6!3m5!1s0x475a7aadd6cc9529:0x1cf2565716b48577!8m2!3d44.8125304!4d20.4594604!16s%2Fg%2F1vk6x_s7?entry=ttu">
                                      Balkanska 2, 11000 Beograd</a></p>
                          </div>
                          <div class="contact_box">
                              <label style="font-size: 14px">Pozovite nas</label>
                              <p><a href="tel:+381637709128">+381 63 7709 128</a></p>
                          </div>
                      </div>
                      <div id="menu" class="text-left">
                          <ul class="offcanvas_main_menu">
                              <li class="menu-item-has-children">
                                  <a href="#">Zlatni standard</a>
                                  <ul class="sub-menu">
                                      <li><a href="{{ route('frontend.about') }}">O nama</a></li>
                                      <li><a href="{{ route('frontend.packages') }}">Investicioni kalkulator</a></li>
                                      <li><a href="{{ route('frontend.royalmint') }}">The Royal Mint Official
                                              Partner</a></li>
                                      <li><a href="{{ route('frontend.wholesale') }}">Veleprodaja zlata</a></li>
                                      <li><a href="{{ route('frontend.faqs') }}">Najčešća pitanja</a></li>
                                      <li><a href="{{ route('frontend.page', 'opsti-uslovi-kupovine') }}">Opšti uslovi
                                              kupovine</a></li>
                                      <li><a href="{{ route('frontend.contact') }}">Besplatne konsultacije</a></li>
                                  </ul>
                              </li>
                              <li class="menu-item-has-children">
                                  <a href="{{ route('frontend.index') }}">Zlato</a>
                                  <ul class="sub-menu">
                                      <li class="menu-item-has-children">
                                          Investiciono zlato
                                          <ul class="sub-menu">
                                              <li><a href="{{ route('frontend.products') }}">Svi zlatni proizvodi</a>
                                              </li>
                                              <li><a
                                                      href="{{ route('frontend.category.products', 'zlatne-plocice') }}">Zlatne
                                                      pločice</a></li>
                                              <li><a
                                                      href="s{{ route('frontend.category.products', 'zlatne-poluge') }}">Zlatne
                                                      poluge</a></li>
                                              <li><a href="{{ route('frontend.category.products', 'zlatni-dukati') }}">Zlatni
                                                      dukati</a></li>
                                              <li><a
                                                      href="{{ route('frontend.category.products', 'multi-pack-proizvodi') }}">Multi
                                                      pack
                                                      proizvodi</a></li>
                                              <li><a href="{{ route('frontend.packages') }}">Investicioni paketi</a>
                                              </li>
                                              <li><a
                                                      href="{{ route('frontend.category.products', 'zlatnici-za-poklon') }}">Zlatnici
                                                      za poklon</a></li>
                                          </ul>
                                      </li>
                                      <li class="menu-item-has-children">
                                          Najprodavaniji proizvodi
                                          <ul class="sub-menu">
                                              @foreach ($bestsellerProducts as $bProduct)
                                                  <li><a
                                                          href="{{ route('frontend.product', $bProduct->slug) }}">{{ $bProduct->name }}</a>
                                                  </li>
                                              @endforeach
                                          </ul>
                                      </li>
                                      <li class="menu-item-has-children d-none">
                                          <a href="{{ route('frontend.royalmint') }}">Royal Mint Official Partner</a>
                                          <ul class="sub-menu">
                                              @foreach ($royalMintProducts as $pRoyal)
                                                  <li><a
                                                          href="{{ route('frontend.product', $pRoyal->slug) }}">{{ $pRoyal->name }}</a>
                                                  </li>
                                              @endforeach
                                          </ul>
                                      </li>
                                  </ul>
                              </li>
                              <li class="menu-item-has-children">
                                  <a href="{{ route('frontend.index') }}">Srebro</a>
                                  <ul class="sub-menu">
                                      <li><a href="{{ route('frontend.investmentsilver') }}">Investiciono srebro</a>
                                      </li>
                                      <li><a href="{{ route('frontend.category.products', 'srebrne-poluge') }}">Srebrne
                                              poluge</a></li>
                                  </ul>
                              </li>
                              <li class="menu-item-has-children">
                                  <a href="{{ route('frontend.category.posts', 'saveti-strucnjaka') }}">Saveti
                                      stručnjaka</a>
                                  <ul class="sub-menu">
                                      @foreach ($menuPosts as $mPost)
                                          <li><a
                                                  href="{{ route('frontend.post', $mPost->slug) }}">{{ $mPost->title }}</a>
                                          </li>
                                      @endforeach
                                  </ul>
                              </li>
                              <li class="menu-item-has-children">
                                  <a href="{{ route('frontend.goldprice') }}">Cena zlata </a>
                              </li>

                              <li class="menu-item-has-children">
                                  <a href="{{ route('frontend.contact') }}"> Besplatne konsultacije</a>
                              </li>
                          </ul>
                      </div>
                      <div class="Offcanvas_footer">
                          <span><a href="mailto:info@zlatnistandard.rs"><i class="fa fa-envelope-o"></i>
                                  info@zlatnistandard.rs</a></span>
                          <ul>
                              <li>
                                  <a target="_blank" rel="noopener nofollow noreferrer"
                                      href="https://www.facebook.com/ZlatniStandarddoo"><i
                                          class="fa fa-facebook"></i></a>
                              </li>
                              <li>
                                  <a target="_blank" rel="noopener nofollow noreferrer"
                                      href="https://twitter.com/ZlatniStandard"><i class="fa fa-x"></i></a>
                              </li>
                              <li>
                                  <a target="_blank" rel="noopener nofollow noreferrer"
                                      href="https://www.linkedin.com/company/zlatnistandard/"><i
                                          class="fa fa-linkedin"></i></a>
                              </li>
                              <li>
                                  <a target="_blank" rel="noopener nofollow noreferrer"
                                      href="https://www.youtube.com/@ZlatniStandard"><i
                                          class="ion-social-youtube"></i></a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- #Mobile Menu -->

  <!-- Header Start -->
  <header class="header_area">
      <!--header top start-->
      <div class="header_top">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-7 col-md-12">
                      <div class="welcome_text">
                          <p>Vaša potraga za najboljom <span>cenom zlata</span> se završava ovde!</p>
                      </div>
                  </div>
                  <div class="col-lg-5 col-md-12">
                      <div class="top_right text-right">
                          <ul>
                              <li>
                                  <span class="current-gold-price">Trenutna cena zlata <b>{{ $goldPrice }}</b>
                                      EUR/g </span>
                              </li>

                              <li class="top_links">
                                  @if (!Auth::check())
                                      <a class="" href="{{ route('login') }}"> <i class="bi bi-door-open"></i>
                                          {{ __('Login') }}</a>
                                  @else
                                      <a href="#">Moj nalog<i class="ion-chevron-down"></i></a>
                                      <ul class="dropdown_links">
                                          <li><a href="{{ route('frontend.profile.index') }}">Moj nalog </a></li>
                                          @if (Auth::user()->role_id < 3)
                                              <li><a class="text-warning" href="{{ route('backend') }}">Admin </a>
                                              </li>
                                          @endif
                                          <li><a href="#"
                                                  onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                      class="bi bi-door-open"></i> Odjavi se</a></li>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                              @csrf
                                          </form>
                                      </ul>
                                  @endif

                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--header top start-->

      <!-- Header Middle -->
      <div class="header_middel">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-4">
                      <div class="home_contact">
                          <div class="contact_box">
                              <label>Posetite nas</label>
                              <p>
                                  <a target="_blank"
                                      href="https://www.google.rs/maps/place/Balkanska+2,+Beograd/@44.8125304,20.4594604,17z/data=!3m1!4b1!4m6!3m5!1s0x475a7aadd6cc9529:0x1cf2565716b48577!8m2!3d44.8125304!4d20.4594604!16s%2Fg%2F1vk6x_s7?entry=ttu">
                                      <i class="fa-solid fa-location-pin"></i> Balkanska 2, 11000
                                      Beograd</a>
                              </p>

                          </div>
                          <div class="contact_box">
                              <label>Pozovite nas</label>
                              <p>
                                  <a href="tel:+381637709128"> <i class="fa-solid fa-phone"></i>+381 63 7709 128</a>
                              </p>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-4">
                      <div class="logo">
                          <a href="{{ route('frontend.index') }}"><img
                                  src="/themes/gold/assets/img/logo/Zlatni_Standard_Logo.png"
                                  alt="Zlatni Standard" /></a>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-6">
                      <div class="middel_right">
                          <div class="d-block d-md-none">
                              @if (!Auth::check())
                                  <a class="" href="{{ route('login') }}"> <i class="bi bi-door-open"></i>
                                      {{ __('Login') }}</a>
                              @else
                                  <a href="{{ route('frontend.profile.index') }}">Moj nalog </a>
                              @endif
                          </div>
                          <div class="search_btn d-none">
                              <a href="#"><i class="ion-ios-search-strong"></i></a>
                              <div class="dropdown_search">
                                  <form action="#">
                                      <input placeholder="Pretraži proizvode..." type="text" />
                                      <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                  </form>
                              </div>
                          </div>
                          <div class="cart_link">
                              <a href="#"><i class="ion-android-cart"></i><span
                                      class="cart_text_quantity subtotal-price">
                                  </span> <i class="fa fa-angle-down"></i></a>
                              <div class="cart-number-container"></div>

                              <!-- Cart -->
                              <div class="mini_cart ">
                                  <!-- Cart Header -->
                                  <div class="cart_close">
                                      <div class="cart_text">
                                          <span class="fs-3">Korpa</span>
                                      </div>
                                      <div class="mini_cart_close">
                                          <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                                      </div>
                                  </div>
                                  <!-- #Cart Header -->

                                  <!-- Cart Content -->
                                  <div class="cart-container">

                                  </div>
                              </div>
                              <!-- #Cart -->
                          </div>
                      </div>
                  </div>
                  <div class="col-12 d-bloc d-md-none mt-3 text-center">
                      Trenutna cena zlata <b>{{ $goldPrice }}</b> EUR/g
                  </div>
              </div>
          </div>
      </div>
      <!-- #Header Middle -->

      <!--header bottom satrt-->
      <div class="header_bottom sticky-header">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-12">
                      <div class="main_menu_inner">
                          <div class="logo_sticky">
                              <a href="{{ route('frontend.index') }}"><img
                                      src="/themes/gold/assets/img/logo/logo-sticky.webp" alt="Zlatni Standard" /></a>
                          </div>
                          <div class="main_menu">
                              <nav>
                                  <ul>
                                      <li class="active2"><a href="{{ route('frontend.index') }}">Zlatni Standard <i
                                                  class="fa fa-angle-down"></i></a>
                                          <ul class="sub_menu pages">

                                              <li><a href="{{ route('frontend.about') }}">O nama</a></li>
                                              <li><a href="{{ route('frontend.packages') }}">Investicioni
                                                      kalkulator</a></li>
                                              <li><a href="{{ route('frontend.royalmint') }}">The Royal Mint Official
                                                      Partner</a></li>
                                              <li><a href="{{ route('frontend.wholesale') }}">Veleprodaja zlata</a>
                                              </li>
                                              <li><a href="{{ route('frontend.faqs') }}">Najčešća pitanja</a></li>
                                              <li><a href="{{ route('frontend.page', 'opsti-uslovi-kupovine') }}">Opšti
                                                      uslovi kupovine</a></li>
                                              <li><a href="{{ route('frontend.contact') }}">Besplatne konsultacije</a>
                                              </li>
                                          </ul>
                                      </li>

                                      <li>
                                          <a href="{{ route('frontend.index') }}">zlato <i
                                                  class="fa fa-angle-down"></i></a>
                                          <ul class="mega_menu bg-gold">
                                              <li>
                                                  <span class="text-uppercase fs-6 mb-2">Investiciono zlato</span>
                                                  <ul>
                                                      <li><a href="{{ route('frontend.products') }}">Svi zlatni
                                                              proizvodi</a></li>
                                                      <li><a
                                                              href="{{ route('frontend.category.products', 'zlatne-plocice') }}">Zlatne
                                                              pločice</a></li>
                                                      <li><a
                                                              href="{{ route('frontend.category.products', 'zlatne-poluge') }}">Zlatne
                                                              poluge</a></li>
                                                      <li><a
                                                              href="{{ route('frontend.category.products', 'zlatni-dukati') }}">Zlatni
                                                              dukati</a></li>
                                                      <li><a
                                                              href="{{ route('frontend.category.products', 'multi-pack-proizvodi') }}">Multi
                                                              pack
                                                              proizvodi</a></li>
                                                      <li><a href="{{ route('frontend.packages') }}">Investicioni
                                                              paketi</a></li>
                                                      <li><a
                                                              href="{{ route('frontend.category.products', 'zlatnici-za-poklon') }}">Zlatnici
                                                              za poklon</a></li>
                                                  </ul>
                                              </li>
                                              <li>
                                                  <span class="text-uppercase fs-6 mb-2">Najprodavaniji
                                                      proizvodi</span>
                                                  <ul>
                                                      @foreach ($bestsellerProducts as $bProduct)
                                                          <li><a
                                                                  href="{{ route('frontend.product', $bProduct->slug) }}">{{ $bProduct->name }}</a>
                                                          </li>
                                                      @endforeach
                                                  </ul>
                                              </li>
                                              <li class="d-none">
                                                  <a href="{{ route('frontend.royalmint') }}">Royal Mint Official
                                                      Partner</a>
                                                  <ul>
                                                      @foreach ($royalMintProducts as $pRoyal)
                                                          <li><a
                                                                  href="{{ route('frontend.product', $pRoyal->slug) }}">{{ $pRoyal->name }}</a>
                                                          </li>
                                                      @endforeach
                                                  </ul>
                                              </li>
                                          </ul>
                                      </li>
                                      <li>
                                          <a href="{{ route('frontend.index') }}">Srebro
                                              <i class="fa fa-angle-down"></i></a>
                                          <ul class="sub_menu pages bg-silver" style="background-color:#d7d7d7">
                                              <li><a href="{{ route('frontend.investmentsilver') }}">Investiciono
                                                      srebro</a></li>
                                              <li><a
                                                      href="{{ route('frontend.category.products', 'srebrne-poluge') }}">Srebrne
                                                      poluge</a></li>
                                          </ul>
                                      </li>
                                      <li>
                                          <a href="{{ route('frontend.category.posts', 'saveti-strucnjaka') }}">Saveti
                                              stručnjaka <i class="fa fa-angle-down"></i></a>
                                          <ul class="sub_menu pages">
                                              @foreach ($menuPosts as $mPost)
                                                  <li><a
                                                          href="{{ route('frontend.post', $mPost->slug) }}">{{ $mPost->title }}</a>
                                                  </li>
                                              @endforeach
                                          </ul>
                                      </li>
                                      <li>
                                          <a href="{{ route('frontend.goldprice') }}">Cena zlata </a>
                                      </li>
                                      <li>
                                          <a href="{{ route('frontend.contact') }}"> Besplatne konsultacije</a>
                                      </li>
                              </nav>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="prices-updated">
              <div class="container">
                  <div class="row">
                      <div class="col-12 text-right">
                          <p class="p-0 m-0"><i style="color: #2cc23b" class="fa-solid fa-circle"></i> Cene su
                              ažurirane
                              pre 1 minut.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--header bottom end-->

  </header>
  <!-- #Header Start -->
