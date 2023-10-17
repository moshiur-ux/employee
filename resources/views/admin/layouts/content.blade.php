<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Users
                                        <p><i class="fas fa-user fa-fw" style="font-size:200px;"></i></p>


                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white " href="#" style="font-size:30px;">{{App\User::all()->count()}}</a>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Department

                                    <p><i class="fas fa-home" style="font-size:200px;"></i></p>


                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#" style="font-size:30px;">{{App\Department::all()->count()}}</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Notice
                                    <p><i class="fas fa-envelope" style="font-size:200px;"></i></p>


                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#" style="font-size:18px;">{{App\Notice::all()->count()}}</a>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Leave

                                    <p><i class="fas fa-book" style="font-size:200px"></i></p>

                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#" style=" font-size:30px;">{{App\Leave::all()->count()}}</a>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">

                                <div class="card-header">

                                Your Details
                              </div>
                                <div class="card-header" style=" background-color:orange">

                                Name:{{Auth::user()?->name}}
                              </div>
                                <div class="card-header" style=" background-color:orange">

                                Email:{{Auth::user()?->email}}
                              </div>
                                <div class="card-header" style=" background-color:orange">

                                Address:{{Auth::user()?->address}}
                              </div>
                                <div class="card-header" style=" background-color:orange">

                                Mobile Number:{{Auth::user()?->mobile_number}}
                              </div>
                                <div class="card-header" style=" background-color:orange">

                                Degination:{{Auth::user()?->designation}}
                              </div>
                                <div class="card-header" style=" background-color:orange">

                                Start date:{{Auth::user()?->start_from}}
                              </div>

                        </div>
                   </div>
             </div>
                    
                    </div>
                </main>