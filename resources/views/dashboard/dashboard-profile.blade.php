<div class="dashboard-boxes">
    <div class="box">
        <i class="fa-solid fa-thumbs-up"></i>
        Total Likes
        <span>20</span>
    </div>
    <div class="box">
        <i class="fa-solid fa-clock"></i>
        Member since
        <span>11:30</span>
    </div>
    <div class="box">
        <i class="fa-solid fa-comment"></i>
        Comments
        <span>5</span>
    </div>
</div>

{{--<div class=""--}}
<div class="profile-data">
<div class="table-wrapper">
    <table>
        <tr>
            <td>Username:</td>
            <td><textarea name="username" class="inline-textinput editable-textarea" data-toggle-target="username" disabled>{{$user->name}}</textarea></td>
            <td>
                <button type="submit" class="btn btn-quarternary edit-button" data-toggle-target="username"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><textarea name="email" class="inline-textinput editable-textarea" data-toggle-target="email" disabled>{{$user->email}}</textarea></td>
            <td>
                <button type="submit" class="btn btn-quarternary edit-button" data-toggle-target="email"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
        </tr>
    </table>
</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all edit buttons
        debugger
        var buttons = document.querySelectorAll('.edit-button');

        // Function to toggle readonly state
        function toggleReadonly(targetId) {
            var textarea = document.querySelector(`[name="${targetId}"]`);
            if (textarea.readOnly) {
                textarea.removeAttribute('readonly');
            } else {
                textarea.setAttribute('readonly', '');
            }
        }

        // Add click event listeners to each button
        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the target ID from the button's data attribute
                var targetId = button.getAttribute('data-toggle-target');
                // Toggle the readonly state for the associated textarea
                toggleReadonly(targetId);
            });
        });
    });
</script>
