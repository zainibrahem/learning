<div>

    <div class="row">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Stage Details</h4>
                    </div>

                    @if(!$deletepopUp)
                        <div class="header-title">
                            <button wire:click="delete" class="btn btn-outline-danger">Delete</button>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    @if($deletepopUp)
                        <div class="row">
                            <div class="acc-edit  col-lg-6">
                                <div class="p-5">
                                     <span>
                                 Are you sure you want to delete this stage ?
                                  deleting the stage will delete its related subjects

                              </span>
                                </div>
                                <div class="p-5">
                                    <button wire:click="deleteConfirm({{"true"}})" class="btn btn-outline-danger">Yes
                                    </button>
                                    <button wire:click="deleteConfirm({{"false"}})" class="btn btn-outline-info">No
                                    </button>
                                </div>
                            </div>
                        </div>
                    @else
                        <form wire:submit.prevent="submit">
                            <div class="row">
                                <div class="acc-edit  col-lg-12">

                                    <div class="form-group">
                                        <label wire:dirty.class=" text-bg-danger" wire:target="name" for="name">
                                            Name:</label>
                                        <input id="name" type="text" class="form-control" placeholder="{{$name}}"
                                               wire:model="name"
                                               wire:keydown="updateName"/>
                                        @error('name')
                                        <span class="error"
                                              style="margin-top: 0.25rem;font-size: 0.875em;color: #c03221;">
                                        {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 table-active pt-5">
                                        <h4> Options :</h4>

                                        @if($question->options->count()==0)
                                            <span>No subjects linked yet !</span>
                                        @endif
                                        <div class="row pt-5">
                                            @foreach($question->options as $item)

                                                <div class="card col-lg-2" style="width: 18rem;">

                                                    <div class="card-body">
                                                        <h5 class="card-title">{{$item->name}}</h5>
                                                        <p> is correct : {{$item->is_correct==1? "True":"false"}}</p>

                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </form>
                    @endif
                </div>
                <div>

                </div>
            </div>
        </div>

    </div>
</div>


