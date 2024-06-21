<h1>create your Workspace</h1>
<hr>
<?php 

if($this->session->flashdata('message')){

  echo $this->session->flashdata('message');
}



?>
<form action="<?php echo base_url('index.php/student/workspace/create'); ?>"
method="post">

Workspace Name : <input type="text" name="wp_name" required />
<br/>
<input type="submit" value="create Workspace">
</form>
<hr>

<table border="1" class="table table-striped" rules="all" width="100%">
<tr>
  <th>SR</th>
  <th>NAME</th>
  <th>ACTION</th>
  </tr>
  <?php if(@count($wps)>0): $i=1; ?>
  	<?php foreach(@$wps as $wp): ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $wp->name; ?></td>
    <td>Delete</td>
    </tr>
    <?php $i++; endforeach; ?>
<?php else: ?>
	<tr>
		<td colspan="3" style="text-align:center;">no workspace found</td>
	</tr>
<?php endif; ?>
    </table

