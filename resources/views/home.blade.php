@extends('layouts.master')

@section('title', 'Home')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->

            <div class="row">
              <div class="col-lg-2 col-4">
                <!-- small box -->
                <div class="small-box bg-primary">
                  <div class="inner">
                    <h3>{{count($clubs)}}</h3>

                    <p>Total Clubs</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-friends"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-2 col-4">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{count($members)}}</h3>

                    <p>Total Members</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->

              <div class="col-lg-2 col-4">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{$total_deposits}}</h3>

                    <p>Total Deposit</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-coins"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-2 col-4">
                <!-- small box -->
                <div class="small-box bg-secondary">
                  <div class="inner">
                    <h3>{{$total_paids}}</h3>

                    <p>Total Paid</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <!-- ./col -->
              <div class="col-lg-2 col-4">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{$total_dues}}</h3>

                    <p>Total Due</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              
              <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                    <div class="card card-primary card-outline">
                      <div class="card-header">
                        <h5 class="m-0">Clubs</h5>
                      </div>
                        <div class="card-body">
                            <!-- <h6 class="card-title">Special title treatment</h6> -->

                            <!-- Table -->
                        
                            <div class="pt-2">
                                <table id="club_table" class="display">
                                    <thead>
                                        <tr>
                                            <th>Serial Number</th>
                                            <th>Club Name</th>
                                            <th>President Name</th>
                                            <th>Secretary Name</th>
                                            <th>Address</th>
                                            <th>Total Deposit</th>
                                            <th>Paid Amount</th>
                                            <th>Due Amount</th>
                                            <th>Payment Status</th>
                                            <th>Club Logo</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- Card-body -->
                    </div>  <!-- Card -->           
                </div>   <!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div>
    </div>


        
</div><!-- /.content-wrapper -->


@endsection

@section('script')
<script type="text/javascript" src="js/homeclublist.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#club_table').DataTable();
    });
</script>

@endsection
