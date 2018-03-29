@extends('layouts.app')
@section('content')

<!-- JAVASCRIPT -->
<script src="{{ asset('js/script.js') }}" defer></script>

    <div class="container bg-info">

        <!-- LAYOUT SETUP SECTION -->
            <section id="layoutSetupContainer">
                <div class="row no-gutters">
                    <div id="builderButtonContainer" class="col-12">
                        <h3 class="text-center bg-danger text-uppercase sectionHeader">LAYOUT SETTINGS</h3>

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
            <section id="layoutContainer" class="d-none">
                <h3 class="text-center bg-danger text-uppercase sectionHeader">ADJUST LAYOUT</h3>

                <!-- LAYOUT EDITING BUTTONS -->
                    <div class="row no-gutters py-3">
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
                <!-- END LAYOUT EDITING BUTTONS -->

                <!-- TILE PALETTE -->
                    <div class="row no-gutters py-3">
                        <div class="col-12">
                            <h3 class="text-center bg-danger text-uppercase sectionHeader">TILE PALETTE</h3>
                        </div>
                        <!-- TILE PICKER -->
                            <div id="tileTypeSelectors" class="col-12">
                                <!-- DELETING TILE -->
                                <button class="builderButton" value="0">0</button>
                                <!-- PLAYER SPAWN LOCATION -->
                                <button class="builderButton" value="x" style="background-image: url('../images/player-test.png');">X</button>
                                <!-- TILE TYPE BUTTONS WILL BE APPENDED WITH JS AFTER THIS -->
                            </div>
                        <!-- END TILE PICKER -->
                    </div>
                <!-- END TILE PALETTE -->

                <!-- GENERATED GRID CONTAINER -->
                    <div class="row no-gutters py-3">
                        <div class="col-12">
                            <h3 class="text-center bg-danger text-uppercase sectionHeader">LEVEL LAYOUT</h3>
                        </div>
                        <div id="builderLayoutContainer" class="col-12"></div>
                    </div>
                <!-- END GENERATED GRID CONTAINER -->

                <!-- ADD LAYOUT DETAILS AND SUBMIT -->
                    <div class="row no-gutters">
                        <div class="col-12">
                            <h3 class="text-center bg-danger text-uppercase sectionHeader">LEVEL DETAILS</h3>
                        </div>
                        <div class="col-12">
                            <form id="levelLayoutForm" class="" action="{{ route('level.store') }}" method="post">
                                @csrf
                                <input id="levelLayoutJSONInput" type="hidden" name="levelLayoutJSON">
                                <input type="text" name="title">title</input>
                                <input type="text" name="description">description</input>
                            </form>
                        </div>
                        <button class="btn btn-primary col-12" type="button" onclick="generateLevelArray()">Make level</button>
                    </div>
                <!-- END ADD LAYOUT DETAILS AND SUBMIT -->
            </section>
        <!-- END LEVEL LAYOUT SECTION -->

    </div>

@endsection
