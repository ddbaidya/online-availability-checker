@if ($errors->any())
    <div class="row">
        <div class="col-12">
            <ul>
                @forelse ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @empty
                @endforelse
            </ul>
        </div>
    </div>
@endif
