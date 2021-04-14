<?php
	function active_if($boolean) 
	{
		return $boolean ? 'active' : '';
	}

	function style_active_if($boolean) 
	{
		return $boolean ? 'display: block;' : 'display: none;';
	}
?>
<nav>
	
	<!-- 
	NOTE: Notice the gaps after each icon usage <i></i>..
	Please note that these links work a bit different than
	traditional href="<?= base_url() ?>assets/" links. See documentation for details.
	-->

	<ul id="navigation">
	
		<?php foreach ($this->default->menu() as $q): ?>
			
			<li class="<?= active_if(in_array($q['menu_nama'], $navigation)) ?>">

				<?php $menu_url = $q['menu_url'] == '#' ? '#' : (base_url() . $q['menu_url']); ?>
				
				<a href="<?= $menu_url ?>" title="<?= $q['menu_nama'] ?>">
					<i class="fa fa-sm fa-fw <?= $q['menu_icon'] ?>"></i> 
					<span class="menu-item-parent"><?= $q['menu_nama'] ?></span>
				</a>

				<?php 
					$sub_menu 	=  $this->default->sub_menu($q['menu_id']);
					if($sub_menu):
				?>
					
					<ul style="<?= style_active_if(in_array($q['menu_nama'], $navigation)) ?>">
						
						<?php foreach ($sub_menu as $row) : ?>
							
							<li class="<?= active_if(in_array($row['menu_nama'], $navigation)) ?>">
								
								<a href="<?= base_url() ?><?=$row['menu_url']?>"><i class="fa fa-caret-right"></i> <?=$row['menu_nama']?></a>
							
							</li>
						
						<?php endforeach; ?>
					
					</ul>
				
				<?php 
					
					endif;
				
				?>
			</li>
		<?php endforeach; ?>
	
		</li>
	</ul>

	<span class="minifyme" data-action="minifyMenu"> 
		<i class="fa fa-arrow-circle-left hit"></i> 
	</span>
</nav>