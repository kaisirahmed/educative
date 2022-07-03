<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('learningAdminAssets/images/logo.jpg') }}" class="logo" alt="E-learning Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
