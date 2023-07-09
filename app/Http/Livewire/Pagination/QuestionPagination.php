<?php

namespace App\Http\Livewire\Pagination;

use App\Models\QuizQuestions;
use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionPagination extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $limit = 10;



    public function render()
    {

        $searchTerm = '%' . $this->searchTerm . '%';
        $limit = $this->limit;
        $questions = QuizQuestions::query()->
        where("name", 'like', $searchTerm)->
        paginate($limit);

        return view('livewire.pagination.question-pagination',['questions'=>$questions]);
    }
}
