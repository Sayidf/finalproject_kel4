@extends('landingpage.index')
@section('content')
  <section id="login" class="login">
    <div class="container" data-aos="fade-up">
      <table class="table table-dark table-striped" id="cart">
        <thead>
          <tr>
            <th class="text-center">Menu</th>
            <th>Harga</th>
            <th style="width: 8%">Quantity</th>
            <th class="text-center">Subtotal</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @php $total = 0 @endphp
          @if (session('cart'))
            @foreach (session('cart') as $id => $details)
              @php $total += $details['harga'] * $details['quantity'] @endphp
              <tr data-id="{{ $id }}">
                <td data-th="Product">
                  <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{ url('/public/assets/img/menu') }}/{{ $details['foto'] }}" width="100" height="100" class="img-responsive" /></div>
                    <div class="col-sm-9">
                      <h4 class="text-start">{{ $details['nama'] }}</h4>
                    </div>
                  </div>
                </td>
                <td data-th="Price">Rp{{ $details['harga'] }}</td>
                <td data-th="Quantity">
                  <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                </td>
                <td data-th="Subtotal" class="text-center">Rp{{ $details['harga'] * $details['quantity'] }}
                </td>
                <td class="actions" data-th="">
                  <button class="btn btn-danger btn-sm remove-from-cart" title="Delete"><i ssclass="far fa-trash-alt"></i></button>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5" class="text-end">
              <h3><strong>Total {{ $total }}</strong></h3>
            </td>
          </tr>
          <tr>
            <td colspan="5" class="text-end">
              <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
              @if (Auth::check())
                <button class="btn btn-success">Checkout</button>
              @else
                <a href="{{ url('/login') }}" class="btn btn-success">Checkout</a>
              @endif
            </td>
          </tr>
        </tfoot>
      </table>
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
          id: ele.parents("tr").attr("data-id"),
          quantity: ele.parents("tr").find(".quantity").val()
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
            id: ele.parents("tr").attr("data-id")
          },
          success: function(response) {
            window.location.reload();
          }
        });
      }
    });
  </script>
@endsection
