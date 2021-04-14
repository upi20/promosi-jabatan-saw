<!-- MAIN CONTENT -->
<div id="content">

	<!-- row -->
	<div class="row">

		<!-- col -->
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-table"></i>

				<?= $title ?>
			</h1>
		</div>
		<!-- end col -->

	</div>
	<!-- end row -->

	<!--
		The ID "widget-grid" will start to initialize all widgets below
		You do not need to use widgets if you dont want to. Simply remove
		the <section></section> and you can use wells or panels instead
		-->

	<!-- widget grid -->
	<section id="widget-grid" class="">

		<!-- row -->
		<div class="row">

			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							<input class="form-control" type="text">
						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<?php foreach ($records as $record) : ?>
							<div class="widget-body">
								<div class="row">
									<div class="col-sm-8">
										<p class="h3">Hak Akses Menu <?= $record['menu']['menu_nama']; ?></p>
									</div>
									<div class="col-sm-4">
										<div class="pull-right">
											<?php if ($record['menu']['akses']) : ?>
												<input type="checkbox" class="form-check-input" data-level="<?= $id_level ?>" id="menu-hak-akses-<?= $record['menu']['menu_id'] ?>" checked>
											<?php else : ?>
												<input type="checkbox" class="form-check-input" data-level="<?= $id_level ?>" id="menu-hak-akses-<?= $record['menu']['menu_id'] ?>">
											<?php endif; ?>
											<label class="form-check-label" for="menu-hak-akses-<?= $record['menu']['menu_id'] ?>">Hak Akses</label>
										</div>
									</div>
								</div>

								<table id="tabel-hak-akses-<?= $record['menu']['menu_id'] ?>" class="table table-striped table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Nama Sub Menu</th>
											<th data-class="expand"><i class="fa fa-fw fa-key text-muted hidden-md hidden-sm hidden-xs"></i> Hak Akses</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($record['sub_menu'] as $submenu) : ?>
											<tr data-id="<?= $submenu['menu_id'] ?>">
												<td><?= $submenu['menu_nama'] ?></td>
												<td>
													<?php if ($submenu['akses']) : ?>
														<input type="checkbox" class="form-check-input" data-level="<?= $id_level ?>" id="menu-hak-akses-<?= $submenu['menu_id'] ?>" checked>
													<?php else : ?>
														<input type="checkbox" class="form-check-input" data-level="<?= $id_level ?>" id="menu-hak-akses-<?= $submenu['menu_id'] ?>">
													<?php endif; ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<br>
						<?php endforeach ?>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->

				</div>
				<!-- end widget -->

			</article>
			<!-- WIDGET END -->

		</div>

		<!-- end row -->

		<!-- row -->

		<div class="row">

			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<!-- your contents here -->
			</div>

		</div>

		<!-- end row -->

	</section>
	<!-- end widget grid -->
	<!-- widget grid -->
</div>

<script>
	const records = <?= json_encode($records) ?>;
</script>