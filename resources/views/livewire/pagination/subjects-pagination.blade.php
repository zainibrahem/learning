
<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Subjects</h4>
            </div>

            <div class="header-title">
                <a href="{{route("subject.create")}}" class="card-title">Add subject</a>
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
                                <th>Stage</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <th>{{$item->name}}</th>
                                    <th>{{$item->creator->email}}</th>
                                    <th class=" {{ $item->stage->name == 'Primary'?"text-info":"" }}
                                                {{ $item->stage->name == 'Secondary'?"text-primary":"" }}
                                                {{ $item->stage->name == 'High school'?"text-secondary":"" }}"
                                    >
                                        {{$item->stage->name}}
                                    </th>
                                    <th>

                                        <a href="{{route('subjects.show',$item->id)}}">
                                            <svg fill="#62d0df" height="30px" width="40px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve" stroke="#62d0df"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="1.024"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M502.538,230.186C446.381,163.61,354.217,123.863,256,123.863S65.619,163.61,9.462,230.186 c-12.617,14.957-12.617,36.671,0,51.627C65.618,348.39,157.782,388.137,256,388.137s190.382-39.747,246.538-106.323 C515.154,266.857,515.154,245.144,502.538,230.186z M188.053,147.198c21.993-4.432,44.786-6.747,67.947-6.747 s45.953,2.314,67.947,6.747c24.646,20.372,38.758,50.263,38.758,82.265c0,58.837-47.868,106.705-106.705,106.705 S149.295,288.3,149.295,229.463C149.295,197.469,163.409,167.569,188.053,147.198z M489.859,271.12 C436.815,334.007,349.391,371.551,256,371.551S75.184,334.007,22.14,271.12c-7.39-8.761-7.39-21.479,0-30.24 c33.76-40.023,81.455-69.758,135.741-86.107c-16.216,21.239-25.171,47.298-25.171,74.689c0,67.982,55.308,123.291,123.291,123.291 s123.291-55.308,123.291-123.291c0-27.396-8.953-53.451-25.168-74.688c54.283,16.348,101.978,46.083,135.736,86.106 C497.249,249.642,497.249,262.36,489.859,271.12z"></path> </g> </g> <g> <g> <path d="M304.18,208.521c-1.829-4.2-6.715-6.123-10.914-4.295c-4.2,1.828-6.122,6.714-4.295,10.914 c1.968,4.521,2.966,9.34,2.966,14.323c0,19.816-16.122,35.937-35.937,35.937s-35.937-16.121-35.937-35.937 c0-19.816,16.122-35.937,35.937-35.937c5.006,0,9.847,1.007,14.387,2.993c4.198,1.837,9.086-0.078,10.921-4.275 c1.836-4.196-0.078-9.086-4.275-10.922c-6.65-2.908-13.727-4.383-21.035-4.383c-28.961,0-52.523,23.562-52.523,52.523 s23.562,52.523,52.524,52.523c28.961,0,52.523-23.562,52.523-52.523C308.523,222.189,307.061,215.143,304.18,208.521z"></path> </g> </g> </g></svg>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>created by</th>
                                <th>Stage</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    {{ $subjects->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

