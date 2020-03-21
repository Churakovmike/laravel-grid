@php
/** @var \ChurakovMike\EasyGrid\Columns\DefaultColumn[] $columns */
/** @var \Illuminate\Pagination\LengthAwarePaginator $paginator */
@endphp
<div class="card">
    <div class="card-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="pull-right">
                    <div class="summary">
                        @if ($paginator->onFirstPage())
                            {!! trans('churakovmike_easygrid::grid.page-info', [
                                'start' => '<b>1</b>',
                                'end' => '<b>' . $paginator->perPage() . '</b>',
                                'total' => '<b>' . $paginator->total() . '</b>',
                            ]) !!}
                        @elseif ($paginator->currentPage() == $paginator->lastPage())
                            {!! trans('churakovmike_easygrid::grid.page-info', [
                                'start' => '<b>' . (($paginator->currentPage() - 1) * $paginator->perPage() + 1) . '</b>',
                                'end' => '<b>' . $paginator->total() . '</b>',
                                'total' => '<b>' . $paginator->total() . '</b>',
                            ]) !!}
                        @else
                            {!! trans('churakovmike_easygrid::grid.page-info', [
                                'start' => '<b>' . (($paginator->currentPage() - 1) * $paginator->perPage() + 1) . '</b>',
                                'end' => '<b>' . (($paginator->currentPage()) * $paginator->perPage()) . '</b>',
                                'total' => '<b>' . $paginator->total() . '</b>',
                            ]) !!}
                        @endif
                    </div>
                </div>
                @if($title)
                    <h3 class="panel-title">{!! $title !!}</h3>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        @foreach($columns as $column)
                            <th {!! $column->renderHtmlOptions() !!}>
                                <a href="{{ \ChurakovMike\EasyGrid\Helpers\SortHelper::getSortableLink(request(), $column) }}">{{ $column->getLabel() }}</a>
                            </th>
                        @endforeach
                    </tr>
                    @include('churakovmike_easygrid::filters.default', [
                        'columns' => $columns,
                    ])
                    </thead>
                    <tbody>
                        @foreach($paginator->items() as $key => $row)
                            <tr>
                                <td>{{ ($paginator->currentPage() - 1) * $paginator->perPage() + $key + 1 }}</td>
                                @foreach($columns as $column)
                                    <td>{!! $column->render($row) !!}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    {{--place for action columns--}}
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
            {{ $paginator->render('churakovmike_easygrid::pagination') }}
        </div>
    </div>
    </div>
</div>
