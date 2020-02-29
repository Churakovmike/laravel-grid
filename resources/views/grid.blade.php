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
                            Показаны <b>1-{{ $paginator->perPage() }}</b>
                        @elseif ($paginator->currentPage() == $paginator->lastPage())
                            Показаны <b>{{ ($paginator->currentPage() - 1) * $paginator->perPage() + 1  }}-{{ $paginator->total() }}</b>
                        @else
                            Показаны <b>{{ ($paginator->currentPage() - 1) * $paginator->perPage() + 1  }}-{{ ($paginator->currentPage()) * $paginator->perPage() }}</b>
                        @endif
                        из <b>{{ $paginator->total() }}</b> записи.
                    </div>
                </div>
                <h3 class="panel-title"></h3>
            </div>
            <div id="w8-container" class="table-responsive">
                <table class="table table-bordered table-striped table-hover"><colgroup><col>
                    <thead>
                    <tr>
                        @foreach($columns as $column)
                            <th>
                                <a href="{{ \ChurakovMike\EasyGrid\Helpers\SortHelper::getSortableLink(request(), $column) }}">{{ $column->getLabel() }}</a>
                            </th>
                        @endforeach
                    </tr>
                    @include('churakovmike_easygrid::filters.default')
                    </thead>
                    <tbody>
                        @foreach($paginator->items() as $row)
                            <tr>
                                @foreach($columns as $column)
                                    <td>{{ $column->getValue($row) }}</td>
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
