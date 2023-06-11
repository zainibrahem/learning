<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Files</h4>
            </div>

            <div class="header-title">
                <button type="button" wire:click="showModel" class="btn btn-primary" data-toggle="modal"
                        data-target=".bd-example-modal-lg"> {{$isCreate? "Back":"Create new file"}}
                </button>
            </div>
        </div>
        @if($isCreate)
            <div class="card-body">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Upload a file </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="submit">
                                <div class="row">
                                    <div class="col-lg-6"><div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">File:</label>
                                            <input type="file" class="form-control" id="recipient-name"  wire:model="file">
                                            @error('file')<span class="error"
                                                                style="margin-top: 0.25rem;font-size: 0.875em;color: #c03221;">{{ $message }}</span>@enderror
                                        </div></div>
                                    <div class="col-lg-6">     <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Name:</label>
                                            <input wire:model="name" class="form-control" id="message-text"/>
                                            @error('name')<span class="error"
                                                                style="margin-top: 0.25rem;font-size: 0.875em;color: #c03221;">{{ $message }}</span>@enderror
                                        </div></div>
                                    <div class="col-lg-3">    <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Subject:</label>
                                            <select wire:model="subject" class="form-control" id="message-text">
                                                <option value="">Please select a subject</option>
                                                @foreach($subjects as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach

                                            </select>
                                            @error('subject')<span class="error"
                                                                   style="margin-top: 0.25rem;font-size: 0.875em;color: #c03221;">{{ $message }}</span>@enderror
                                        </div></div>


                                </div>



                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-primary" data-bs-dismiss="modal">Submit</button>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endif


        @if(!$isCreate)
            <div class="card-body">

                <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class=" dataTables_wrapper dt-bootstrap5">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                            wire:model="limit" aria-controls="DataTables_Table_0"
                                            class="form-select form-select-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label> @json($limit)</div>
                            </div>
                            <div class="col-md-6">
                                <div class="dataTables_filter">
                                    <label>Search:

                                        <input type="text" class="form-control" placeholder="Search"
                                               wire:model="searchTerm"/>
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

                                    <th>type</th>
                                    <th>subject</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($files as $item)
                                    <tr>
                                        <th>{{$item->id}}</th>
                                        <th>{{$item->name}}</th>
                                        <th>{{$item->creator->email}}</th>
                                        <th>{{$item->type}}</th>
                                        <th>{{$item->subject->name}}</th>
                                        <th>
                                            <a href="#">
                                                <svg fill="#376fc8" version="1.1" id="Capa_1"
                                                     height="20px" width="20px"
                                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     viewBox="0 0 482.428 482.429" xml:space="preserve"
                                                     stroke="#376fc8"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier"
                                                     stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g>
                                                     <path d="M381.163,57.799h-75.094C302.323,25.316,274.686,0,241.214,0c-33.471,0-61.104,25.315-64.85,57.799h-75.098 c-30.39,0-55.111,24.728-55.111,55.117v2.828c0,23.223,14.46,43.1,34.83,51.199v260.369c0,30.39,24.724,55.117,55.112,55.117 h210.236c30.389,0,55.111-24.729,55.111-55.117V166.944c20.369-8.1,34.83-27.977,34.83-51.199v-2.828 C436.274,82.527,411.551,57.799,381.163,57.799z M241.214,26.139c19.037,0,34.927,13.645,38.443,31.66h-76.879 C206.293,39.783,222.184,26.139,241.214,26.139z M375.305,427.312c0,15.978-13,28.979-28.973,28.979H136.096 c-15.973,0-28.973-13.002-28.973-28.979V170.861h268.182V427.312z M410.135,115.744c0,15.978-13,28.979-28.973,28.979H101.266 c-15.973,0-28.973-13.001-28.973-28.979v-2.828c0-15.978,13-28.979,28.973-28.979h279.897c15.973,0,28.973,13.001,28.973,28.979 V115.744z"></path> <path d="M171.144,422.863c7.218,0,13.069-5.853,13.069-13.068V262.641c0-7.216-5.852-13.07-13.069-13.07 c-7.217,0-13.069,5.854-13.069,13.07v147.154C158.074,417.012,163.926,422.863,171.144,422.863z"></path> <path d="M241.214,422.863c7.218,0,13.07-5.853,13.07-13.068V262.641c0-7.216-5.854-13.07-13.07-13.07 c-7.217,0-13.069,5.854-13.069,13.07v147.154C228.145,417.012,233.996,422.863,241.214,422.863z"></path>
                                                      <path d="M311.284,422.863c7.217,0,13.068-5.853,13.068-13.068V262.641c0-7.216-5.852-13.07-13.068-13.07 c-7.219,0-13.07,5.854-13.07,13.07v147.154C298.213,417.012,304.067,422.863,311.284,422.863z"></path> </g> </g> </g></svg>
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

                                    <th>type</th>
                                    <th>subject</th>
                                    <th>Actions</th>

                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{ $files->links() }}
                    </div>
                </div>
            </div>
        @endif

    </div>


</div>
