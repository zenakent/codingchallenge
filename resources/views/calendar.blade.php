<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="core/main.css">
  <link rel="stylesheet" href="daygrid/main.css">
  <script src="core/main.js"></script>
  <script src="interaction/main.js"></script>
  <script src="daygrid/main.js"></script>
  <title>Calendar</title>
</head>

<body class="bg-dark">

  <div class="container-fluid mt-3">

    <div class="card">
      <div id="bootAlert" style="position: absolute; right: 0; z-index: 999;"></div>
      <div class=" card-body">
        <h5 class="card-title">Calendar</h5>
        <hr>
        <div class="row">
          <div class="col-3">
            <form action="/api" method="post" id="postData">
              @csrf
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="title">Event</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="start">From</label>
                    <input type="date" class="form-control" id="startRecur" name="startRecur" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="end">To</label>
                    <input type="date" class="form-control" id="endRecur" name="endRecur" required>
                  </div>
                </div>
              </div>


              <div class="d-flex flex-row justify-content-between checkbox-group required">
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" name="daysOfWeek[]" id='0' value="0">
                  <label class="form-check-label" for="daysOfWeek">Sun</label>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" name="daysOfWeek[]" id='1' value="1">
                  <label class="form-check-label" for="daysOfWeek">Mon</label>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" name="daysOfWeek[]" id='2' value="2">
                  <label class="form-check-label" for="daysOfWeek">Tue</label>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" name="daysOfWeek[]" id='3' value="3">
                  <label class="form-check-label" for="daysOfWeek">Wed</label>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" name="daysOfWeek[]" id='4' value="4">
                  <label class="form-check-label" for="daysOfWeek">Thu</label>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" name="daysOfWeek[]" id='5' value="5">
                  <label class="form-check-label" for="daysOfWeek">Fri</label>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" name="daysOfWeek[]" id='6' value="6">
                  <label class="form-check-label" for="daysOfWeek">Sat</label>
                </div>
              </div>
              <button class="btn btn-primary" id="submitBtn">Submit</button>
            </form>
            @error('title') <p>{{$message}}</p> @enderror
          </div>
          <div class="col-9 border-left">
            <div id='calendar'></div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- <script src="{{ asset('js/custom.js')}}"></script> -->
  <script src="js/custom.js"></script>
  <script src="js/calendar.js"></script>
</body>

</html>