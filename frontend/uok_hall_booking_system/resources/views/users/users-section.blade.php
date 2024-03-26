<!-- users-section.blade.php -->
<section  class="pt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
    <h2 >All Users</h2>
    <ul class="list-group">
        @foreach($users as $user)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $user->user_name }}
                <form method="POST" action="{{ route('users.destroy', $user->user_id) }}" class="ml-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
            </div>
            </div>
            </div>
</section>
