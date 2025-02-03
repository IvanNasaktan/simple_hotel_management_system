
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/employee-login.css') }}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div class="container" id="login-box">
            <div id="msg-container">
                <h2>Welcome, <br>Team Bembang!</h2>
                <p>Welcome to a brand-new day. Wishing you a productive and successful day ahead. Good luck!</p>
                <button type="button" class="btn btn-primary">Get Started!</button>
            </div>
            <div id="form-container">
                <form id="loginForm">
                    <h1>LOGIN</h1>
                    <p>Enter your e-mail and password</p>
                    <input type="email" name="email" class="form-control" id="formControlInput" placeholder="Enter E-mail" required>
                    <input type="password" name="password" class="form-control" id="formControlInput1" placeholder="Enter Your Password" required>
                    <button type="submit" class="btn btn-primary" id="loginButton">LOGIN</button>
                </form>
            </div>
            
            <div id="logo-container">
                <div id="logo">
                    <img src="{{ asset('images/hotel-logo.svg') }}" id="logo-hotel">
                    <h1>Bembang</h1>
                    <h1>Hotel</h1>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/employee-login.js') }}"></script>
        <script>
            $(document).ready(function () {
                // Listen for button click to trigger form submission
                $("#loginButton").on("click", function (e) {
                    e.preventDefault(); // Prevent the form's default behavior
                    submitLoginForm(); // Call the function to handle the form submission
                });
            });

            function submitLoginForm() {
                var form = $("#loginForm");

                $.ajax({
                    url: "{{ route('employee.login.check') }}", // Laravel route
                    type: "POST",
                    data: form.serialize(), // Serialize form data
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token to the request header
                    },
                    success: function (response) {
                        if (response.success) {
                            // Redirect or perform any action on success
                            window.location.href = response.redirect_url; // Or handle your success accordingly
                        }
                    },
                    error: function (xhr) {
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            let errorMessage = Object.values(errors).join('<br>');
                            $("#error-message").html(errorMessage).show();
                        } else {
                            $("#error-message").text("Invalid credentials").show();
                        }
                    }
                });
            }
        </script>

    </body>
</html>
