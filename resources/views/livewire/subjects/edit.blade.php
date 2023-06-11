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
                            <h4 class="card-title">Account Setting</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="acc-edit  col-lg-6">

                                    <div class="form-group">
                                        <label wire:dirty.class=" text-bg-danger" wire:target="name" for="name"> Name:</label>
                                        <input id="name"  type="text" class="form-control" placeholder="{{$name}}"
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
                                        <select class="form-select" placeholder="{{$stage1}}" wire:model="stage"  wire:keydown="updateStage">
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
                                    <input   type="file" class="form-control" placeholder="{{$image1}} "
                                            wire:model="image1"  wire:keydown="updateImage"/>
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
                        </div>
                    </div>

                </div>
                <div>
                    <button type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>


