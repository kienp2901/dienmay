<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/adminslider.php'; ?>
<?php
	$class = new adminslider();
	if(isset($_GET['deleteid'])){
		$id=$_GET['deleteid'];
		$deleteBrand = $class->delete_slider($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Slider Title</th>
					<th>Slider Image</th>
					<th>Slider Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
						$show_slider = $class->list_slider();
						if($show_slider){
							$i=0;
							while($result =$show_slider->fetch_assoc()){
								$i++;
						
					?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['sliderName']; ?></td>
					<td><img src="upload/<?php echo $result['sliderImage']; ?>" height="40px" width="60px"/></td>	
					<td><?php
						if($result['type'] == 1){
							echo 'On';
						}else{
							echo 'Off';
						}
					 
					
					?></td>			
				<td>
					<a href="sliderdedit.php?id=<?php echo $result['id'] ?>">Edit</a> || 
					<a onclick="return confirm('Are you sure to Delete!');" href="?deleteid=<?php echo $result['id'] ?>" >Delete</a> 
				</td>
					</tr>
					<?php
                        }
                    }
                ?>	
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
