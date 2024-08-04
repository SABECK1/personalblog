<form action="{{route("password.update")}}" method="POST" id="editProfileForm">
    @csrf
    @method('PUT')
   <div class="form-wrapper">
       <label for="current_password">Old Password:</label>
       <input type="password" id="current_password" name="current_password" required>
       <label for="password">New Password:</label>
       <input type="password" id="password" name="password" required>
       <label for="password_confirmation">Confirm New Password:</label>
       <input type="password" id="password_confirmation" name="password_confirmation" required>
       <button type="submit" class="btn btn-primary">Change Password</button>
   </div>
</form>
<script type="module" src="{{ asset('/js/tabcontroller.js') }}"></script>
