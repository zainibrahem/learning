<?php

namespace App\Http\Livewire\Pagination;

use App\Models\Stage;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class StagesPagination extends Component
{use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $limit = 10;


    public function render()
    {

        $searchTerm ='%' . $this->searchTerm .'%';

        $limit = $this->limit;

        $stages = Stage::query()->
        where("name", 'like', $searchTerm)->
        paginate($limit);


        return view('livewire.pagination.stages-pagination',['stages'=>$stages]);
    }
}
