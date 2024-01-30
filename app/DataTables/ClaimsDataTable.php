<?php

namespace App\DataTables;

use App\Models\Claim;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ClaimsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($claim) {
                return view('admin.datatables.claims.actions', ['id' => $claim->id]);
            })
            ->addColumn('listing',function($claim){
                $route=route('pages.listing-detail',$claim->listing->slug);
                return "<a target='_blank' href={$route}>{$claim->listing->title}<a/>";
            })
            ->addColumn('user',function($claim){
                return $claim->user->firstname.' '.$claim->user->lastname;
            })
            ->editColumn('created_at',function($claim){
                return $claim->created_at->format('d/m/Y');
            })
        
            ->rawColumns(['action','listing'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Claim $model): QueryBuilder
    {
        return $model->with(['listing','user'])->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('claims-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->visible(false),
            Column::make('user'),
            Column::make('listing'),
            Column::make('claim'),
            Column::make('created_at'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Claims_' . date('YmdHis');
    }
}
