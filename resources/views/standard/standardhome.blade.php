<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
@extends('...layouts.nav')

@section('vnav')
 <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link  active" href="{{url('/redirects')}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12px" height="12px" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                            <title>les demandes </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6" d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                            <path class="color-background" d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Mes Demandes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/postuledmd')}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                            <title>Ajouter Une Demande</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g id="les employés" transform="translate(153.000000, 2.000000)">
                                            <path class="color-background opacity-6" d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z"/>
                                            <path class="color-background opacity-6" d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Ajouter Une Demande</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  " href="{{url('/profile',Auth::user()->Id)}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>Modifier Compte</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(1.000000, 0.000000)">
                                            <path class="color-background opacity-6" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                                            <path class="color-background" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                                            <path class="color-background" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  " href="{{url('/logout')}}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>Deconnecter</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path>
                                            <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Log Out</span>
                </a>
            </li>
        </ul>
    </div>
 </aside>
 <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Mes Demandes</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id='myTable' class="table align-items-center mb-0">
                                <thead>

                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                            <div>
                                                <input style='font-size:small' class=' w-75 h-75 ' type="text" id="name" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                                            </div>
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jours Disponibles
                                            <div>
                                                <input style='font-size:small' class='px-0  w-25 h-75 ' type="text" id="inf" onkeyup="myFunction4()">
                                                <span class='mt-1'>&lt;x&lt;</span>
                                                <input style='font-size:small' class='px-0  w-25 h-75 ' type="text" id="sup" onkeyup="myFunction4()">
                                            </div>
                                        </th>
                                        <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Etat de demande
                                            <div>
                                                <select style='font-size:small;' id='etat' onchange="myFunction3()">
                                                    <option disablade selected></option>
                                                    <option style='font-size:small;' value="VALIDATED"> VALIDATED</option>
                                                    <option style='font-size:small;' value="CREATED">CREATED</option>
                                                    <option style='font-size:small;' value="APPROUVED">APPROUVED</option>
                                                </select>
                                            </div>
                                        </th>
                                        <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">jours demandés
                                            <div>
                                                <input style='font-size:small' class='px-0  w-25 h-75 ' type="text" id="inf1" onkeyup="myFunction5()">
                                                <span class='mt-1'>&lt;x&lt;</span>
                                                <input style='font-size:small' class='px-0  w-25 h-75 ' type="text" id="sup1" onkeyup="myFunction5()">
                                            </div>
                                        </th>
                                        <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Debut</th>
                                        <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fin</th>
                                        <th class="text-secondary opacity-7"></th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($data2 as $value)
                                    <tr>

                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="px-2 d-flex flex-column justify-content-center">
                                                    <h6 style="text-transform: capitalize;" class="mb-0 text-sm">{{{$value->FullNameEmp}}}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{{$value->Login}}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{{$value->AvailableDays}}}</span>
                                        </td>

                                        @if($value->State == 'validated')
                                        <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm text-white bg-gradient-success ">{{{$value->State}}}</span>
                                        </td>
                                        @elseif($value->State == 'approuved')
                                        <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm text-white bg-gradient-warning">{{{$value->State}}}</span>
                                        </td>
                                        @elseif($value->State == 'refused')
                                        <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm text-white bg-gradient-danger">{{{$value->State}}}</span>
                                        </td>
                                        @else
                                        <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm text-white bg-gradient-secondary">{{{$value->State}}}</span>
                                        </td>
                                        @endif

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{{$value->RequestDays}}}</span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{date('d-m-Y', strtotime($value->start_at))}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{date('d-m-Y',strtotime($value->start_at)+$value->RequestDays*3600*24)}}</span>
                                        </td>
                                        @if($value->State == 'created' || $value->State == 'refused')
                                        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div style="width:80%;" class="modal-content">

                                                    <div  class="modal-header">
                                                        <button style="background-color:transparent; border:none;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 style="font-size: 1rem" class="modal-title" id="myModalLabel">Confirm Delete</h4>
                                                    </div>

                                                    <div class="modal-body">
                                                        <p>You are about to delete one track, this procedure is irreversible.</p>
                                                        <p>Do you want to proceed?</p>
                                                        <p class="debug-url"></p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <a href="{{url('/deletedmd',$value->Id)}}" class="btn btn-danger btn-ok">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <td class="align-middle">
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" data-toggle="modal" data-target="#confirm-delete" data-placement="top" title="supprimer" data-original-title="Delete user"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                        </td>
                                        @else
                                        <td class="align-middle">
                                            <a href="" class="px-3 text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-placement="top" title="la demande n'est pas approuvée" data-original-title="validate demande">
                                                not-allowed
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
        <script>
            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("name");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
        <script>
            function myFunction2() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("groupe");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
        <script>
            function myFunction3() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("etat");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
        <script>
            function myFunction4() {
                var input1, input2, filter1, filter2, table, tr, td, i, txtValue;
                input1 = document.getElementById("inf");
                input2 = document.getElementById("sup");
                filter1 = input1.value;
                filter2 = input2.value;
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {

                        txtValue = td.textContent;
                        filterint1 = parseInt(filter1, 10);
                        filterint2 = parseInt(filter2, 10);
                        txtValueint = parseInt(txtValue, 10);
                        if (filter1 == "") {
                            filterint1 = -99999;
                        }
                        if (filter2 == "") {
                            filterint2 = +99999;
                        }
                        if (filterint1 <= txtValueint && filterint2 >= txtValueint) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";

                        }
                    }
                }
            }
        </script>
        <script>
            function myFunction5() {
                var input1, input2, filter1, filter2, table, tr, td, i, txtValue;
                input1 = document.getElementById("inf1");
                input2 = document.getElementById("sup1");
                filter1 = input1.value;
                filter2 = input2.value;
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[3];
                    if (td) {

                        txtValue = td.textContent;
                        filterint1 = parseInt(filter1, 10);
                        filterint2 = parseInt(filter2, 10);
                        txtValueint = parseInt(txtValue, 10);
                        if (filter1 == "") {
                            filterint1 = -99999;
                        }
                        if (filter2 == "") {
                            filterint2 = +99999;
                        }
                        if (filterint1 <= txtValueint && filterint2 >= txtValueint) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";

                        }
                    }
                }
            }
        </script>
@endsection