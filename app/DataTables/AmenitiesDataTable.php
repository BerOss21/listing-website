<?php

namespace App\DataTables;

use App\Models\Amenity;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AmenitiesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($amenity) {
                return view('admin.datatables.amenities.actions', ['id' => $amenity->id]);
            })
            ->editColumn('show_at_home',function($amenity){
                return $amenity->show_at_home? "<span class='badge badge-success'>Yes</span>":"<span class='badge badge-warning'>No</span>";
            })
            ->editColumn('status',function($amenity){
                return $amenity->status? "<span class='badge badge-success'>Yes</span>":"<span class='badge badge-warning'>No</span>";
            })
            ->editColumn('icon',function($amenity){
                return $amenity->icon?"<i class='{$amenity->icon}' style='font-size:50px;'></i>":"";
            })
            ->rawColumns(['action','show_at_home','status','icon'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Amenity $model): QueryBuilder
    {
        return $model->select('id','icon','name','show_at_home','status','created_at')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('amenities-table')
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
            Column::make('name'),
            Column::make('icon'),
            Column::make('show_at_home'),
            Column::make('status'),
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
        return 'Amenities_' . date('YmdHis');
    }
}
