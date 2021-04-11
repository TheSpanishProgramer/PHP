<?php

namespace App\DataTables;

use App\Models\CertificationQuestionAnswer;
use Form;
use Yajra\Datatables\Services\DataTable;

class CertificationQuestionAnswerDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'certification_question_answers.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $certificationQuestionAnswers = CertificationQuestionAnswer::with('certificationQuestion');

        return $this->applyScopes($certificationQuestionAnswers);
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
                'order' => [0, 'asc'],
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
            'certification_question_id' => ['name' => 'certification_question_id', 'data' => 'certification_question.question', 'title' => 'Question'],
            'answer' => ['name' => 'answers', 'data' => 'answers'],
            'valid' => ['name' => 'valid', 'data' => 'valid'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'certificationQuestionAnswers';
    }
}
