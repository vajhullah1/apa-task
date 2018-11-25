<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Edit Employee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/additional-methods.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  </head>
  <body>

  <div class="container">
    <h2>Edit Employee</h2>
    <?php if($this->session->flashdata('msg')): ?>
      <strong class="hide-it msg"><?php echo $this->session->flashdata('msg'); ?></strong>
    <?php endif; ?>
    <?php echo form_open('employee/edit/'. $employee['id'], 'id="myform"'); ?>
    <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Name</label>
          <?php echo form_input(array('class' => 'form-control', 'name' => 'name', 'value' => $employee['name'])); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Email</label>
          <?php echo form_input(array('class' => 'form-control', 'name' => 'email', 'value' => $employee['email'])); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Mobile</label>
          <?php echo form_input(array('class' => 'form-control', 'name' => 'phone', 'value' => $employee['phone'])); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Date of Birth</label>
          <?php echo form_input(array('class' => 'form-control', 'name' => 'dob', 'id' => 'datepicker', 'value' => date('d-m-Y', strtotime($employee['dob'])))); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary" id="SubmitBtn">Submit</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>

  </body>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".hide-it").hide(5000);

      $( "#datepicker" ).datepicker({
        maxDate: 0,
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
      });

      $('#myform').validate({
        rules : {
          name : {
            required : true,
          },
          email : {
            required : true,
            email : true
          },
          phone : {
            required : true,
            number : true,
            minlength : 10,
            maxlength : 10
          },
          dob : {
            required : true,
          },
        },
        messages : {

        },
        submitHandler : function(form) {
          $('#SubmitBtn').attr('disabled', 'disabled');
          form.submit();
        }
      });
    });
  </script>
  <style type="text/css">
    .error {
      color:#ff0000;
    }
    .msg {
      color:#196919;
    }
  </style>
</html>