@php
/** @var string $name */
/** @var string $value */
@endphp
<td>
    <input type="text"
           class="form-control"
           name="filters[{{ $name }}]"
           value="{{ $value }}"
    >
</td>
