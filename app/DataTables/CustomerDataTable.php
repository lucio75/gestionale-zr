<?php

namespace App\DataTables;

use App\Models\Customer;
use Form;
use Yajra\Datatables\Services\DataTable;

class CustomerDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'customers.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $customers = Customer::query();

        return $this->applyScopes($customers);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'name' => ['name' => 'name', 'data' => 'name'],
            'address' => ['name' => 'address', 'data' => 'address'],
            'vatnumber' => ['name' => 'vatnumber', 'data' => 'vatnumber'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'phone' => ['name' => 'phone', 'data' => 'phone'],
            'note' => ['name' => 'note', 'data' => 'note']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'customers';
    }
}
