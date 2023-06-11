<?php

namespace App\Http\Livewire\Pagination;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserPagination extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $limit = 10;


    public function render()
    {

        $searchTerm ='%' . $this->searchTerm .'%';

        $limit = $this->limit;

        $users = User::query()->
        where("name", 'like', $searchTerm)->
        paginate($limit);


        return view('livewire.pagination.user-pagination' ,[
        'users' => $users]);
    }
}
