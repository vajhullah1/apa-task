<!DOCTYPE html>
<html lang="en">
  <head>
    <title>View Employee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>

  <div class="container">
    <h2>View Employee</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Name:&nbsp;</label><?php echo $employee['name']; ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Email:&nbsp;</label><?php echo $employee['email']; ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Mobile:&nbsp;</label><?php echo $employee['phone']; ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Date of Birth:&nbsp;</label><?php echo date('d-m-Y', strtotime($employee['dob'])); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Created:&nbsp;</label><?php echo date('d-m-Y', strtotime($employee['created_at'])); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Last Updated:&nbsp;</label><?php echo date('d-m-Y', strtotime($employee['updated_at'])); ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>