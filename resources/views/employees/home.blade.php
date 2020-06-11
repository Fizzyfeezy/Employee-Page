@extends('layouts.app')

@section('title', 'Home')

@section('css')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

<div class="row" style="margin-top: 80px;">
    <div class="col-md-12 text-center">
        @include('layouts.message')
    </div>
</div>

<div class="container internia">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand bootstrap-img" href="#">
                            <img src="{{ asset('images/employees.png') }}" width="120" alt="" loading="lazy">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse nav-frame" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link" href = "#" >Calendar</a></li>
                                <li class="nav-item"><a class="nav-link" href = "#" >Statistics</a></li>
                                <li class="nav-item active"><a class="nav-link" href = "{{ route('employee.home') }}" >Employees</a></li>
                                <li class="nav-item"><a class="nav-link" href = "contact.html" >Client</a></li>
                                <li class="nav-item"><a class="nav-link" href = "blog.html" >Equipment</a></li>
                            </ul>
                            <div class="form-inline my-2 my-lg-0 font_icons">
                              <i class="fa fa-bell fa-2x" aria-hidden="true"  ></i>
                              <i class="fa fa-envelope fa-2x" aria-hidden="true"  ></i>
                              <a href="#">
                                  <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="avatar">
                              </a>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="card-body" id = "topnav">
                    <div class="row emp-name">
                        <div class="col-md-4">
                            <h1>employee</h1>
                        </div>
                        <div class="col-md-2 offset-6 text-center">
                            <button class = "btn btn-success btn-sm" type = "submit" style = "border-radius: 24px!important;" data-toggle="modal" data-target="#addModalSubscription">add employee</button>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card side-emp">
                                <div class="card-body emp-list emp-active" value = "all">
                                    <a href="#">
                                        <img src="{{ asset('images/employ.png') }}" alt="employee" class="avatar">
                                        <p class="card-title">All Employees</p>
                                    </a>
                                </div>
                                <h3>PROJECT</h3>
                                <div class="card-body emp-list" value = "none">
                                    <a href="#">
                                        <img src="{{ asset('images/adobe.png') }}" alt="employee" class="avatar">
                                        <p class="card-title">Arena Sport</p>
                                    </a>
                                </div>
                                <div class="card-body emp-list" value = "none">
                                    <a href="#">
                                        <img src="{{ asset('images/dsv.png') }}" alt="employee" class="avatar">
                                        <p class="card-title">DSV</p>
                                    </a>
                                </div>
                                <div class="card-body emp-list" value = "none">
                                    <a href="#">
                                        <img src="{{ asset('images/sm.png') }}" alt="employee" class="avatar">
                                        <p class="card-title">Seafood Mall</p>
                                    </a>
                                </div>
                                <div class="card-body emp-list" value = "none">
                                    <a href="#">
                                        <img src="{{ asset('images/fs.png') }}" alt="employee" class="avatar">
                                        <p class="card-title">FireStar</p>
                                    </a>
                                </div>
                                <div class="card-body emp-list" value = "none">
                                    <a href="#">
                                        <img src="{{ asset('images/zeta.png') }}" alt="employee" class="avatar">
                                        <p class="card-title">Zeta Bank</p>
                                    </a>
                                </div>
                                <h3>STATUS</h3>
                                <div class="card-body emp-list" value = "none">
                                    <a href="#">
                                        <img src="{{ asset('images/ft.png') }}" alt="employee" class="avatar">
                                        <p class="card-title">Full time</p>
                                    </a>
                                </div>
                                <div class="card-body emp-list" value = "none">
                                    <a href="#">
                                        <img src="{{ asset('images/pt.png') }}" alt="employee" class="avatar">
                                        <p class="card-title">Part time</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <table class="table table-striped table-hover" id = "tabledata">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col"><input type="checkbox" id="checkallusers" onchange="checkAll(this)"></th>
                                        <th>EMPLOYEE</th>
                                        <th>SALARY</th>
                                        <th>STATUS</th>
                                        <th>MANAGE</th>
                                    </tr>
                                </thead>
                                <tbody class="page-table">
                                  @foreach($employers as $employee)
                                    <tr>
                                      <td scope="row"><input type="checkbox" name = "check" class="usersCheckbox" value=""></td>
                                      <td>{{ $employee->user->first_name }} {{ $employee->user->last_name }} <p>{{ $employee->user->occupation }}</p></td>
                                      <td>{{ $employee->salary }}<p>{{ $employee->classification }}</p></td>
                                      <td>{{ $employee->status }}<p>{{ $employee->status_time }}</p></td>
                                      <td>
                                          <div class="manage">
                                              <a href="" data-toggle="modal" data-target="#editModalSubscription" onclick="editItem('{{ $employee->id }}','{{ $employee->user->first_name }}','{{ $employee->user->last_name }}','{{ $employee->user->email }}','{{ $employee->user->phone }}','{{ $employee->user->occupation }}','{{ $employee->salary }}','{{ $employee->status }}','{{ $employee->status_time }}','{{ $employee->classification }}')"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                              <a href="{{ route('employee.delete', $employee->id) }}"><i class="fa fa-trash fa-2x vl" aria-hidden="true"  ></i></a>
                                          </div>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Add Employee Modal --}}

<div class="modal fade" id="addModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-warning" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header text-center">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Add Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Add modal Employye Body-->
      <div class="modal-body">
        <form action="{{ route('employee.store') }}" method="post" accept-charset="utf-8">
          {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-6">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="first" name = "first_name" class="form-control validate" placeholder="firstname" required>
                </div>
                <div class="col-lg-6">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="last" name ="last_name" class="form-control validate" placeholder="lastname" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-6">
                    <i class="fa fa-phone prefix grey-text"></i>
                    <input type="number" id="phone" name ="phone" class="form-control validate" placeholder="08XXXXXXXXX" required>
                </div>
                <div class="col-lg-6">
                    <i class="fa fa-briefcase prefix grey-text"></i>
                    <input type="text" id="occupation" name ="occupation" class="form-control validate" placeholder="occupation" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-12 md-form">
                  <i class="fa fa-envelope prefix grey-text"></i>
                  <input type="email" id="email" class="form-control validate" name = "email" placeholder="email" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-6 md-form">
                  <i class="fa fa-question-circle prefix grey-text"></i>
                  <select  id="status" class="form-control validate" name = "status" required>
                      <option selected="true" disabled="disabled">Select status</option>
                      @foreach($status as $sta)
                        <option value="{{ $sta }}">{{ $sta }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-lg-6">
                    <i class="fa fa-calendar prefix grey-text"></i>
                    <input type="text" id="status_time" name ="status_time" class="form-control validate" placeholder="status time" reuired>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-6 md-form">
                  <i class="fa fa-window-close prefix grey-text"></i>
                  <select  id="classification" class="form-control validate" name = "classification" required>
                      <option selected="true" disabled="disabled">Select class</option>
                      @foreach($classification as $cla)
                        <option value="{{ $cla }}">{{ $cla }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-lg-6">
                    <i class="fa fa-money prefix grey-text"></i>
                    <input type="number" id="salary" name ="salary" class="form-control validate" placeholder="salary" required>
                </div>
              </div>
              <br>

            <!--Footer-->
              <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-outline-success waves-effect" onchange="addEmployee(this)">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
              </div>
        </form>  
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>



{{-- Edit Employee Modal --}}

<div class="modal fade" id="editModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-warning" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header text-center">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Edit Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Add modal Employye Body-->
      <div class="modal-body">
        <form action="" method="put" accept-charset="utf-8" class = "formSubmit">
          {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-6">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="first" name = "first_name" class="form-control validate first" placeholder="firstname" value="" required>
                </div>
                <div class="col-lg-6">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="last" name ="last_name" class="form-control validate last" placeholder="lastname" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-6">
                    <i class="fa fa-phone prefix grey-text"></i>
                    <input type="number" id="phone" name ="phone" class="form-control validate phone" placeholder="08XXXXXXXXX" required>
                </div>
                <div class="col-lg-6">
                    <i class="fa fa-briefcase prefix grey-text"></i>
                    <input type="text" id="occupation" name ="occupation" class="form-control validate occupation" placeholder="occupation" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-12 md-form">
                  <i class="fa fa-envelope prefix grey-text"></i>
                  <input type="email" id="email" class="form-control validate email" name = "email" placeholder="email" required disabled>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-6 md-form">
                  <i class="fa fa-question-circle prefix grey-text"></i>
                  <select  id="status" class="form-control validate status" name = "status" required>
                      <option selected="true" disabled="disabled">Select status</option>
                      @foreach($status as $sta)
                        <option value="{{ $sta }}">{{ $sta }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-lg-6">
                    <i class="fa fa-calendar prefix grey-text"></i>
                    <input type="text" id="status_time" name ="status_time" class="form-control validate status_time" placeholder="status time" reuired>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-6 md-form">
                  <i class="fa fa-window-close prefix grey-text"></i>
                  <select  id="classification" class="form-control validate classification" name = "classification" required>
                      <option selected="true" disabled="disabled">Select class</option>
                      @foreach($classification as $cla)
                        <option value="{{ $cla }}">{{ $cla }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-lg-6">
                    <i class="fa fa-money prefix grey-text"></i>
                    <input type="number" id="salary" name ="salary" class="form-control validate salary" placeholder="salary" required>
                </div>
              </div>
              <br>

            <!--Footer-->
              <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-outline-success waves-effect" id= "sendItem">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
              </div>
        </form>  
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>

<footer>
    <div class="footer-content container d-flex justify-content-between">
        <div class="footer-icons">
            <a href="https://seamlesshr.com/"><img src="{{ asset('images/facebook-logo.png') }}" alt=""></a>
            <a href="https://seamlesshr.com/"><img src="{{ asset('images/instagram-logo.png') }}" alt=""></a>
            <a href="https://seamlesshr.com/"><img src="{{ asset('images/twitter-logo.png') }}" alt=""></a>
        </div>
        <div class="footer-text">
           <p>&copy; Seamlesshr. All rights reserved.</p> 
        </div>
    </div>
    <!-- For Mobile -->
    <div class="mobile-footer-content container text-center">
        <div class="footer-icons">
            <a href="https://seamlesshr.com/"><img src="{{ asset('images/facebook-logo.png') }}" alt=""></a>
            <a href="https://seamlesshr.com/"><img src="{{ asset('images/instagram-logo.png') }}" alt=""></a>
            <a href="https://seamlesshr.com/"><img src="{{ asset('images/twitter-logo.png') }}" alt=""></a>
        </div>
        <div class="footer-text">
           <p>&copy; Seamlesshr. All rights reserved.</p> 
        </div>
    </div>
</footer>


@endsection


@section('script')

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer></script>


<script type="text/javascript">
  $(document).ready(function () {
    $('.emp-list').click(function(e) {
        $('.emp-list').removeClass('emp-active');

        var $this = $(this);
        if (!$this.hasClass('emp-active')) {
            $this.addClass('emp-active');
        }
        console.log($this.text())
        sideNav($this.text());
        e.preventDefault();
    });

    function sideNav(text){
      $.ajaxSetup({

          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        url : "{{ url('employee/nav') }}",
        type : 'POST',
        data : {datas : text, _token : "{{ csrf_token() }}" },
        dataType : 'json',
        success : function(response){
          console.log(response);
          if (response === "Arena Sport" || response === "DSV" || response === "Seafood Mall" || response === "FireStar" || response === "Zeta Bank" || response === "Full time" || response === "Part time") {
            $('#tabledata').html("");
            let html = `<h1>${response}</h1>`;

            $('#tabledata').append(html);
          }else{

            $('#tabledata').html("");

            let html = `
            <table class="table table-striped table-hover" id = "tabledata">
              <thead class="thead-dark">
                  <tr>
                      <th scope="col"><input type="checkbox" id="checkallusers" onchange="checkAll(this)"></th>
                      <th>EMPLOYEE</th>
                      <th>SALARY</th>
                      <th>STATUS</th>
                      <th>MANAGE</th>
                  </tr>
              </thead>
              <tbody class="page-table">`;

            $.each(response.data, function(index , value){

              console.log(value.user.first_name);

              let delete_url= "{{ route('employee.delete', 'format_id_125') }}".replace('format_id_125',value.id);  

              html += `<tr>
                            <td scope="row"><input type="checkbox" name = "check" class="usersCheckbox" value=""></td>
                            <td>${value.user.first_name} ${value.user.last_name} <p>${value.user.occupation}</p></td>
                            <td>${value.salary }<p>${value.classification }</p></td>
                            <td>${value.status }<p>${value.status_time }</p></td>
                            <td>
                                <div class="manage">
                                    <a href="#"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                    <a href="${delete_url}"><i class="fa fa-trash fa-2x vl" aria-hidden="true"  ></i></a>
                                </div>
                            </td>
                          </tr>`;
            });

            html += `</tbody>
                      </table>`;

            $('#tabledata').append(html);
          }
          
        },
        error: function (request, status, error) {
            console.log(JSON.stringify(error));
            hideLoading();
        }
      });
    }

    $('.nav-item').click(function(e) {
        $('.nav-item').removeClass('active');

        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
        sideNavTop($this.text());
        e.preventDefault();
    });

    function sideNavTop(text){
      $.ajaxSetup({

          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        url : "{{ url('employee/nav/top') }}",
        type : 'POST',
        data : {datas : text, _token : "{{ csrf_token() }}" },
        dataType : 'json',
        success : function(response){
          console.log(response);
          if (response === "Calendar" || response === "Client" || response === "Statistics" || response === "Equipment") {
            $('#topnav').html("");
            let html = `<h1>${response}</h1>`;

            $('#topnav').append(html);
          }else{

            $('#topnav').html("");

            let html = `
            <div class="row emp-name">
                <div class="col-md-4">
                    <h1>employee</h1>
                </div>
                <div class="col-md-2 offset-6 text-center">
                    <button class = "btn btn-success btn-sm" type = "submit" style = "border-radius: 24px!important;" data-toggle="modal" data-target="#orangeModalSubscription">add employee</button>
                </div> 
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card side-emp">
                        <div class="card-body emp-list emp-active" value = "all">
                            <a href="#">
                                <img src="{{ asset('images/employ.png') }}" alt="employee" class="avatar">
                                <p class="card-title">All Employees</p>
                            </a>
                        </div>
                        <h3>PROJECT</h3>
                        <div class="card-body emp-list" value = "none">
                            <a href="#">
                                <img src="{{ asset('images/adobe.png') }}" alt="employee" class="avatar">
                                <p class="card-title">Arena Sport</p>
                            </a>
                        </div>
                        <div class="card-body emp-list" value = "none">
                            <a href="#">
                                <img src="{{ asset('images/dsv.png') }}" alt="employee" class="avatar">
                                <p class="card-title">DSV</p>
                            </a>
                        </div>
                        <div class="card-body emp-list" value = "none">
                            <a href="#">
                                <img src="{{ asset('images/sm.png') }}" alt="employee" class="avatar">
                                <p class="card-title">Seafood Mall</p>
                            </a>
                        </div>
                        <div class="card-body emp-list" value = "none">
                            <a href="#">
                                <img src="{{ asset('images/fs.png') }}" alt="employee" class="avatar">
                                <p class="card-title">FireStar</p>
                            </a>
                        </div>
                        <div class="card-body emp-list" value = "none">
                            <a href="#">
                                <img src="{{ asset('images/zeta.png') }}" alt="employee" class="avatar">
                                <p class="card-title">Zeta Bank</p>
                            </a>
                        </div>
                        <h3>STATUS</h3>
                        <div class="card-body emp-list" value = "none">
                            <a href="#">
                                <img src="{{ asset('images/ft.png') }}" alt="employee" class="avatar">
                                <p class="card-title">Full time</p>
                            </a>
                        </div>
                        <div class="card-body emp-list" value = "none">
                            <a href="#">
                                <img src="{{ asset('images/pt.png') }}" alt="employee" class="avatar">
                                <p class="card-title">Part time</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
            <table class="table table-striped table-hover" id = "tabledata">
              <thead class="thead-dark">
                  <tr>
                      <th scope="col"><input type="checkbox" id="checkallusers" onchange="checkAll(this)"></th>
                      <th>EMPLOYEE</th>
                      <th>SALARY</th>
                      <th>STATUS</th>
                      <th>MANAGE</th>
                  </tr>
              </thead>
              <tbody class="page-table">`;

            $.each(response.data, function(index , value){

              console.log(value.user.first_name);

              let delete_url= "{{ route('employee.delete', 'format_id_125') }}".replace('format_id_125',value.id);  

              html += `<tr>
                            <td scope="row"><input type="checkbox" name = "check" class="usersCheckbox" value=""></td>
                            <td>${value.user.first_name} ${value.user.last_name} <p>${value.user.occupation}</p></td>
                            <td>${value.salary }<p>${value.classification }</p></td>
                            <td>${value.status }<p>${value.status_time }</p></td>
                            <td>
                                <div class="manage">
                                    <a href="#"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                    <a href="${delete_url}"><i class="fa fa-trash fa-2x vl" aria-hidden="true"  ></i></a>
                                </div>
                            </td>
                          </tr>`;
            });

            html += `</tbody>
                      </table>
                      </div>
                    </div>`;

            $('#topnav').append(html);

            $('#tabledata').dataTable({"sPaginationType": "full_numbers"});
          }
          
        },
        error: function (request, status, error) {
            console.log(JSON.stringify(error));
            hideLoading();
        }
      });
    }

    $('#tabledata').dataTable({"sPaginationType": "full_numbers"});


  });

</script>

<script>

  function editItem(id,first_name,last_name,email,phone,occupation,salary,status,status_time,clasification)
   {
       var id = id;
       var first_name = first_name;
       var last_name = last_name;
       var email = email;
       var phone = phone;
       var occupation = occupation;
       var salary = salary;
       var status = status;
       var status_time = status_time;
       var classification = classification;

       console.log(id,first_name,last_name,email,phone,occupation,salary,status,status_time,clasification);

       var url = '{{ route("employee.update", ":id") }}';
       url = url.replace(':id', id);

        console.log(url);

        $(".first").attr('value', first_name);
        $(".last").attr('value', last_name);
        $(".phone").attr('value', phone);
        $(".email").attr('value', email);
        $(".occupation").attr('value', occupation);
        $(".salary").attr('value', salary);
        $(".status_time").attr('value', status_time);
        $(".status").attr('value', status);
        $(".classification").attr('value', classification);
        // $(".classification").change(function(){
        //   $(this).children("option:selected").val();
        //   classification.value = $(this).children("option:selected").text();
        // });

      $("#sendItem").click(function(){
        $(".formSubmit").attr('action', url);
      });
   }

   // Set check or unchecked all checkboxes
 function checkAll(e) {
   var checkboxes = document.getElementsByName('check');

   var keys = [];
 
   if (e.checked) {
     for (var i = 0; i < checkboxes.length; i++) { 
       checkboxes[i].checked = true;
       $('.selected-users').html("All users selected");
       var checkid = checkboxes[i].value;
       keys.push(checkid);
     }
     var user_ids = keys.map(Number);
     console.log(user_ids);
   } else {
     for (var i = 0; i < checkboxes.length; i++) {
       checkboxes[i].checked = false;
       $('.selected-users').html("No users selected");
     }
   }
 }

  // Delete Checked rows
 function deleteChecked(){
   var checkboxes = document.getElementsByName('check');

   var keys = [];
   var user_ids = [];
 
   for (var i = 0; i < checkboxes.length; i++) {
     
     if(checkboxes[i].checked){
      var checkid = checkboxes[i].value;
      keys.push(checkid);
      user_ids = keys.map(Number);
       
     } 
   }
   console.log(user_ids);
   var url = '';
   url = url.replace(':id', user_ids);
   console.log(url);
   window.location.href = url;
 }

   // Block Checked rows
 function blockChecked(){
   var checkboxes = document.getElementsByName('check');

   var keys = [];
   var user_ids = [];
 
   for (var i = 0; i < checkboxes.length; i++) {
     
     if(checkboxes[i].checked){
       var checkid = checkboxes[i].value;
       keys.push(checkid);
       user_ids = keys.map(Number);   
     } 
   }
   console.log(user_ids);
   var url = '';
   url = url.replace(':id', user_ids);
   console.log(url);
   window.location.href = url; 
 }


 function addEmployee(){
      $.ajaxSetup({

          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        url : "{{ url('employee/add') }}",
        type : 'GET',
        dataType : 'json',
        success : function(response){

          console.log(response);
        },
        error: function (request, status, error) {
            console.log(JSON.stringify(error));
            hideLoading();
        }
      });
    }

</script>

@endsection

