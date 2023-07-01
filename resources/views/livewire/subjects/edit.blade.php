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
        <form wire:submit.prevent="submit">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Subject Details</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="acc-edit  col-lg-6">

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
                                <div class="form-group">
                                    <label for="email">Stage :</label>
                                    <select class="form-select" placeholder="{{$stage1}}" wire:model="stage"
                                            wire:keydown="updateStage">
                                        <option value="{{$subject->stage->id}}">
                                            {{$subject->stage->name}}
                                        </option>
                                        @foreach($otherStage as $item)

                                            <option value="{{$item->id}}">
                                                {{$item->name}}
                                            </option>
                                        @endforeach


                                    </select>
                                </div>

                            </div>

                            <div class="acc-edit  col-lg-6">

                                <div class="form-group">
                                    <label for=""> Image:</label>
                                    <input type="file" class="form-control" placeholder="{{$image1}} "
                                           wire:model="image1" wire:keydown="updateImage"/>
                                    @error('image')
                                    <span class="error"
                                          style="margin-top: 0.25rem;font-size: 0.875em;color: #c03221;">
                                        {{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($image1)
                                    <img width="21%" src="{{ $image1->temporaryUrl() }}" alt="subject image"/>
                                @else
                                    <div class="form-group">
                                        <img width="50%" src="{{asset($image)}}"/>
                                    </div>
                                @endif

                            </div>

                            <div class="acc-edit  col-lg-12">
                                <h5>Teachers: </h5>
                                <div class="row pt-5">
                                    @if($subject->teachers->count()==0)
                                        <span>No teachers linked to this subject yet !</span>
                                    @endif
                                    @foreach($subject->teachers as $teacheritem)

                                        <div class="card  col-lg-4" style="border-radius: 15px;">
                                            <div class="card-body">
                                                <div class="d-flex text-black">
                                                    <div class="flex-shrink-0">
                                                        <img
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                                            alt="Generic placeholder image" class="img-fluid"
                                                            style="width: 180px; border-radius: 10px;">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h5 class="mb-1">{{$teacheritem->name}}</h5>
                                                        <p class="mb-2 pb-1" style="color: #2b2a2a;"></p>
                                                        <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                                             style="background-color: #efefef;">
                                                            <div>
                                                                <p class="small text-muted mb-1">Files</p>
                                                                <p class="mb-0">{{$teacheritem->files->count()}}</p>
                                                            </div>
                                                            <div class="px-3">
                                                                <p class="small text-muted mb-1">Subjects</p>
                                                                <p class="mb-0">
                                                                    {{$teacheritem->subjects->count()}}
                                                                </p>
                                                            </div>
                                                            {{--                                                                            <div>--}}
                                                            {{--                                                                                <p class="small text-muted mb-1">Rating</p>--}}
                                                            {{--                                                                                <p class="mb-0">8.5</p>--}}
                                                            {{--                                                                            </div>--}}
                                                        </div>
                                                        <div class="d-flex pt-1">
                                                            <button type="button"
                                                                    wire:click="removeTeacher({{$teacheritem->id}})"
                                                                    class="btn btn-outline-danger me-1 flex-grow-1">
                                                                Remove
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>


