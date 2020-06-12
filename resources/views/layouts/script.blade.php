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
            <table class="table table-hover table-responsive-md" id = "tabledata" style = "border-collapse: separate;border-spacing: 0 15px; background: #F6F5F8; ">
              <thead>
                  <tr>
                      <th scope="col"><input type="checkbox" id="checkallusers" onchange="checkAll(this)"></th>
                      <th></th>
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

              html += `<tr style = "background: #FFFFFF;">
                            <td scope="row"><input type="checkbox" name = "check" class="usersCheckbox" value=""></td>
                            <td><img src = "{{ asset('images/pic.png') }}" width="40"></td>
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

    $('.nav-link').click(function(e) {
        $('.nav-link').removeClass('active link-active');
        //$('.nav-item').removeClass('active');

        var $this = $(this);
        if (!$this.hasClass('active link-active')) {
            $this.addClass('active link-active');
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
            <table class="table table-hover table-responsive-md" id = "tabledata" style = "border-collapse: separate;border-spacing: 0 15px; background: #F6F5F8; ">
              <thead>
                  <tr>
                      <th scope="col"><input type="checkbox" id="checkallusers" onchange="checkAll(this)"></th>
                      <th></th>
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

              html += `<tr style = "background: #FFFFFF;">
                            <td scope="row"><input type="checkbox" name = "check" class="usersCheckbox" value=""></td>
                            <td><img src = "{{ asset('images/pic.png') }}" width="40"></td>
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