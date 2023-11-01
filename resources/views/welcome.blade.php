halaman utama
<form action="{{ route('logout') }}" method="GET">
    @csrf
    <input type="submit" class="btn btn-danger" value="Logout">
</form>
