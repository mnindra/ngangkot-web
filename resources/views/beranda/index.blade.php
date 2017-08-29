@extends('template')

@section('page')
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <div class="row clearfix">
        {{--visitor--}}
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="body bg-deep-purple">
                    <div class="font-bold m-b--35">PENGGUNA AKTIF</div>
                    <div class="sparkline" data-type="line" data-spot-radius="4" data-highlight-spot-color="rgb(233, 30, 99)" data-highlight-line-color="#fff" data-min-spot-color="rgb(255,255,255)" data-max-spot-color="rgb(255,255,255)" data-spot-color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px" data-line-width="2" data-line-color="rgba(255,255,255,0.7)" data-fill-color="rgba(0, 188, 212, 0)"><canvas width="270" height="92" style="display: inline-block; width: 270px; height: 92px; vertical-align: top;"></canvas></div>
                    <ul class="dashboard-stat-list">
                        <li>
                            HARI INI
                            <span class="pull-right"><b>1 200</b> <small>USERS</small></span>
                        </li>
                        <li>
                            KEMARIN
                            <span class="pull-right"><b>3 872</b> <small>USERS</small></span>
                        </li>
                        <li>
                            MINGGU TERAKHIR
                            <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{--end visitor--}}

        {{--Pengguna Jasa Angkot--}}
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="body bg-teal">
                    <div class="font-bold m-b--35">PENGGUNA JASA ANGKOT</div>
                    <ul class="dashboard-stat-list">
                        <li>
                            HARI INI
                            <span class="pull-right"><b>12</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            KEMARIN
                            <span class="pull-right"><b>15</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            MINGGU TERAKHIR
                            <span class="pull-right"><b>90</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            BULAN TERAKHIR
                            <span class="pull-right"><b>342</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            SETAHUN TERAKHIR
                            <span class="pull-right"><b>4 225</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            JUMLAH TOTAL
                            <span class="pull-right"><b>8 752</b> <small>TICKETS</small></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{--end Pengguna Jasa Angkot--}}

        {{--visitor--}}
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="body bg-pink">
                    <div class="font-bold m-b--35">ANGKUTAN AKTIF</div>
                    <div class="sparkline" data-type="line" data-spot-radius="4" data-highlight-spot-color="rgb(233, 30, 99)" data-highlight-line-color="#fff" data-min-spot-color="rgb(255,255,255)" data-max-spot-color="rgb(255,255,255)" data-spot-color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px" data-line-width="2" data-line-color="rgba(255,255,255,0.7)" data-fill-color="rgba(0, 188, 212, 0)"><canvas width="270" height="92" style="display: inline-block; width: 270px; height: 92px; vertical-align: top;"></canvas></div>
                    <ul class="dashboard-stat-list">
                        <li>
                            HARI INI
                            <span class="pull-right"><b>1 200</b> <small>USERS</small></span>
                        </li>
                        <li>
                            KEMARIN
                            <span class="pull-right"><b>3 872</b> <small>USERS</small></span>
                        </li>
                        <li>
                            MINGGU TERAKHIR
                            <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{--end visitor--}}

    </div>

    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card">
                <div class="header">
                    <h2>INFO PENGEMUDI</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Task</th>
                                <th>Status</th>
                                <th>Manager</th>
                                <th>Progress</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Task A</td>
                                <td><span class="label bg-green">Doing</span></td>
                                <td>John Doe</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Task B</td>
                                <td><span class="label bg-blue">To Do</span></td>
                                <td>John Doe</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Task C</td>
                                <td><span class="label bg-light-blue">On Hold</span></td>
                                <td>John Doe</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-light-blue" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Task D</td>
                                <td><span class="label bg-orange">Wait Approvel</span></td>
                                <td>John Doe</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Task E</td>
                                <td>
                                    <span class="label bg-red">Suspended</span>
                                </td>
                                <td>John Doe</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
        <!-- Browser Usage -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="header">
                    <h2>BROWSER USAGE</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="donut_chart" class="dashboard-donut-chart"><svg height="265" version="1.1" width="270" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.328125px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#e91e63" d="M135,214.16666666666669A81.66666666666667,81.66666666666667,0,0,0,197.36598314293147,79.77497187236375" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#e91e63" stroke="#ffffff" d="M135,217.16666666666669A84.66666666666667,84.66666666666667,0,0,0,199.65697844205954,77.83813410440976L228.5489747143972,53.41245780854564A122.5,122.5,0,0,1,135,255Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#00bcd4" d="M197.36598314293147,79.77497187236375A81.66666666666667,81.66666666666667,0,0,0,66.93689880580898,87.36842900724861" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#00bcd4" stroke="#ffffff" d="M199.65697844205954,77.83813410440976A84.66666666666667,84.66666666666667,0,0,0,64.4366216190836,85.71053456261693L37.07247685325579,67.56580091859239A117.5,117.5,0,0,1,224.73064921585035,56.64052075513561Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#ff9800" d="M66.93689880580898,87.36842900724861A81.66666666666667,81.66666666666667,0,0,0,65.44216513257356,175.29196248129173" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#ff9800" stroke="#ffffff" d="M64.4366216190836,85.71053456261693A84.66666666666667,84.66666666666667,0,0,0,62.88697936193341,176.86391212346163L34.92189064992728,194.06802765165443A117.5,117.5,0,0,1,37.07247685325579,67.56580091859239Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#009688" d="M65.44216513257356,175.29196248129173A81.66666666666667,81.66666666666667,0,0,0,115.52090387726372,211.80957860615354" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#009688" stroke="#ffffff" d="M62.88697936193341,176.86391212346163A84.66666666666667,84.66666666666667,0,0,0,114.80534524418361,214.72299169780814L106.97395353769576,246.60867942313925A117.5,117.5,0,0,1,34.92189064992728,194.06802765165443Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#607d8b" d="M115.52090387726372,211.80957860615354A81.66666666666667,81.66666666666667,0,0,0,134.9743436604178,214.16666263657822" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#607d8b" stroke="#ffffff" d="M114.80534524418361,214.72299169780814A84.66666666666667,84.66666666666667,0,0,0,134.97340118263722,217.1666624885342L134.96308628692765,249.99999420160748A117.5,117.5,0,0,1,106.97395353769576,246.60867942313925Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="135" y="122.5" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1.8561,0,0,1.8561,-115.5615,-114.2841)" stroke-width="0.5387755102040815"><tspan dy="6" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Chrome</tspan></text><text x="135" y="142.5" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(1.7014,0,0,1.7014,-94.682,-94.3368)" stroke-width="0.5877551020408163"><tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">37%</tspan></text></svg></div>
                </div>
            </div>
        </div>
        <!-- #END# Browser Usage -->
    </div>

@endsection