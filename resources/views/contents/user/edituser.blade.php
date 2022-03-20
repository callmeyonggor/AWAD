<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<h1>Edit User Account (Customer or Employee)</h1>

<form action="" method ="POST">
    @csrf
    <input id="type" type="hidden" value="{{$type}}">
    <input type="hidden" name="id" value="{{$user['id']}}">
    <input type="text" name="email" value="{{$user['email']}}"><br>
    <input type="text" name="password" value="{{$user['password']}}"><br>
    <input type="text" name="first_name" value="{{$user['first_name']}}"><br>
    <input type="text" name="last_name" value="{{$user['last_name']}}"><br>
    <input type="text" name="phone" value="{{$user['phone']}}"><br>
    <div id="options">
        <input type="text" name="department" placeholder="{{$user['department']}}"><br>
        <select name="permission">
            <option value="0">User</option>
            <option value="1">Administrator</option>
        </select><br>
    </div>
    <input type="submit" value="Update">
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