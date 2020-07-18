<table class="row {{ $componentClass ?? '' }}">
  <tr>
    <td class="wrapper">
      <table class="{{ $col1Class ?? 'four' }} columns">
        <tr>
          <td>{{ $column1 }}</td>
          <td class="expander"></td>
        </tr>
      </table>
    </td>
    <td class="wrapper">
      <table class="{{ $col2Class ?? 'five' }} columns">
        <tr>
          <td>
            {{ $column2 }}
          </td>
          <td class="expander"></td>
        </tr>
      </table>
    </td>
    <td class="wrapper last">
      <table class="{{ $col3Class ?? 'three' }} columns">
        <tr>
          <td>{{ $column3 }}</td>
          <td class="expander"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>

