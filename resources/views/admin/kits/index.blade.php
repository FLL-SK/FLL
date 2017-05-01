@extends('admin.layouts.master')

@section('title') Prehľad zaslných stavebníc @endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/datatables.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('jquery-ui/jquery-ui.min.css') }}"/>
@endsection

@section('header-icon') pe-7s-plugin @endsection
@section('header-title') Prehľad zaslných stavebníc @endsection

@section('header-info')
    A aspernatur at dignissimos earum, error explicabo facilis fugiat harum ipsa ipsam, itaque libero maxime nesciunt optio possimus quidem rem, tempora temporibus.
@endsection

@section('content')

    <!-- Teams Table -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-filled">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                        <a class="panel-close"><i class="fa fa-times"></i></a>
                    </div>
                    Krátky popis k prehľadu zaslanýc stavebníc.
                </div>
                <div class="panel-body">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, maxime, sed! Velit minima vitae aliquam. Magni ducimus quae impedit et fugit dolor, dignissimos aperiam sapiente sint facilis reprehenderit voluptates dolorum.
                    </p>
                    <div class="table-responsive">

                        <table id="tableExample3" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Názov tímu</th>
                                <th>Adresa</th>
                                <th>Zaslanie stavebnice</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach (\App\Kit::orderBy('created_at', 'desc')->cursor() as $kit)
                                    <tr>
                                        <td>{{$kit->team->team_name}}</td>
                                        <td>{{$kit->team->address}}</td>
                                        <td>{{$kit->sent ? Carbon\Carbon::parse($kit->sent)->format('d/m/Y') : $kit->sent}}</td>
                                        <td>
                                            <a href="#" id="{{$kit->id}}" data-toggle="modal" data-target="#modal">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- END Teams Table -->
    @include('admin.modals.kitPatch')
@endsection

@section('footer')
    <script src="{{ URL::asset('vendor/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('jquery-ui/jquery-ui.min.js') }}"></script>

   <script>

        $(document).ready(function () {

            $('#tableExample3').DataTable({
                dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                buttons: []
            });

        });

        /*----------  MODAL SETTINGS  ----------*/

        $('td a').click(function(event) {
            $("#modal-form").attr("action", "kits/patch/" + $(this).attr("id"));
            var prevAll = $(this).parent().prevAll(); // Vsetky predchadzajuce <td>
            $(".modal-title").text($(prevAll[2]).text()); // Nazov timu
            $("#modal-small").text($(prevAll[1]).text()); // Adresa
            $("#sent").val($(prevAll[0]).text()); // Zaslanie faktury
        });

        /*----------  DATEPICKER SETTINGS  ----------*/

        $("#sent").datepicker({
            dateFormat: 'dd/mm/yy'
        });

        // // Sparkline charts
        // var sparklineCharts = function () {
        //     $(".sparkline7").sparkline([10, 34, 13, 33, 35, 24, 32, 24, 52, 35], {
        //         type: 'line',
        //         lineColor: '#FFFFFF',
        //         lineWidth: 3,
        //         fillColor: '#F6A821',
        //         height: 75,
        //         width: '100%'
        //     });
        // };

        // var sparkResize;

        // // Resize sparkline charts on window resize
        // $(window).resize(function () {
        //     clearTimeout(sparkResize);
        //     sparkResize = setTimeout(sparklineCharts, 100);
        // });

        // // Run sparkline
        // sparklineCharts();
    </script>
@endsection