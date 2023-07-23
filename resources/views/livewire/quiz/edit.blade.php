<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit {{$name}}</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <p></p>
                    <form class="row g-3 needs-validation" wire:submit.prevent="submit">
                        <div class="col-md-6">

                            <label for="validationCustom01" class="form-label">Quiz Name</label>
                            <input type="text" class="form-control" id="validationCustom01" wire:model="name" required>
                            @error('name')<span class="error"
                                                style="margin-top: 0.25rem;font-size: 0.875em;color: #c03221;">{{ $message }}</span>@enderror
                        </div>

{{--                        <div class="col-md-6">--}}

{{--                            <label for="validationCustom01" class="form-label">Quiz Name</label>--}}
{{--                            <select class="form-control" onclick="addSubject(this)"  wire:model="subject" required>--}}
{{--                                <option value="" selected>Please select a subject</option>--}}
{{--                                @foreach($subjects as $item)--}}
{{--                                    <option value="{{$item->id}}">{{$item->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('subject')<span class="error"--}}
{{--                                                   style="margin-top: 0.25rem;font-size: 0.875em;color: #c03221;">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
                        @if($questions)

                            <div class="col-md-6">
                                <label class="form-label">Question Name</label>
                                <select onclick="handleClick(this)" class="form-control" >
                                    <option value="" selected>Please select a Question</option>
                                    @foreach($questions as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        @endif

                        <div class="col-md-12">
                            @if(count($selectedQuestion)>0)
                                <h5>Selected questions</h5>
                                @foreach($selectedQuestions as $question)
                                    <div id="{{$question->id}}" class="row pb-1">
                                        <div class="col-md-10">
                                            <div class="p-2 text-primary text-lg-start">{{$question->name}}</div>

                                        </div>
                                        <div   data-id="{{$question->id}}" class="col-md-2 btn btn-outline-danger deleteQuestion" onclick="removeMyQuestion({{$question->id}})" >Delete</div>


                                    </div>
                                    <hr style="border-bottom: 2px solid dodgerblue">
                                @endforeach
                            @endif
                        </div>

                        <div class="pt-5">
                            <button class="btn btn-primary" type="submit">Edit Quiz </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @push("scripts")
        <script>
            function handleClick(el) {

                if (el.value) {
                    console.log(el.value)
                    Livewire.emit('setSelectedQuestion', el.value);
                }

            }
            function addSubject(el) {
                if (el.value) {
                    console.log(el.value)
                    Livewire.emit('addSubject', el.value);
                }
            }

            function removeMyQuestion(id){
                Livewire.emit('removeMyQuestion', id);
                document.getElementById(id).remove();
            }
        </script>
    @endpush
</div>
