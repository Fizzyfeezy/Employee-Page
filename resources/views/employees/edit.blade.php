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