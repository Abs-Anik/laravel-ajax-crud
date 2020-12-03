<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Laravel || Ajax</title>
  </head>
  <body>
    
  <div style="padding: 30px"></div>
  <div class="container">
    <h2 style="color: red">
      <marquee behavior="" direction="">Laravel 8 Ajax Crud Application</marquee>
    </h2>
    <div class="row">
      <div class="col-sm-8">
        <div class="card">
          <div class="card-header">
            All Teacher
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
                <th scope="col">Institute</th>
                <th scope="col">Action</th>
                <th></th>
                
              </thead>
              <tbody>
                {{--  <tr>
                  <td>1</td>
                  <td>John Doe</td>
                  <td>Udemy Teacher</td>
                  <td>Udemy Institute</td>
                  <td>
                    <button class="btn btn-sm btn-primary mr-2">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                  </td>
                </tr>  --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
       <div class="col-sm-4">
        <div class="card">
          <div class="card-header">
            <span id="addT"> Add New Teacher </span>
            <span id="updateT"> Update Teacher </span>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>

            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" placeholder="Enter Title">
            </div>

            <div class="form-group">
              <label for="institute">Institute</label>
              <input type="text" class="form-control" id="institute" placeholder="Enter Institute">
            </div>

            <button type="submit" id="addButton" onclick="addData()" class="btn btn-primary">Add</button>
            <button type="submit" id="updateButton" class="btn btn-primary">Update</button>

          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      $('#addT').show();
      $('#addButton').show();
      $('#updateT').hide();
      $('#updateButton').hide();
       $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
      
      function allData(){
        $.ajax({
          type: "GET",
          dataType: 'json',
          url: "{{url('/list')}}",
          success:function(response){
            var data = " ";
            $.each(response, function(key,value){
              data = data + "<tr>"
              data = data + "<td>"+value.id+"</td>"
              data = data + "<td>"+value.name+"</td>"
              data = data + "<td>"+value.title+"</td>"
              data = data + "<td>"+value.institute+"</td>"
              data = data + "<td>"
              data = data + "<button class='btn btn-sm btn-primary mr-2'>Edit</button>"
              data = data + "<button class='btn btn-sm btn-danger'>Delete</button>"
              data = data + "</td>"
              data = data + "</tr>"
            });
            $('tbody').html(data);
          }
        });
      }

      allData();

      function clearData(){
       $('#name').val(' ');
       $('#title').val(' ');
       $('#institute').val(' ');
      }

      function addData(){
        var name = $('#name').val();
        var title = $('#title').val();
        var institute = $('#institute').val();

        $.ajax({
          type: "POST",
          dataType: 'json',
          url: "{{ url('/list/store') }}",
          data: {name: name, title: title, institute: institute},
          success:function(response){
            allData();
            clearData();
            console.log('Data Successfully Added');
          }
        });
      }

    </script>
  </body>
</html>