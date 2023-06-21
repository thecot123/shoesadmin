<!DOCTYPE html>
<html>
<head>
  <title>Survey Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/fe/fonts/fontawesome-free-6.4.0-web/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/fe/css/home.c') }}">
  <style>
    .survey-page {
      text-align: center;
    }

    .choices {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 20px;
      margin-bottom: 20px;
    }

    .choices img {
      width: 200px;
      height: auto;
      cursor: pointer;
    }

    textarea {
      width: 100%;
      height: 150px;
    }

    .dialog-box {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .dialog-content {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
    }

    .close-button {
      margin-top: 10px;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
   function selectChoice(choice) {
  var images = document.querySelectorAll('.choices img');
  images.forEach(function(image) {
    image.classList.remove('selected');
    image.style.border = 'none'; // Remove border from all images
  });

  var selectedChoice = document.getElementById('choice-' + choice);
  selectedChoice.classList.add('selected');
  selectedChoice.style.border = '2px solid blue'; // Add border to the selected image

  document.getElementById('selected-choice').value = choice;
}


    function submitForm() {
      var selectedChoice = document.querySelector('.selected');
      if (selectedChoice) {
        document.getElementById('survey-form').submit();
      } else {
        alert('Please select a choice');
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      var dialogBox = document.getElementById('dialog-box');
      dialogBox.classList.remove('hide');

      document.querySelector('.close-button').addEventListener('click', function() {
        dialogBox.style.display = 'none';
      });

      document.getElementById('survey-form').addEventListener('submit', function(event) {
        event.preventDefault();
        submitForm();
      });
    });
  </script>
</head>
<body>
  <div class="survey-page">
    <h1>Survey Page</h1>
    <div class="choices">
      @foreach($survey as $surveys)
      @if($surveys->photo != null)
        <img id="choice-{{ $surveys->id }}" src="{{ asset('images/' . $surveys->photo) }}" alt="Image {{ $surveys->id }}" onclick="selectChoice('{{ $surveys->id }}')">
        @endif
      @endforeach
    </div>

    <form id="survey-form" action="{{ route('survey.submit') }}" method="POST">
    @csrf <!-- Include the CSRF token -->
      <input type="hidden" id="selected-choice" name="user_choice">
      <textarea name="user_provide" placeholder="Provide your feedback"></textarea>
      <button type="button" onclick="submitForm()">Submit</button>
    </form>
  </div>
  <div id="dialog-box" class="dialog-box">
    <div class="dialog-content">
      <h2>Dialog Box Content</h2>
      <p>This is the dialog box content.</p>
      <button class="close-button">Close</button>
    </div>
  </div>
</body>
</html>
