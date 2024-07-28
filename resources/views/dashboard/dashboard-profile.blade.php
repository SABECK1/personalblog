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

<form action="{{route("profile.update")}}" method="POST" id="editProfileForm">
    @csrf
    @method('PATCH')
<div class="profile-data">
<div class="table-wrapper">
    <table>
        <tr>
            <td><label for="name">Username:</label></td>
            <td>
                <input type="text" id="test" name="name" class="inline-textinput editable-textarea" data-toggle-target="name" disabled value="{{$user->name}}">
            </td>
            <td>
                <button type="submit" class="btn btn-quarternary edit-button" data-toggle-target="name"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
        </tr>
        <tr>
            <td><label for="email">Email:</label></td>
            <td>
                <input type="text" id="email" name="email" class="inline-textinput editable-textarea" data-toggle-target="email" disabled value="{{$user->email}}">
            </td>
            <td>
                <button type="submit" class="btn btn-quarternary edit-button" data-toggle-target="email"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
        </tr>
    </table>
</div>
</div>
</form>
<script type="module" src="{{ asset('/js/tabcontroller.js') }}"></script>
