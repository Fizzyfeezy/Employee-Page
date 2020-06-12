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
                <tbody class="page-table">
                  @foreach($employers as $employee)
                    <tr style = "background: #FFFFFF;">
                      <td scope="row"><input type="checkbox" name = "check" class="usersCheckbox" value=""></td>
                      <td><img src = "{{ asset('images/pic.png') }}" width="40"></td>
                      <td>{{ $employee->user->first_name }} {{ $employee->user->last_name }} <p>{{ $employee->user->occupation }}</p></td>
                      <td>{{ $employee->salary }}<p>{{ $employee->classification }}</p></td>
                      <td>{{ $employee->status }}<p>{{ $employee->status_time }}</p></td>
                      <td>
                          <div class="manage">
                              <a href="" data-toggle="modal" data-target="#editModalSubscription" onclick="editItem('{{ $employee->id }}','{{ $employee->user->first_name }}','{{ $employee->user->last_name }}','{{ $employee->user->email }}','{{ $employee->user->phone }}','{{ $employee->user->occupation }}','{{ $employee->salary }}','{{ $employee->status }}','{{ $employee->status_time }}','{{ $employee->classification }}')"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                              <a href="" data-toggle="modal" data-target="#deleteModalSubscription" onclick="deleteItem('{{ $employee->id }}')"><i class="fa fa-trash fa-2x vl" aria-hidden="true"  ></i></a>
                          </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                
            </table>
        </div>
    </div>

</div>