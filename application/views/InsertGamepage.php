<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert game</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" /> 
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --> 
    <link href="../public/css/InsertGamepage.css" rel="stylesheet" />
</head>
<div id="response"
    class="<?php if(!empty($data['type'])) { echo $data['type'] . " display-block"; } ?>">
    <?php if(!empty($data['message'])) { echo $data['message']; } ?>
</div>
<body style="padding-top: 2%;">
<?php if($_SESSION['username'] AND $_SESSION['userrole']==1): ?>
<display 
<div class="container">
  <div class="table-wrapper ">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6">
          <h2>Manage <b>Product</b></h2>
        </div>
        <div class="col-sm-6">
          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Game</span></a>
          <a href="#addCSVModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Insert with file CSV</span></a>
          <a href="/PHPmvc/index.php?url=adminController/Logout" class="btn btn-warning" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Log out</span></a>
        </div>
      </div>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>
            <span class="custom-checkbox">
                <input type="checkbox" id="selectAll">
                <label for="selectAll"></label>
            </span>
          </th>
          <th>Game name</th>
          <th>Price</th>
          <th>Producer</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php while ($row = mysqli_fetch_array($data['gamelist'])) {?>
        <tr>
        
          <td>
            <span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                <label for="checkbox1"></label>
            </span>
          </td>
          <!--Show data-->
          
          <td><strong><?php echo $row['Name'];?></strong></td>
          <td><?php echo $row['Price'];?></td>
          <td><?php echo $row['Producer']?></td>
          <td><img src="<?php echo $row['Image']?>" style="width:20rem;height: 15rem;"/></td>
          <td>
            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
            </td>
          
        </tr>
        <?php
            }?>
      </tbody>
    </table>
    <div class="clearfix">
      <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
      <ul class="pagination">
        <li class="page-item disabled"><a href="#">Previous</a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link">Next</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/PHPmvc/index.php?url=adminController/gameInsert" method="POST">
        <div class="modal-header">
          <h4 class="modal-title">Add Product</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Game name</label>
            <input name="gameName" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="gameDescription" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="number" name="gamePrice" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Producer</label>
            <input name="gameProducer" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input name="gameImage" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="gameQuantity" min="1">
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-success" name="submit" value="Add">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Edit Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Game name</label>
            <input name="gameName" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input name="gameName" type="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea name="gameDescription" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input name="gameName" type="text" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit"  name="submit" class="btn btn-info" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Delete Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete these Records?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-danger" value="Delete">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- logout Modal HTML -->
<div id="logoutModel" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/PHPmvc/index.php?url=adminController/Logout">
        <div class="modal-header">
          <h4 class="modal-title">Would you want to Logout ?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to Logout ?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-danger" value="logout">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Insert File Csv Modal HTML -->
<div id="addCSVModal" style="height:110%" class="modal fade">
<div class="modal-dialog" >
    <div class="modal-content"  style="height:110%">
        <form class="form-horizontal" action="/PHPmvc/index.php?url=adminController/gameInsertCSV" method="post"
            name="frmCSVImport" id="frmCSVImport"
            enctype="multipart/form-data">
            <div>
              <img src="https://viblo.asia/uploads/f515bc6d-0e08-4687-b070-85ba234c540c.png" class="img-fluid"
                alt="example placeholder">
            </div>
            <div class="input-row">
                <label class="col-md-4 control-label">Choose CSV
                    File</label> <input type="file" name="file"
                    id="file" accept=".csv">
                <button type="submit" id="submit" name="import"
                    class="btn-submit btn-success btn-lg" style="float: right; margin-left:2rem">Import</button>
            </div>
        </form>
    </div>
  </div>
  >
  <?php else: 
      header('Location: /PHPmvc/index.php?url=gameController');
    ?>

<?php endif; ?>
</div>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
/// Import csv
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
