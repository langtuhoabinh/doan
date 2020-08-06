@extends('layouts.HomePage')

@section('content')


    <div class="container">
        <div class="row">
            <h2>Information</h2>
            <br>
            <p></p>
            <form class="needs-validation" novalidate style="width: 100%;">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Full Name</label>
                        <input type="text" class="form-control" id="" value="" placeholder=" Full name..." required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Email</label>
                        <input type="email" class="form-control" id="" value="" placeholder=" Email..." required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Phone Number</label>
                        <input type="number" class="form-control" id="" required placeholder=" Phone number...">
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">City/Province</label>
                        <input type="text" class="form-control" id="" value="" placeholder=" City/Province..." required>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md mb-3">
                        <label for="validationCustom03">Address</label>
                        <input type="text" class="form-control" id="" placeholder=" Detail address..." required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>

            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();
            </script>
        </div>
    </div>
@endsection
