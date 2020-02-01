<div class="m-portlet m-portlet--tabs" style="width: 100%">
	<div class="pesan"></div>
	<div class="m-portlet__head">
		<div class="m-portlet__head-tools">
			<ul class="nav nav-tabs m-tabs-line m-tabs-line--success m-tabs-line--2x" role="tablist">
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_portlet_base_demo_1_1_tab_content" role="tab">
						Overview
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_portlet_base_demo_1_2_tab_content" role="tab">
						Member
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_portlet_base_demo_1_3_tab_content" role="tab">
						Tournaments
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_portlet_base_demo_1_4_tab_content" role="tab">
						Leaderboards
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_portlet_base_demo_1_5_tab_content" role="tab">
						Match
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="tab-content">
			<div class="tab-pane active" id="m_portlet_base_demo_1_1_tab_content" role="tabpanel">
				<?php include 'overview.php'; ?>
			</div>
			<div class="tab-pane" id="m_portlet_base_demo_1_2_tab_content" role="tabpanel">
				<?php include 'member.php'; ?>
			</div>
			<div class="tab-pane" id="m_portlet_base_demo_1_3_tab_content" role="tabpanel">
				<?php include 'tournament.php'; ?>
			</div>
			<div class="tab-pane" id="m_portlet_base_demo_1_4_tab_content" role="tabpanel">
				<?php include 'leaderboard.php'; ?>
			</div>
			<div class="tab-pane" id="m_portlet_base_demo_1_5_tab_content" role="tabpanel">
				<?php include 'match.php'; ?>
			</div>
		</div>
	</div>	
</div>