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

   function deleteItem(id)
   {
       var id = id;

       console.log(id);

       var url = '{{ route("employee.delete", ":id") }}';
       url = url.replace(':id', id);

      //console.log(url);

      $("#deleteItems").click(function(){
        $(".deleteForm").attr('action', url);
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