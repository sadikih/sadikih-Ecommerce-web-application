<style>
	#product_menu{
		background-color: #0c380c;
		border-radius:0;
	}
	#product_menu ul li a{
		color:white;
	}
	#product_menu ul ul{
		background-color: #abfbab;
	}
	#product_menu ul ul li a{
		color: black;
	}
</style>

    <section>
		<!-- =========== Menu =============== -->
		<nav id="product_menu" class="navbar navbar-inverse" >
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
			  <a class="navbar-brand hidden-lg hidden-md hidden-sm" href="#" style="padding:5px; height:50px;"><img class="img-responsive" src="images/sharif.png" alt="company icon" width="40"></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav">
<?php
require_once('class_lib/main_category_class.php');
$main_categ_obj=new Main_Category;
$main_categ_view=$main_categ_obj->main_category_view();
	if($main_categ_view->num_rows > 0){
		while($main_categ_data=$main_categ_view->fetch_assoc()){
				$main_categ_name= $main_categ_data['main_categ_name'];
				$main_categ_id= $main_categ_data['sl_id'];
				
				##################### View Sub_Category
				require_once('class_lib/sub_category_class.php');
				$sub_categ_obj=new Sub_Category;
				$sub_categ_view=$sub_categ_obj->sub_categ_view_main($main_categ_id);
				
				$sub_menu=$sub_categ_view->num_rows;
			?>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $main_categ_name; ?>
					<span class="caret <?php if($sub_menu==0){echo 'hidden';}?>"></span></a>
					<ul class="dropdown-menu <?php if($sub_menu==0){echo 'hidden';}?>">
				<?php
					while($sub_categ_data=$sub_categ_view->fetch_assoc()){
					$sub_categ_name= $sub_categ_data['sub_categ_name'];
					$sub_categ_id= $sub_categ_data['sl_id'];
				?>
					  <li><a href="categ_product.php?m_id=<?php echo $main_categ_id; ?> & s_id=<?php echo $sub_categ_id; ?>"><?php echo $sub_categ_name; ?></a></li>
					  
				<?php
					}//sub while
				?>
					</ul>
				</li>
				
				<?php
				
		}// main while
	}else{
		?>
			<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Demo
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
					  <li><a href="#">Page 1-1</a></li>
					  <li><a href="#">Page 1-2</a></li>
					  <li><a href="#">Page 1-3</a></li>
					</ul>
				</li>
		<?php
	}

?>
				
			  </ul>
			</div>
		  </div>
		</nav>
	</section>