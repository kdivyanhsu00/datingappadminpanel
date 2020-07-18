@extends('layouts.email')

@section('header')
    @unless(app()->environment('production'))
        @component('emails.components.panel')
            <p>This email was sent from {{ strtoupper(app()->environment()) }} environment.</p>
        @endcomponent
    @endunless

    @component('emails.components.row')
          <img src="{!! url('img/logo.png' ) !!}"
               alt=" {!! config('app.name') !!}" width="150">
    @endcomponent

    @component('emails.components.row')
        <p>{!! date( 'F j, Y' ) !!}</p>
    @endcomponent
@stop

@section('footer')
  @yield('email_footer_action', '')
  <hr>
  <table class="row">
    <tr>
      <td class="wrapper">
        <table class="one column">
          <tr>
            <td class="" style="padding-top:2px">
                <img src="{!! url('img/logo.png' ) !!}" alt=" {!! config('app.name') !!}" width="100">
            </td>
            <td class="expander"></td>
          </tr>
        </table>
      </td>
      <td class="wrapper last">
        <table class="eleven columns">
          <tr>
            <td class="last">
              <p class="text-muted" style="font-size:85%;line-height:15.3px;">
               {!! config('app.name') !!}
                <br>Phone: {!! config('apth.support_phone') !!}
                <br>Fax: {!! config('apth.support_fax') !!}
                <br>Email: {!! config('apth.support_email') !!}</a>
              </p>
            </td>
            <td class="expander"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
@stop
