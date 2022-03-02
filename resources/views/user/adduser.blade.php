<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<h1>Add User Account (Customer or Employee)</h1>

<form action="" Method="POST">
    @csrf
    <div>
        <input id="type" type="hidden" value="{{$type}}">
        <input type="text" name="email" placeholder="sample@email.com"><br>
        <input type="text" name="password" placeholder="Password"><br>
        <input type="text" name="first_name" placeholder="First Name"><br>
        <input type="text" name="last_name" placeholder="Last Name"><br>
        <input type="text" name="phone" placeholder="Phone"><br>
        <div id="options">
            <input type="text" name="department" placeholder="Department"><br>
            <select name="permission">
                <option value="0">User</option>
                <option value="1">Administrator</option>
            </select><br>
        </div>
        <input type="submit" value="submit">
    </div>
</form>

<script>
    $(function () {
        if ($('#type').val() == 'customer') {
            $('#options').hide();
        } else {
            $('#options').show();
        }
    });
</script>