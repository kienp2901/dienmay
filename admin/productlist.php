<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/adminbrand.php'; ?>
<?php include '../classes/admin/admincategory.php'; ?>
<?php include '../classes/admin/adminproduct.php'; ?>
<?php include_once '../helpers/format.php'; ?>
<?php 
$fm = new Format();
$class = new adminproduct();
if(isset($_GET['deleteid'])){
	$id=$_GET['deleteid'];
	$deleteProduct = $class->delete_product($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Type</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					
					
					$prolist = $class->list_product();
					if($prolist){
						$i=0;
						while($result = $prolist->fetch_assoc()){
							$i++;
				?>
				<tr class="odd gradeX" style="vertical-align: middle;">
					<td style="vertical-align: middle;"><?php echo $i; ?></td>
					<td style="vertical-align: middle;"><?php echo $result['Name']; ?></td>
					<td style="vertical-align: middle;"><?php echo $result['catName']; ?></td>
					<td style="vertical-align: middle;"><?php echo $result['brandName']; ?></td>
					<td style="vertical-align: middle;"><?php echo $fm->textShorten($result['product_desc'], 50);  ?></td>
					<td style="vertical-align: middle;"><?php echo number_format($result['price']); ?></td>
					<td style="vertical-align: middle;"><?php
						if($result['type']==0){
							echo 'Non Featured'; 
						}else{
							echo 'Featured'; 
						}
					 		
					?></td>
					<td style="vertical-align: middle;"	><img src="upload/<?php echo $result['image']; ?>" width="80" alt=""></td>
					<td style="vertical-align: middle;"><a href="productedit.php?productid=<?php echo $result['id'] ?>">Edit</a> || <a onclick="return confirm('Are you want to delete?')" href="?deleteid=<?php echo $result['id'] ?>">Delete</a></td>
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
