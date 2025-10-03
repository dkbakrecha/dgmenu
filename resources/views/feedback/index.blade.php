<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="{{ asset('css/common.css') }}" rel="stylesheet" />
    <style>
        body {
            background: #FEF7DA;
        }

        .feedback-form{
            background:#FEF3C7;
        }

        .user-section, .logo-section, .feedback-form, .footer {
            padding: 20px;
        }

        .mood-icons i {
            font-size: 50px;
            cursor: pointer;
            color: #888;
        }

        .mood-icons i:hover, .mood-icons input:checked + i {
            color: #ff9800;
        }

        .logo-section img {
            max-width: 150px;
        }
    </style>
</head>
<body>
    <div class="container-fulid">
        <!-- User Section -->
        <div class="user-section d-flex justify-content-between align-items-center bg-dark border mb-1">
            <div data-bs-toggle="modal" data-bs-target="#userModal">
                <span class="text-white">Hello <strong id="userName">Guest</strong></span>
            </div>
        </div>

        <!-- Logo Section -->
        <div class="logo-section text-center mb-1">
            <img src="{{ asset('images/' . $business->logo) }}" alt="{{ $business->title }} Logo" class="img-fluid" style="max-width: 150px;">
        </div>
        <h1 class="text-center text-dark mb-3">{{ $business->title }}</h1>

        <!-- Feedback Form Section -->
        <div class="bg-white feedback-form m-2 mb-3 p-3 rounded-4">
            <form id="feedbackForm" action="{{ route('feedback.submit') }}" method="POST" novalidate>
                @csrf
                <div class="mb-3 text-center">
                    <label for="mood" class="form-label">We Love Hear From You</label>
                    <div class="mood-icons d-flex justify-content-center gap-3">
                        <label>
                            <input type="radio" name="mood" value="unhappy" hidden required>
                            <i class="material-icons">mood_bad</i>
                        </label>
                        <label>
                            <input type="radio" name="mood" value="average" hidden required>
                            <i class="material-icons">sentiment_neutral</i>
                        </label>
                        <label>
                            <input type="radio" name="mood" value="happy" hidden required>
                            <i class="material-icons">mood</i>
                        </label>
                    </div>
                    <div class="invalid-feedback">Please select a mood.</div>
                </div>

                <div class="mb-3">
                    <textarea class="form-control" id="feedback" name="feedback" rows="3" placeholder="Enter your feedback" required></textarea>
                    <div class="invalid-feedback">Please enter your feedback.</div>
                </div>

                <input type="hidden" name="business_id" id="business_id" value="{{ $business->id }}">
                <input type="hidden" name="full_name" id="full_name" value="">
                <input type="hidden" name="phone_number" id="phone_number" value="">

                <button type="submit" class="btn btn-primary w-100 dg-brown">Submit</button>
            </form>
        </div>

        <!-- Footer Section -->
        <div class="footer text-center bg-dark fixed-bottom">
            <p class="mb-0 text-white">
                Made with <span class="material-symbols-outlined text-danger align-middle">favorite</span> {{ env('APP_NAME') }} {{ date('Y') }}
            </p>
       </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- User Info Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="userInfoForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">Enter Your Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="feedback_full_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="feedback_full_name" name="feedback_full_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="feedback_phone_number" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="feedback_phone_number" name="feedback_phone_number" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            function getCookie(name) {
                let cookies = document.cookie.split('; ');
                for (let cookie of cookies) {
                    let [cookieName, cookieValue] = cookie.split('=');
                    if (cookieName === name) {
                        return decodeURIComponent(cookieValue);
                    }
                }
                return null;
            }

            // Check for userInfo cookie after full page load
            let fullname = getCookie('fullname');
            let phonenumber = getCookie('phonenumber');

            if (fullname) {
                $('#userName').text(fullname);
                $('#full_name').val(fullname);
                $('#phone_number').val(phonenumber);
                $('#feedback_full_name').val(fullname);
                $('#feedback_phone_number').val(phonenumber);
            } else {
                // Open modal after a slight delay to improve UX
                setTimeout(() => {
                    $('#userModal').modal('show');
                }, 1000); // Delay modal opening by 1 second
            }

            // Handle user info form submission and save cookie
            $('#userInfoForm').on('submit', function (e) {
                e.preventDefault();
                const fullName = $('#feedback_full_name').val().trim();
                const phoneNumber = $('#feedback_phone_number').val().trim();

                if (fullName === '' || phoneNumber === '') {
                    alert("Please enter your full name and phone number.");
                    return;
                }

                document.cookie = `fullname=${fullName}; path=/`;
                document.cookie = `phonenumber=${phoneNumber}; path=/`;
                location.reload();
            });

            // Feedback form validation
            $('#feedbackForm').on('submit', function (e) {
                const selectedMood = $("input[name='mood']:checked").val();
                const feedbackText = $('#feedback').val().trim();
                
                if (!selectedMood) {
                    alert("Please select a mood before submitting.");
                    e.preventDefault();
                }

                if (!feedbackText) {
                    alert("Please enter your feedback before submitting.");
                    e.preventDefault();
                }
            });

            // Change icon color on selection
            $('.mood-icons input').on('change', function () {
                $('.mood-icons i').css('color', '#888'); // Reset all icons to default
                $(this).siblings('i').css('color', '#ff9800'); // Highlight selected one
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
