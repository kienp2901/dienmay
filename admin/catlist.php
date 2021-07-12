<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/admincategory.php'; ?>
<?php
	$class = new admincategory();
	if(isset($_GET['deleteid'])){
		$id=$_GET['deleteid'];
		$deleteCat = $class->delete_category($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">    
					<?php
                        if(isset($deleteCat)){
                            echo $deleteCat;
                        }
                    ?>    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_cate = $class->list_category();
						if($show_cate){
							$i=0;
							while($result =$show_cate->fetch_assoc()){
								$i++;
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['Name']; ?></td>
							<td><a href="catedit.php?id=<?php echo $result['id'] ?>">Edit</a> || <a onclick="return confirm('Are you want to delete?')" href="?deleteid=<?php echo $result['id'] ?>">Delete</a></td>
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

