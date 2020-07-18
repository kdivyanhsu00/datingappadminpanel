@extends('vendor.zurb.ink')

@section('head')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>
    <meta name="application-name" content="@lang('app.name')"/>
    <meta name="author" content="@lang('app.owner')"/>
@endsection

{{-- Extend Vendor Ink with more styles --}}
@section('styles')
  .h1 {font-size: 40px;}
  .h2 {font-size: 36px;}
  .h3 {font-size: 32px;}
  .h4 {font-size: 28px;}
  .h5 {font-size: 24px;}
  .h6 {font-size: 20px;}
  .text-muted{
    color:#40474E;
  }
  .text-danger{
    color:#721c24;
  }
  .text-warning{
    color:#856404;
  }
  .text-info{
    color:#0c5460;
  }
  .text-success{
    color:#155724;
  }
  .text-customer{
    color:#7976A3;
  }
  .text-right,
  td.text-right,
  td.text-right > p,
  td[class="text-right"]
  {
    text-align:right!important;
  }
  td[class="border-bottom"] {
    border-bottom:1px solid #777777;
  }

  .highlight-yellow{
    background-color:#FCB415;
  }
  .btn{
	padding:5px 10px;
  }

  ol.danger,ul.danger,p.danger {
    color: #721c24;
  }

  .highlight-danger {
    color: #721c24;
    background-color: #FCB415;
    font-weight: bold;
  }

@endsection

@section('body')

    @unless( empty($excerpt) )
        <div style="font-size:0px;display:none!important;">{!! $excerpt !!}</div>
    @endunless

    <table class="body">
        <tr>
            <td class="center" align="center" valign="top">
                <center>
                    <table class="container">
                        <tr>
                            <td>
                                @yield('header')

                                @yield('content')
                                {!! $content ?? '' !!}

                                @yield('footer')
                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
  </table>

@endsection
