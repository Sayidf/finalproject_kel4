@extends('landingpage.index')
@section('content')
  @php
    $reservasi = App\Models\Reservasi::orderBy('id', 'DESC')->first();
  @endphp
  <section id="cart-section" class="cart-section" style="background: #1a1814">
    <div class="container p-4">
      <div class="section-title">
        <h2>Payment Confirmation</h2>
        <p>Purchase Order</p>
      </div>
      <div class="cart-desktop">
        <table class="table text-white table-borderless text-center align-middle" id="cart">
          <thead class="text-muted">
            <tr>
              <td class="text-start px-0">Detail Menu</td>
              <td>Price</td>
              <td>Quantity</td>
              <td>Subtotal</td>
              <td></td>
            </tr>
          </thead>
          <tbody class="rounded-3">
            @php $total = 0 @endphp
            @if (session('cart'))
              @foreach (session('cart') as $id => $details)
                @php $total += $details['harga'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}" class="ajax-cart">
                  <td class="text-start px-0 fw-bold">{{ $details['nama'] }}</td>
                  <td>Rp {{ number_format($details['harga'], 0, ',', '.') }}</td>
                  <td>{{ $details['quantity'] }}</td>
                  <td data-th="Subtotal">Rp {{ number_format($details['harga'] * $details['quantity'], 0, ',', '.') }}</td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
        <div class="w-100 mt-5">
          <div class="d-flex justify-content-between">
            <div class="d-flex flex-row">
              <span class="text-secondary align-self-center me-2">Total Payment: </span>
              <span class="fs-4 text-white fw-bolder align-self-center">&nbsp;Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
            <div class="d-flex justify-content-between w-25">
              <form method="POST" action="{{ route('pembayaran.store') }}">
                @csrf
                <button class="btn btn-dark p-3 ">Pay Now</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      {{-- MOBILE VIEW --}}

      <div class="cart-mobile d-none">
        @php $total = 0 @endphp
        @if (session('cart'))
          @foreach (session('cart') as $id => $details)
            @php $total += $details['harga'] * $details['quantity'] @endphp
            <div data-id="{{ $id }}" class="row ajax-cart">
              <div class="col px-0 ps-2">
                <div class="d-flex align-items-start flex-column bd-highlight">
                  <p class="fw-bold text-tiny">{{ $details['nama'] }}</p>
                  <p class="fw-bold text-temp-primary text-tiny">Rp
                    {{ number_format($details['harga'], 0, ',', '.') }}</p>
                  <div class="mt-auto bd-highlight w-100">
                    <div class="d-flex justify-content-between w-100">
                      <div class="d-table">
                        <span class="fw-bolder text-start mt-0 mb-0 text-nowrap d-table-cell align-middle">Rp {{ number_format($details['harga'] * $details['quantity'], 0, ',', '.') }}</span>
                      </div>
                      <div class="d-flex justify-content-end">
                        {{ $details['quantity'] }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="px-2">
                <div class="mb-4 border-grey"></div>
              </div>
            </div>
          @endforeach
        @endif
        <div class="fixed-bottom checkout-menu m-3">
          <div class="p-3 bg-dark rounded-3">
            <div class="d-flex justify-content-between w-100">
              <div class="row">
                <span>Total Payment</span>
                <span class="fw-bold mt-2">Rp {{ number_format($total, 0, ',', '.') }}</span>
              </div>
              <div>
                <div class="d-flex h-100">
                  <div class="d-flex align-items-center checkout-btn">
                    <form method="POST" action="{{ url('/pembarayan/proses') }}">
                      @csrf
                      <button class="btn btn-dark p-3">Pay Now</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
@endsection
@section('scripts')
  <script type="text/javascript">
    $(".update-cart").change(function(e) {
      e.preventDefault();
      var ele = $(this);
      $.ajax({
        url: '{{ route('update.cart') }}',
        method: "patch",
        data: {
          _token: '{{ csrf_token() }}',
          id: ele.parents(".ajax-cart").attr("data-id"),
          quantity: ele.parents(".ajax-cart").find(".quantity").val()
        },
        success: function(response) {
          window.location.reload();
        }
      });
    });
    $(".remove-from-cart").click(function(e) {
      e.preventDefault();
      var ele = $(this);
      if (confirm("Are you sure want to remove?")) {
        $.ajax({
          url: '{{ route('remove.from.cart') }}',
          method: "DELETE",
          data: {
            _token: '{{ csrf_token() }}',
            id: ele.parents(".ajax-cart").attr("data-id")
          },
          success: function(response) {
            window.location.reload();
          }
        });
      }
    });
    $(document).ready(function() {
      $('.minus').click(function() {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
      });
      $('.plus').click(function() {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
      });
    });

    function errorSweetAlert() {
      Swal.fire(
        'Gagal',
        'Reservasi Anda Belum Diverifikasi!',
        'error'
      )
    }
    var lastScrollTop = 0;
    $(window).scroll(function(event) {
      var st = $(this).scrollTop();
      if (st < lastScrollTop) {
        $(".checkout-menu").fadeIn('200');
      } else {
        $(".checkout-menu").fadeOut('200');
      }
      lastScrollTop = st;
    });
    $('.mobile-nav-toggle').click(function() {
      $('.checkout-menu').toggleClass('d-none');
    });
  </script>
@endsection
