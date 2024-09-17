@extends('frontend.themes.gold.layout.layout')
@section('robots', 'noindex,nofollow')
@section('content')
    <div class="checkout-area">
        <div class="container" style="min-height: 600px">
            <div class="row" style="min-height: 600px">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 mt-5 mb-5" style="text-align: center">
                    <h3 class="text-center p-5" style="margin-top:80px">Vaša porudžbina je uspešno primljena i biće obrađena
                        u najkraćem mogućem roku</h3>
                    <a href="{{ route('frontend.index') }}" class="check-button">Vrati se na početnu stranu</a>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout area end -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            localStorage.removeItem('cart');
            cartContainer.html("")
            cartContainer.append(cartEmpty)
            cartNumberContainer.html("")
            cartNumberContainer.append(cartNumberEmpty)
            $('.cart_text_quantity.subtotal-price').text('')
        })
    </script>
@endsection
