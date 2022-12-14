@extends('landingpage.index')
@section('content')
    @php
        $reservasi = App\Models\Reservasi::orderBy('id', 'DESC')->first();
    @endphp
    <section id="cart-section" class="cart-section" style="background: #1a1814">
        <div class="container p-4">
            <div class="cart-desktop">
                <table class="table text-white table-borderless text-center align-middle" id="cart">
                    <thead class="text-muted">
                        <tr>
                            <td class="text-start px-0" style="width:150px"></td>
                            <td class="text-start px-0">Detail Menu</td>
                            <td>Harga</td>
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
                                    <td>
                                        @empty($details['foto'])
                                            <img src="{{ url('/public/assets/img/menu/placeholder.jpg') }}"width="100"
                                                class="img-responsive rounded-3 float-start px-0" />
                                        @else
                                            <img src="{{ url('/public/assets/img/menu') }}/{{ $details['foto'] }}"
                                                width="100" class="img-responsive rounded-3 float-start px-0" />
                                        @endempty
                                    </td>
                                    <td class="text-start px-0 fw-bold">{{ $details['nama'] }}
                                    </td>
                                    <td>Rp {{ number_format($details['harga'], 0, ',', '.') }}</td>
                                    <td>
                                        <button class="btn minus text-white border-0"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="{{ $details['quantity'] }}"
                                            class="quantity update-cart text-center px-0 rounded-3" />
                                        <button class="btn plus text-white border-0"><i class="fa fa-plus"></i></button>
                                    </td>
                                    <td data-th="Subtotal">Rp
                                        {{ number_format($details['harga'] * $details['quantity'], 0, ',', '.') }}</td>
                                    <td class="text-end align-middle"><button
                                            class="btn remove-from-cart text-tiny btn-dark border-0 rounded-circle"
                                            title="Delete"><i class="fa fa-times"></i></button></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="w-100 mt-5">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row">
                            <span class="text-secondary align-self-center me-2">Total Cost: </span>
                            <span class="fs-4 text-white fw-bolder align-self-center">&nbsp;Rp
                                {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between w-25">
                            <a href="{{ url('/menu') }}" class="btn btn-outline-light p-3 border-0 text-uppercase"><i
                                    class="fa fa-chevron-left me-2"></i>Lanjut Belanja</a>
                            @if (Auth::check())
                            @empty($ar_reservasi)
                                <button onclick="location.href='{{ url('/reservasi') }}'"
                                    class="btn btn-dark p-3">Checkout</button>
                            @else
                                @if ($ar_reservasi->status == 'approved')
                                    <form method="POST" action="{{ url('cart/checkout') }}">
                                        @csrf
                                        <button class="btn btn-dark p-3" data-bs-toggle="modal"
                                            data-bs-target="#checkout-modal">Checkout</button>
                                        {{-- <button class="btn btn-sm btn-success">Check Out</button> --}}
                                    </form>
                                @elseif ($ar_reservasi->status == 'pending')
                                    <button onclick="errorSweetAlert()" class="btn btn-dark p-3">Checkout</button>
                                @else
                                    <button onclick="location.href='{{ url('/reservasi') }}'"
                                        class="btn btn-dark p-3">Checkout</button>
                                @endif
                            @endempty
                        @else
                            <a href="{{ url('/login') }}" class="btn btn-dark p-3">Checkout</a>
                        @endif
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
                        <div class="col-4">
                            @empty($details['foto'])
                                <img src="{{ url('/public/assets/img/menu/placeholder.jpg') }}" width="100"
                                    class="rounded-3 float-start px-0" />
                            @else
                                <img src="{{ url('/public/assets/img/menu') }}/{{ $details['foto'] }}" width="100"
                                    class="rounded-3 float-start px-0" />
                            @endempty
                        </div>
                        <div class="col px-0 ps-2">
                            <div class="d-flex align-items-start flex-column bd-highlight">
                                <p class="fw-bold text-tiny">{{ $details['nama'] }}</p>
                                <p class="fw-bold text-temp-primary text-tiny">Rp
                                    {{ number_format($details['harga'], 0, ',', '.') }}</p>
                                <div class="mt-auto bd-highlight w-100">
                                    <div class="d-flex justify-content-between w-100">
                                        <div class="d-table">
                                            <span
                                                class="fw-bolder text-start mt-0 mb-0 text-nowrap d-table-cell align-middle">Rp
                                                {{ number_format($details['harga'] * $details['quantity'], 0, ',', '.') }}</span>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn minus text-white border-0"><i
                                                    class="fa fa-minus text-tiny"></i></button>
                                            <input type="text" value="{{ $details['quantity'] }}"
                                                class="quantity update-cart text-center text-tiny" />
                                            <button class="btn plus text-white border-0"><i
                                                    class="fa fa-plus text-tiny"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-2">
                            <button class="btn remove-from-cart text-white text-tiny border-0 px-1 py-3 fw-bold"
                                title="Delete">Hapus</button>
                            <div class="mb-4 border-grey"></div>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="fixed-bottom checkout-menu m-3">
                <div class="p-3 bg-dark rounded-3">
                    <div class="d-flex justify-content-between w-100">
                        <div class="row">
                            <span>Total Harga</span>
                            <span class="fw-bold mt-2">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div>
                            <div class="d-flex h-100">
                                <div class="d-flex align-items-center checkout-btn">
                                    @if (Auth::check())
                                    @empty($ar_reservasi)
                                        <button onclick="location.href='{{ url('/reservasi') }}'"
                                            class="d-grid align-items-center">Checkout</button>
                                    @else
                                        @if ($ar_reservasi->status == 'approved')
                                            <form method="POST" action="{{ url('cart/checkout') }}">
                                                @csrf
                                                <button type="submit" class="d-grid align-items-center"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#checkout-modal">Checkout</button>
                                            </form>
                                        @elseif ($ar_reservasi->status == 'pending')
                                            <button onclick="errorSweetAlert()"
                                                class="d-grid align-items-center">Checkout</button>
                                        @else
                                            <button onclick="location.href='{{ url('/reservasi') }}'"
                                                class="d-grid align-items-center">Checkout</button>
                                        @endif
                                    @endempty
                                @else
                                    <button onclick="location.href='{{ url('/login') }}'"
                                        class="d-grid align-items-center">Checkout</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-3">
            <div class="p-5 h-100 rounded-3 bg-dark">
              <div class="d-flex flex-column bd-highlight mb-3 h-100">
                <div class="border border-2"></div>
                <div class="d-flex justify-content-center mt-5">
                  <span class="text-tiny mt-auto me-3">TOTAL </span><span class="fw-bold ">&nbsp;Rp {{ number_format($total, 0, ',', '.') }}</span> 
                </div>
                <div class="d-flex justify-content-center mt-auto bd-highlight">
                  @if (Auth::check())
                  <button class="btn btn-success">Checkout</button>
                @else
                  <a href="{{ url('/login') }}" class="btn btn-success">Checkout</a>
                @endif
                </div>
              </div>
            </div>
          </div> --}}
    {{-- </div>
      </div> --}}
</div>
<!-- Modal -->
{{-- <div class="modal fade text-dark" id="checkout-modal" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Informasi Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Ringkasan Belanja</h6>
                <div class="pb-3 border-1 border-bottom border-dark">
                    <div class="d-flex justify-content-between text-tiny text-black-50">
                        <span>Total Pesanan {{ count((array) session('cart')) }} Menu</span>
                        <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>
                <div class="pt-3">
                    <div class="d-flex justify-content-between">
                        <div class="row">
                            <span class="text-tiny">Total Belanja</span>
                            <span class="fs-5 fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <button onclick="location.href='{{ url('done', $reservasi->id) }}'"
                            class="btn btn-dark text-tiny">Konfirmasi Pembayaran</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
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
