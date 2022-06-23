@extends('backend.main-section.body.main')
@section('main')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="form-inline">
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control border" id="dash-daterange">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-blue border-blue text-white">
                                            <i class="mdi mdi-calendar-range"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-1">
                                <i class="mdi mdi-filter-variant"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-3 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                <i class="mdi mdi-account-supervisor font-22 avatar-title text-primary"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="mt-1"><span data-plugin="counterup">{{$count}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Users</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-3 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                <i class="mdi mdi-account-tie font-22 avatar-title text-success"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$teacher}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Teachers</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-3 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-pink border-pink border">
                                <i class="mdi mdi-school font-22 avatar-title text-pink"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$student}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Students</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-3 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                <i class="mdi mdi-library font-22 avatar-title text-warning"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$book}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Books</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->


        <div class="row">
            <div class="col-xl-6">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Top 5 Users Balances</h4>

                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-nowrap table-centered m-0">

                            <thead class="thead-light">
                                <tr>
                                    <th colspan="2">Profile</th>
                                    <th>Currency</th>
                                    <th>Balance</th>
                                    <th>Reserved in orders</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 36px;">
                                        <img src="../assets/images/users/user-2.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                    </td>

                                    <td>
                                        <h5 class="m-0 font-weight-normal">Tomaslau</h5>
                                        <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-btc text-primary"></i> BTC
                                    </td>

                                    <td>
                                        0.00816117 BTC
                                    </td>

                                    <td>
                                        0.00097036 BTC
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 36px;">
                                        <img src="../assets/images/users/user-3.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                    </td>

                                    <td>
                                        <h5 class="m-0 font-weight-normal">Erwin E. Brown</h5>
                                        <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-eth text-primary"></i> ETH
                                    </td>

                                    <td>
                                        3.16117008 ETH
                                    </td>

                                    <td>
                                        1.70360009 ETH
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 36px;">
                                        <img src="../assets/images/users/user-4.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                    </td>

                                    <td>
                                        <h5 class="m-0 font-weight-normal">Margeret V. Ligon</h5>
                                        <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-eur text-primary"></i> EUR
                                    </td>

                                    <td>
                                        25.08 EUR
                                    </td>

                                    <td>
                                        12.58 EUR
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 36px;">
                                        <img src="../assets/images/users/user-5.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                    </td>

                                    <td>
                                        <h5 class="m-0 font-weight-normal">Jose D. Delacruz</h5>
                                        <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-cny text-primary"></i> CNY
                                    </td>

                                    <td>
                                        82.00 CNY
                                    </td>

                                    <td>
                                        30.83 CNY
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 36px;">
                                        <img src="../assets/images/users/user-6.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                    </td>

                                    <td>
                                        <h5 class="m-0 font-weight-normal">Luke J. Sain</h5>
                                        <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-btc text-primary"></i> BTC
                                    </td>

                                    <td>
                                        2.00816117 BTC
                                    </td>

                                    <td>
                                        1.00097036 BTC
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  <!-- end col -->
        </div>
        <!-- end row -->
        
    </div> <!-- container -->

</div> 
    
@endsection