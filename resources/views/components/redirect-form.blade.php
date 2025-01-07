<form action="{{ route('dynamic.redirect') }}" method="POST">
    @csrf
    <input type="hidden" name="type" value="{{ $type }}">
    <input type="hidden" name="id" value="{{ $id }}">
    <button type="submit" class="btn btn-primary">
        {{ $slot ?? 'Go to ' . ucfirst($type) }}
    </button>
</form>
