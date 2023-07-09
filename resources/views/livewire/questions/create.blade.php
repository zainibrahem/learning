<div>
    <div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Questions</h4>
                </div>

                <div class="header-title">
                    <button wire:click="addQuestion" class="btn btn-info">Add another question</button>
                </div>
            </div>
            <div class="card-body">
                <div class="card">

                    <div class="card-body">
                        <form id="form" class="row g-3 needs-validation">
                            @csrf
                            <div class="col-md-3">
                                <label for="validationCustom01" class="form-label">Subject name</label>
                                <select class="form-select" aria-label="Default select example"
                                        name="subject_id" required>
                                    <option value="" selected disabled>Select Subject</option>
                                    @foreach($subjects as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>

                            @for($i=0 ; $i<$counter; $i++)
                                <div id="{{$i}}">
                                    <div class="col-md-12 pt-5">

                                        <div class="row g-3 dynamic">
                                            <label for="vali" class="form-label">Question {{$i+1}} :</label>
                                            <div class="col-md-7">


                                                <label for="validationCustom01" class="form-label">Question Name</label>
                                                <input type="text" name="question[{{$i}}][name][]" class="form-control"
                                                       required>

                                            </div>
                                            <div class="col-md-3">
                                                <label for="validationCustom01" class="form-label">Question type</label>
                                                <select class="form-select" aria-label="Default select example"
                                                        name="question[{{$i}}][type][]" required>
                                                    <option value="multiSelect">Multiselect</option>
                                                    <option value="yesOrNo">Yes or No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 pt-5">
                                        <div class="row g-3 dynamic">
                                            <div class="col-md-3">
                                                <label for="validationCustom01" class="form-label">option 1</label>
                                                <input type="text" name="question[{{$i}}][option1][name][]" class="form-control"
                                                       required>

                                                <div class="mt-2">
                                                    <input class="form-check-input" type="radio" value="true"
                                                           name="question[{{$i}}][option1][checked][]">
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Correct Answer
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <label for="validationCustom01" class="form-label">option 2</label>
                                                <input type="text" name="question[{{$i}}][option2][name][]" class="form-control"
                                                       required>
                                                <div class="mt-2">
                                                    <input class="form-check-input" type="radio" value="true"
                                                           name="question[{{$i}}][option2][checked][]">
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Correct Answer
                                                    </label>
                                                </div>


                                            </div>

                                            <div class="col-md-3">
                                                <label for="validationCustom01" class="form-label">option 3</label>
                                                <input type="text" name="question[{{$i}}][option3][name][]" class="form-control"
                                                       required>
                                                <div class="mt-2">
                                                    <input class="form-check-input" type="radio" value="true"
                                                           name="question[{{$i}}][option3][checked][]">
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Correct Answer
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <label for="validationCustom01" class="form-label">option 4</label>
                                                <input type="text" name="question[{{$i}}][option4][name][]" class="form-control"
                                                       required>
                                                <div class="mt-2">
                                                    <input class="form-check-input" type="radio" value="true"
                                                           name="question[{{$i}}][option4][checked][]">
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Correct Answer
                                                    </label>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                 <div class="col-md-12 pt-5">
                                     <div id="{{$i}}"  data-id="{{$i}}" class="btn btn-outline-danger deleteQuestion" onclick="myFunction({{$i}})" >Delete question</div>

                                     <hr style="border-bottom: 2px solid dodgerblue">
                                 </div>


                                </div>
                            @endfor


                            <div class="pt-5">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push("scripts")
        <script>
            $("#form").on("submit", function (event) {
                event.preventDefault();
                var formData = $(this).serializeArray(); // Serialize the form data as an array

                var jsonData = JSON.stringify(formData); // Convert the array to JSON
                console.log(formData)
                console.log("************")
                console.log(jsonData)
                var csrf = $('meta[name="csrf"]').attr('content');
                var formData1=   $(this).serialize();
                var formDataObject = {

                };
                $.each(formData, function(index, field) {
                    var fieldName = field.name;
                    var fieldValue = field.value;

                    // Split the field name by brackets to handle nested fields
                    var fieldNames = fieldName.split('[');
                    var currentObj = formDataObject;

                    for (var i = 0; i < fieldNames.length; i++) {
                        var propName = fieldNames[i].replace(']', '');

                        // Create nested objects if they don't exist
                        if (!currentObj.hasOwnProperty(propName)) {
                            currentObj[propName] = {};
                        }

                        // Assign the value to the deepest nested object
                        if (i === fieldNames.length - 1) {
                            currentObj[propName] = fieldValue;
                        }

                        // Move to the next level of nested object
                        currentObj = currentObj[propName];
                    }
                });


                $.ajax({
                    url: '{{route("question.add")}}',
                    type: 'POST',
                    headers:{
                        'X-CSRF-TOKEN': csrf
                    },
                    contentType: 'application/json',
                    data:JSON.stringify(formDataObject),
                    success: function(response) {
                        // Handle the success response
                       window.location.href='/quiz'
                    },
                    error: function(xhr, status, error) {
                        // Handle the error response
                        console.log('Form submission failed');
                    }
                });
            });


            function myFunction(i) {
                // Action to perform when the div is clicked
                Livewire.emit('getNewCounter', 1);
                document.getElementById(i).remove();
            }
        </script>
    @endpush

</div>
