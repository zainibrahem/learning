<div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Create new Subject</h4>
            </div>
        </div>
        <div class="card-body">

            <div class="card">

                <div class="card-body">
                    <p></p>
                    <form class="row g-3 needs-validation" wire:submit.prevent="submit">
                        <div class="col-md-6">

                            <label for="validationCustom01" class="form-label">Subject Name</label>
                            <input type="text" class="form-control" id="validationCustom01" wire:model="name" required>
                            @error('name')<span class="error" style="margin-top: 0.25rem;font-size: 0.875em;color: #c03221;">{{ $message }}</span>@enderror

                        </div>
                        <div  class="col-md-6">

                            <label for="teacher-select"class="form-label">Teachers</label>
                                <select wire:model="teacher" class="form-select">
                                    <option style="border-bottom:1px solid deepskyblue ; padding-bottom: 10px "  disabled value="">Choose Teachers</option>
                                    @if($teachers)
                                        @foreach($teachers as $item)
                                            <option style="border-bottom:1px solid deepskyblue ; padding-bottom: 10px " value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    @endif

                                </select>
                                @error('teacher') <span class="error" style="margin-top: 0.25rem;font-size: 0.875em;color: #c03221;">{{ $message }}</span> @enderror

                        </div>

                        <div class="col-md-8">

                            <label for="validationCustom04" class="form-label">Stage</label>
                            <select class="form-select" id="validationCustom04" wire:model="stage" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach($stages as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('stage')<span class="error" style="margin-top: 0.25rem;font-size: 0.875em;color: #c03221;">{{ $message }}</span>@enderror

                        </div>

                        <div class="col-md-6">

                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-select" id="image" wire:model="image" required />

                            <div wire:loading wire:target="image">Uploading...</div>
                            @error('image')<span class="error" style="margin-top: 0.25rem;font-size: 0.875em;color: #c03221;">{{ $message }}</span>@enderror

                            <div class="pt-5">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>

                        </div>
                        <div class="col-md-6">
                            @if ($image)
                                  <img width="70%" src="{{ $image->temporaryUrl() }}" alt="subject image"/>
                            @endif
                        </div>
                </form>
                </div>
            </div>

        </div>
    </div>

</div>

{{--@push('scripts')--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#select2-dropdown').select2({--}}
{{--                dropdownParent: $("#2"),--}}
{{--            });--}}
{{--            $('#select2-dropdown').trigger('change')--}}


{{--            // $('#select2-dropdown').select2().on('change', function (e) {--}}
{{--            // //     var data = $('#select2-dropdown').select2("val");--}}
{{--            // // @this.set('teacher', data);--}}
{{--            // });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}


