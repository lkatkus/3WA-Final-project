<div class="col-4 levelCard">
    <img class="w-100" src="../images/www/placeholder-thumbnail.svg" alt="Level thumbnail">
    <a href="{{ route('level.show', $level->id )}}">
        <div class="levelCardTag d-flex justify-content-center align-items-center @if($type == 'featured') bg-warning @else bg-danger @endif">
            <div>
                <p>Title: {{{ $level->title }}}</p>
                <p>By: {{{ $level->user->name }}}</p>
                <p>Submited on: {{{ $level->created_at }}}</p>
            </div>
        </div>
    </a>
</div>
