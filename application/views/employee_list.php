<!DOCTYPE html>
<html>
	<head>
		<title>APA Task</title>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/fancybox/dist/jquery.fancybox.min.css" />
		<script src="<?php echo base_url();?>assets/fancybox/dist/jquery.fancybox.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h2 class="text-left">Employee List &nbsp;
					<a class="btn btn-primary" href="javascript:void(0);" data-fancybox-type="iframe" data-fancybox="" data-src="<?php echo base_url();?>employee/add" style="float: right;">ADD</a>
				</h2>
			</div>
		    <div class="row">
		        <div class="col-md-12">
					<table <?php if(!empty($employees)) { ?> id="datatable" <?php } ?> class="table table-striped table-bordered" cellspacing="0" width="100%">
	    				<thead>
							<tr>
								<th>S. No</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>DOB</th>
								<th>Created</th>
								<th>Last Updated</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($employees)) { ?>
								<?php $emp_cnt = 1; ?>
								<?php foreach ($employees as $emp) { ?>
									<tr>
										<td><?php echo $emp_cnt++; ?></td>
										<td><?php echo $emp -> name; ?></td>
										<td><?php echo $emp -> email; ?></td>
										<td><?php echo $emp -> phone; ?></td>
										<td><?php if(!empty($emp -> dob)) { echo date("d-m-Y", strtotime($emp -> dob)); } ?></td>
										<td><?php if(!empty($emp -> created_at)) { echo date("d-m-Y H:i", strtotime($emp -> created_at)); } ?></td>
										<td><?php if(!empty($emp -> updated_at)) { echo date("d-m-Y H:i", strtotime($emp -> updated_at)); } ?></td>
			                            <td>
			                            	<p data-placement="top" data-toggle="tooltip" title="View" style="display: inline;"><a class="btn btn-warning btn-xs" data-title="View" data-toggle="modal" data-target="#view" href="javascript:void(0);" data-fancybox-type="iframe" data-fancybox="" data-src="<?php echo base_url();?>employee/view/<?php echo $emp -> id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></p>
			                            	<p data-placement="top" data-toggle="tooltip" title="Edit" style="display: inline;"><a class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" href="javascript:void(0);" data-fancybox-type="iframe" data-fancybox="" data-src="<?php echo base_url();?>employee/edit/<?php echo $emp -> id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></p>
			    							<p data-placement="top" data-toggle="tooltip" title="Delete" style="display: inline;"><a class="btn btn-danger btn-xs" href="<?php echo base_url();?>employee/delete/<?php echo $emp -> id; ?>" data-title="Delete" data-toggle="modal" onclick="return confirm('Are you sure?')"  ><span class="glyphicon glyphicon-trash"></span></a></p>
			    						</td>
									</tr>
								<?php } ?>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
		<script src="<?php echo base_url();?>assets/js/employee.js"></script>
	</body>
</html>