<table class="row {{ $componentClass ?? '' }}">
  <tr>
    <td class="wrapper">
      <table class="three columns">
        <tr>
          <td><b>{{ $title }}:</b></td>
          <td class="expander"></td>
        </tr>
      </table>
    </td>
    <td class="wrapper last">
      <table class="nine columns">
        <tr>
          <td>{{ $slot }}</td>
          <td class="expander"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
