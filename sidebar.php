<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>
						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="product.php" class="s-text13 active1">
									All
								</a>
							</li>
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
				
				$sub_menu_row=$sub_categ_view->num_rows;
			?>
				
				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="<?php if($sub_menu_row !==0){ echo 'js-toggle-dropdown-content';} ?> flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						<?php echo $main_categ_name; ?>
						<div style="<?php if($sub_menu_row ==0){ echo 'display:none;';} ?>">
							<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
							<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
						</div>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<ul>
				<?php
					while($sub_categ_data=$sub_categ_view->fetch_assoc()){
					$sub_categ_name= $sub_categ_data['sub_categ_name'];
					$sub_categ_id= $sub_categ_data['sl_id'];
				?>
						<li>
							<a href="categ_product.php?m_id=<?php echo $main_categ_id; ?> & s_id=<?php echo $sub_categ_id; ?>" target="_blank"><?php echo $sub_categ_name; ?></a>
						</li>
				<?php
					}//sub while
				?>
					</ul>
					</div>
				</div>	
				
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

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
								</div>
							</div>
						</div>

						<div class="filter-color p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-12">
								Color
							</div>

							<ul class="flex-w">
								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
									<label class="color-filter color-filter1" for="color-filter1"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
									<label class="color-filter color-filter2" for="color-filter2"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
									<label class="color-filter color-filter3" for="color-filter3"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
									<label class="color-filter color-filter4" for="color-filter4"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
									<label class="color-filter color-filter5" for="color-filter5"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
									<label class="color-filter color-filter6" for="color-filter6"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
									<label class="color-filter color-filter7" for="color-filter7"></label>
								</li>
							</ul>
						</div>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>
