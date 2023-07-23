<?php

namespace App\Http\Livewire\Pagination;

use Livewire\Component;
use Livewire\WithPagination;

class Quiz extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $limit = 10;

    public $quizes;
    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $limit = $this->limit;
        $quiz = \App\Models\Quiz::query()->
        where("name", 'like', $searchTerm)->
        paginate($limit);

        //\App\Models\Quiz::query()->all();
        return view('livewire.pagination.quiz',['quiz'=>$quiz]);
    }
}
