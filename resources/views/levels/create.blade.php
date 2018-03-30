@extends('layouts.app')
@section('content')

<!-- JAVASCRIPT -->
<script src="{{ asset('js/script.js') }}" defer></script>

<!-- CONTENT -->
    <div class="container">

        <!-- BANNERS -->
            <!-- TOP BANNER -->
                <div class="row d-none d-sm-block">
                    <div class="col-12">
                        <img class="w-100" src="../images/www/banners/banner-top.png" alt="Phat The Cat Banner">
                    </div>
                </div>
            <!-- END TOP BANNER -->

            <!-- TOP BANNER FOR XS -->
                <div class="row d-block d-sm-none">
                    <div class="col-12">
                        <img class="w-100" src="../images/www/banners/banner-top-small.png" alt="Phat The Cat Banner">
                    </div>
                </div>
            <!-- END TOP BANNER FOR XS -->
        <!-- BANNERS -->

        <!-- LAYOUT SETUP SECTION -->
            <section id="layoutSetupContainer" class="bg-info">
                <div class="row no-gutters">
                    <h3 class="text-center bg-danger text-uppercase sectionHeader col-12">LAYOUT SETTINGS</h3>
                    <div class="col-12 p-4">
                        <!-- MAIN LAYOUT SETUP -->
                            <form id="builderLayout" class="row no-gutters">
                                <div class="col-12">
                                    <input type="number" name="layoutRows">Number of rows</input>
                                    <input type="number" name="layoutCols">Number of columns</input>
                                </div>

                                <input class="btn btn-primary col-12" type="submit" value="Generate layout">
                            </form>
                        <!-- END MAIN LAYOUT SETUP -->
                    </div>
                </div>
            </section>
        <!-- END LAYOUT SETUP SECTION -->

        <!-- LEVEL LAYOUT SECTION -->
            <section id="layoutContainer" class="d-none bg-info ">

                <!-- LAYOUT EDITING BUTTON CONTAINER -->
                    <div class="row no-gutters">
                        <h3 class="text-center bg-danger text-uppercase sectionHeader col-12">ADJUST LAYOUT</h3>
                        <div class="col-12">
                                <div class="row no-gutters">
                                    <button type="button" class="col-3" onclick="addRow('first')">ADD FIRST ROW</button>
                                    <button type="button" class="col-3" onclick="addRow('last')">ADD LAST ROW</button>
                                    <button type="button" class="col-3" onclick="addCol('first')">ADD FIRST COLUMN</button>
                                    <button type="button" class="col-3" onclick="addCol('last')">ADD LAST COLUMN</button>
                                </div>
                                <div class="row no-gutters">
                                    <button type="button" class="col-3" onclick="removeRow('first')">REMOVE FIRST ROW</button>
                                    <button type="button" class="col-3" onclick="removeRow('last')">REMOVE LAST ROW</button>
                                    <button type="button" class="col-3" onclick="removeCol('first')">REMOVE FIRST COLUMN</button>
                                    <button type="button" class="col-3" onclick="removeCol('last')">REMOVE LAST COLUMN</button>
                                </div>
                        </div>
                    </div>
                <!-- END LAYOUT EDITING BUTTON CONTAINER -->

                <!-- TILE PALETTE -->
                    <div class="row no-gutters py-3">
                        <h3 class="text-center bg-danger text-uppercase sectionHeader col-12">TILE PALETTE</h3>
                        <!-- TILE PICKER -->
                            <div id="tileTypeSelectors" class="col-12">
                                <!-- DELETING TILE -->
                                <button class="builderButton" value="0">0</button>
                                <!-- PLAYER SPAWN LOCATION -->
                                <button class="builderButton" value="x" style="background-image: url('../images/player-test.png');">X</button>
                                <!-- OTHER TILE TYPE BUTTONS WILL BE APPENDED HERE WITH JS -->
                            </div>
                        <!-- END TILE PICKER -->
                    </div>
                <!-- END TILE PALETTE -->

                <!-- GENERATED GRID CONTAINER -->
                    <div class="row no-gutters py-3">
                        <h3 class="text-center bg-danger text-uppercase sectionHeader col-12">LEVEL LAYOUT</h3>
                        <div id="builderLayoutContainer" class="col-12"></div>
                    </div>
                <!-- END GENERATED GRID CONTAINER -->

                <!-- ADD LAYOUT DETAILS AND SUBMIT -->
                    <div class="row no-gutters">
                        <h3 class="text-center bg-danger text-uppercase sectionHeader col-12">LEVEL DETAILS</h3>
                        <div class="col-12 p-4">
                            <form id="levelLayoutForm" class="" action="{{ route('level.store') }}" method="post">
                                @csrf
                                <input id="levelLayoutJSONInput" type="hidden" name="levelLayoutJSON">
                                <input type="text" name="title">title</input>
                                <input type="text" name="description">description</input>
                            </form>
                            <button class="btn btn-primary col-12" type="button" onclick="generateLevelArray()">Make level</button>
                        </div>
                    </div>
                <!-- END ADD LAYOUT DETAILS AND SUBMIT -->
            </section>
        <!-- END LEVEL LAYOUT SECTION -->

        <!-- BANNERS -->
            <!-- BOTTOM BANNER -->
                <div class="row d-none d-sm-block">
                    <div class="col-12">
                        <img class="w-100" src="../images/www/banners/banner-bottom.png" alt="Phat The Cat Banner">
                    </div>
                </div>
            <!-- END BOTTOM BANNER -->

            <!-- BOTTOM BANNER FOR XS -->
                <div class="row d-block d-sm-none">
                    <div class="col-12">
                        <img class="w-100" src="../images/www/banners/banner-bottom-small.png" alt="Phat The Cat Banner">
                    </div>
                </div>
            <!-- END BOTTOM BANNER FOR XS -->
        <!-- END BANNERS -->

    </div>
<!-- END CONTENT -->

@endsection
