@extends('layouts.app')
@section('content')

<!-- JAVASCRIPT -->
<script src="{{ asset('js/script.js') }}" defer></script>

    <div class="container">
        <div class="row">
            <div class="col-12">

                CREATE BLADE

                <!-- MAIN CONTAINER -->
                <div id="builderContainer">

                    <!-- BUTTON CONTAINER -->
                    <div id="builderButtonContainer">
                        <!-- FOR FOR SETTING SIZE OF NEW LAYOUT GRID -->
                        <div class="">
                            <h3>LAYOUT SETTINGS</h3>
                            <form id="builderLayout">
                                <input type="number" name="layoutRows" value="">Number of rows</input>
                                <input type="number" name="layoutCols" value="">Number of columns</input>
                                <input type="submit" value="Generate">
                            </form>

                            <div class="">
                                <button type="button" name="button" onclick="addRow('first')">ADD FIRST ROW</button>
                                <button type="button" name="button" onclick="addRow('last')">ADD LAST ROW</button>
                                <button type="button" name="button" onclick="addCol('first')">ADD FIRST COLUMN</button>
                                <button type="button" name="button" onclick="addCol('last')">ADD LAST COLUMN</button>
                            </div>

                            <div class="">
                                <button type="button" name="button" onclick="removeRow('first')">REMOVE FIRST ROW</button>
                                <button type="button" name="button" onclick="removeRow('last')">REMOVE LAST ROW</button>
                                <button type="button" name="button" onclick="removeCol('first')">REMOVE FIRST COLUMN</button>
                                <button type="button" name="button" onclick="removeCol('last')">REMOVE LAST COLUMN</button>
                            </div>
                        </div>

                        <!-- PLACEHOLDER FOR TILE TYPE SELECTOR BUTTONS WHICH ARE ADDED WITH JS -->
                        <div class="">
                            <h3>TILE PALETTE</h3>
                            <div id="tileTypeSelectors">
                                <!-- DELETING TILE -->
                                <button class="builderButton" value="0">0</button>
                                <!-- PLAYER SPAWN LOCATION -->
                                <button class="builderButton" value="x" style="background-image: url('../images/player-test.png');">X</button>

                                <!-- TILE TYPE BUTTONS WILL BE APPENDED WITH JS AFTER THIS -->
                            </div>
                        </div>

                        <!-- BUTTON FOR CREATING LAYOUT ARRAY -->
                        <div>

                            <button type="button" name="button" onclick="generateLevelArray()">Make level</button>

                            <form id="levelLayoutForm" class="" action="{{ route('level.store') }}" method="post">
                                @csrf
                                <input id="levelLayoutJSONInput" type="hidden" name="levelLayoutJSON" value="">
                                <input type="text" name="title" value="">title</input>
                                <input type="text" name="description" value="">description</input>
                            </form>



                        </div>
                    </div>
                    <!-- END BUTTON CONTAINER -->

                    <!-- GENERATED GRID CONTAINER -->
                    <div id="builderLayoutContainer"></div>

                </div>
                <!-- END MAIN CONTAINER -->

            </div>
        </div>
    </div>

@endsection
