@extends('layouts.app')
@section('content')

    <!-- JAVASCRIPT -->
        <!-- GAME ENGINE -->
        <script src="{{ asset('js/game/start.js') }}" defer></script>
        <script src="{{ asset('js/game/player/player.setup.js') }}" defer></script>
        <script src="{{ asset('js/game/player/player.helpers.js') }}" defer></script>
        <script src="{{ asset('js/game/player/player.draw.js') }}" defer></script>
        <script src="{{ asset('js/game/player/player.checkPosition.js') }}" defer></script>
        <script src="{{ asset('js/game/player/player.controls.js') }}" defer></script>
        <script src="{{ asset('js/game/player/player.move.js') }}" defer></script>

        <!-- FOR SETTING CHOSEN LAYOUT -->
        <script type="text/javascript">
            sceneLayout = {!! $level -> layout !!};
        </script>
    <!-- END JAVASCRIPT -->

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div>
                    <button class="btn btn-primary" type="button" onclick="startGame()">Start game</button>
                </div>

                <div id="canvasContainer">
                    <canvas id="sceneCanvas"></canvas>
                </div>

            </div>
        </div>
    </div>

@endsection
