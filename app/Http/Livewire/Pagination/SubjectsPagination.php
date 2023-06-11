<?php

namespace App\Http\Livewire\Pagination;


use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class SubjectsPagination extends Component

{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $limit = 10;


    public function render()
    {

        $searchTerm = '%' . $this->searchTerm . '%';
        $limit = $this->limit;
        $subjects = Subject::query()->
        where("name", 'like', $searchTerm)->
        paginate($limit);

        return view('livewire.pagination.subjects-pagination', [
            'subjects' => $subjects
        ]);
    }
}
