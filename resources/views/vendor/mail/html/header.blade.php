
@props(['url'])
<tr>
<td class="header">
{{-- <a href="{{ $url }}" style="display: inline-block;"> --}}
@if (trim($slot) === 'CCS FORUMS')
<img src="https://raw.githubusercontent.com/bakasibruceto/CCS-FORUMS/main/public/logo.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}

@endif
{{-- </a> --}}
</td>
</tr>
