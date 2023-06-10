
<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Stages</h4>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class=" dataTables_wrapper dt-bootstrap5">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                        wire:model="limit" aria-controls="DataTables_Table_0"
                                        class="form-select form-select-sm">
                                        <option  value="10">10</option>
                                        <option value="25">25</option>
                                        <option  value="50">50</option>
                                        <option  value="100">100</option>
                                    </select> entries</label> @json($limit)</div>                        </div>
                        <div class="col-md-6">
                            <div  class="dataTables_filter">
                                <label>Search:

                                    <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />

                                    {{--                                       <input type="text" wire:model="queryString">--}}
                                    {{--                                        <input--}}
                                    {{--                                            type="text" class="form-control form-control-sm" placeholder="search"--}}
                                    {{--                                            wire:model="queryString" value="">--}}
                                </label></div>
                        </div>
                    </div>
                    <div class="table-responsive border-bottom my-3">


                        <table id="" class="table table-striped" data-toggle="data-tabl2e">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>created by</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stages as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <th>{{$item->name}}</th>
                                    <th>{{$item->creator->email}}</th>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>created by</th>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    {{ $stages->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

