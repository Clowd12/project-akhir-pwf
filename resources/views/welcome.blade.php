<h1>halaman utama
</h1>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" class="btn btn-danger" value="Logout">
</form>
