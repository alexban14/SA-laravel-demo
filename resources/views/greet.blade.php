<h1>Hi there, <i>{{ $name }}</i>!</h1>

@if($user->isAdmin)
    <p>Welcome, Admin!</p>
@else
    <p>Welcome, User!</p>
@endif

<form action="/user/1" method="POST">
    @method('PUT')
    @csrf()
    <!-- Other form fields -->
</form>

<!-- Usage in other views -->
<x-alert type="success">
    Your changes have been saved.
</x-alert>

@if(session('success'))
	<div class="alert alert-success">
    	{{ session('success') }}
	</div>
@endif
