@php
//dd($columns);
@endphp
<td></td>
<form action="" method="get" id="js-easy-grid">
@foreach($columns as $column)
    {!! $column->filter->render() !!}
@endforeach
<input type="submit" style="visibility: hidden">
</form>
