@extends('admin.layout.default')

@section('abc')


			
            <!-- Main Content -->

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Admin</strong> Dashboard</h1>

					
					<!-- main -->
					<div class="col-xl-12">
							<div class="w-150">
								<div class="row">
									<div class="col-sm-4">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">Total Students</h4>
													</div>
													<div class="col-auto">
														<div class="l-bg-green info-icon">
															<i class="fa fa-users pull-left col-orange font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">{{$totalStudents}}</h1>
												<div class="mb-0">
													<span class="text-success m-r-10"><i class="material-icons col-green align-middle">trending_up</i>
														10.32%
													</span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">Total Course</h4>
													</div>
													<div class="col-auto">
														<div class="col-indigo info-icon">
															<i class="fa fa-book pull-left card-icon font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">{{ $course }}</h1>
												<div class="mb-0">
													<span class="text-danger m-r-10"><i class="material-icons col-red align-middle">trending_down</i>
														-10.64%
													</span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">Teacher</h4>
													</div>
													<div class="col-auto">
														<div class="col-teal info-icon">
														<i class="fas fa-chalkboard-teacher"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">{{ $teacher }}</h1>
												<div class="mb-0">
													<span class="text-success m-r-10"><i class="material-icons col-green align-middle">trending_up</i>
														21..19%
													</span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">Department</h4>
													</div>
													<div class="col-auto">
														<div class="col-pink info-icon">
														<i class="fa fa-building pull-left card-icon font-30"></i> 
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">8</h1>
												<div class="mb-0">
													<span class="text-danger m-r-10"><i class="material-icons col-red align-middle">trending_down</i>
														-4.27%
													</span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">New Students</h4>
													</div>
													<div class="col-auto">
														<div class="col-teal info-icon">
															<i class="fa fa-user pull-left card-icon font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">{{$totalStudents}}</h1>
												<div class="mb-0">
													<span class="text-success m-r-10"><i class="material-icons col-green align-middle">trending_up</i>
														21..19%
													</span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">Visitors</h4>
													</div>
													<div class="col-auto">
														<div class="col-pink info-icon">
															<i class="fa fa-coffee pull-left card-icon font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">2,352</h1>
												<div class="mb-0">
													<span class="text-danger m-r-10"><i class="material-icons col-red align-middle">trending_down</i>
														-4.27%
													</span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
									<!-- <div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">New Students</h4>
													</div>
													<div class="col-auto">
														<div class="col-teal info-icon">
															<i class="fa fa-user pull-left card-icon font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">323</h1>
												<div class="mb-0">
													<span class="text-success m-r-10"><i class="material-icons col-green align-middle">trending_up</i>
														21..19%
													</span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">Visitors</h4>
													</div>
													<div class="col-auto">
														<div class="col-pink info-icon">
															<i class="fa fa-coffee pull-left card-icon font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">2,352</h1>
												<div class="mb-0">
													<span class="text-danger m-r-10"><i class="material-icons col-red align-middle">trending_down</i>
														-4.27%
													</span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div> -->
								</div>
							</div>
						</div>

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Browser Usage</h5>
								</div>
								<div class="card-body d-flex">
									<!-- <div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td>Chrome</td>
													<td class="text-end">4306</td>
												</tr>
												<tr>
													<td>Firefox</td>
													<td class="text-end">3801</td>
												</tr>
												<tr>
													<td>IE</td>
													<td class="text-end">1689</td>
												</tr>
											</tbody>
										</table>
									</div> -->
									
								</div>

								
							</div>
						</div>
						<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Real-Time</h5>
								</div>
								<div class="card-body px-4">
									<div id="world_map" style="height:350px;"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Calendar</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end -->

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Latest Projects</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Name</th>
											<th class="d-none d-xl-table-cell">Start Date</th>
											<th class="d-none d-xl-table-cell">End Date</th>
											<th>Status</th>
											<th class="d-none d-md-table-cell">Assignee</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Project Apollo</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Project Fireball</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-danger">Cancelled</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Project Hades</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Nitro</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Project Phoenix</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Project X</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Romeo</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Christina Mason</td>
										</tr>
										<tr>
											<td>Project Wombat</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Monthly Sales</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

@stop


			<!-- Footer -->
