<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jquery User Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

</head>

<body>


    <div class="container my-3">
        <h2>Jquery Ajax Data Table Example for BIT Sem3</h2>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addusermodel">
            Add User
        </button>
        <div id="displayDataTable" class="my-3"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addusermodel" tabindex="-1" aria-labelledby="addusermodelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addusermodelLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" id="mobile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="addUser()" class="btn btn-primary">Save </button>
                </div>
            </div>
        </div>
    </div>

     <!-- Update User Modal -->
     <div class="modal fade" id="updateModel" tabindex="-1" aria-labelledby="updateModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModellLabel">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="updatefname">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="updatelname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="updateemail">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" id="updatemobile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="updateDetails()" class="btn btn-primary">Update </button>
                    <input type="text" id="hiddendata">
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        displayData();
    });

    function displayData() {
        var displayData = "true";
        $.ajax({
            url: 'display.php',
            type: 'POST',
            data: {
                displaysend: displayData
            },
            success: function(data, status) {
                $('#displayDataTable').html(data);
            }
        });
    }

    function addUser() {
        var fname = $('#firstName').val();
        var lname = $('#lastName').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();

        $.ajax({
            url: 'insert.php',
            type: 'POST',
            data: {
                fnameSend: fname,
                lnameSend: lname,
                emailSend: email,
                mobileSend: mobile
            },
            success: function(data, status) {
                $('#addusermodel').modal('toggle');
                displayData();
            }
        });
    }
    // Delete User
    function deleteUser(deleteid){
      $.ajax({
            url: 'delete.php',
            type: 'POST',
            data: {
                deleteSend:deleteid
            },
            success:function(data,status){
                displayData();
            }
      });
    }
    function getDetails(updateid){
        $('#hiddendata').val(updateid);

        $.post("update.php",{updateid:updateid},function(data,status){
        

            var userid=JSON.parse(data);
            
            $('#updatefname').val(userid.FirstName);
            $('#updatelname').val(userid.LastName);
            $('#updateemail').val(userid.Email);
            $('#updatemobile').val(userid.Mobile);


        });

        $('#updateModel').modal('show');

    }

    function updateDetails(){
        var updatefname = $('#updatefname').val();
        var updatelname = $('#updatelname').val();
        var updateemail = $('#updateemail').val();
        var updatemobile = $('#updatemobile').val();    
        var hiddendata  = $('#hiddendata').val();


        $.post("update.php",{
            updatefname:updatefname,
            updatelname:updatelname,
            updateemail:updateemail,
            updatemobile:updatemobile,
            hiddendata:hiddendata

        } ,function(data,atatus){
            $('#updateModel').modal('toggle');
            displayData();
        });
    }
    </script>

</body>

</html>