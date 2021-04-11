<?php

namespace App\DataTables;

use App\Models\UserCertification;
use Form;
use Yajra\Datatables\Services\DataTable;

class UserCertificationDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'user_certifications.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $userCertifications = UserCertification::with('user')->where('status','=', UserCertification::PENDIENTE);

        return $this->applyScopes($userCertifications);
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
                'dom' => 'frtip',
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
           // 'character_description' => ['name' => 'character_description', 'data' => 'character_description', 'title' => 'Descripción del personaje'],
            'user_id' => ['name' => 'user_id', 'data' => 'user.name', 'title' => 'Usuario'],
            'status' => ['name' => 'status', 'data' => 'status', 'title' => 'Estado']

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'userCertifications';
    }
}
