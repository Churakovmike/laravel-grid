@php
    /** @var string $name */
    /** @var string $value */
@endphp
<td>
    <select class="form-control">
        @foreach($values as $key => $value)
            <option value="{!! $key !!}">{!! $value !!}</option>
        @endforeach
    </select>
</td>
