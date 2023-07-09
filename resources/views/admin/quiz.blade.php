@extends('admin.layouts.layouts')
@section('content')


    <div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Create new Quiz</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="card">

                    <div class="card-body">
                        <form class="row g-3 needs-validation">
                            <div class="col-md-3">
                                <label for="validationCustom01" class="form-label">Quiz Name</label>
                                <input type="text" name="quizName" class="form-control" id="validationCustom01" required>
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom01" class="form-label">Subject Name</label>
                                <input type="text" name="subject" class="form-control" id="validationCustom01" required>
                            </div>
                            <hr>

                            <div class="col-md-12">
                                <div class="row g-3 dynamic">
                                    <div class="col-md-3 g5">
                                        <label for="validationCustom01" class="form-label">Subject Name</label>
                                        <input type="text" name="question-1" class="form-control" id="validationCustom01" required>
                                        <select  class="form-select" aria-label="Default select example" name="question-1"required>
                                            <option value="multiSelect">Multiselect</option>
                                            <option value="yesOrNo">Yes or No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationCustom01" class="form-label">Subject Name</label>
                                        <input type="text" name="subject" class="form-control" id="validationCustom01" required>
                                    </div> <div class="col-md-3">
                                        <label for="validationCustom01" class="form-label">Subject Name</label>
                                        <input type="text" name="subject" class="form-control" id="validationCustom01" required>
                                    </div>
                                </div>
                            </div>



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
            console.log("asdasd")
        </script>
    @endpush
@endsection
