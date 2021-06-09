<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === "Livraria Laravel")
<img src="{{ asset('img/logo.png') }}" class="logo" alt="Livraria Laravel">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
