<!DOCTYPE html>
<head>
<title></title>
</head>
<body>
    <h2>Buat Account Baru</h2>
    <h3>Sign Up Form</h3>
    <form action="{{ route('welcome1') }}">
        <p>First Name:</p>
        <input type="text" name="First Name">
        <p>Last Name:</p>
        <input type="text" name="Last Name">

        <p>Gender</p>
        <p><input type="radio" name="Gender" Value="Male">Male</p>
        <p><input type="radio" name="Gender" Value="Female">Female</p>

        <p>Nationality</p>
        <select name="Nationality">
            <option value="Indonesia">Indonesia</option>
            <option value="Korea">Korea</option>
            <option value="China">China</option>
        </select>

        <p>Language Spoken</p>
        <p><input type="checkbox" name="Language Spoken" Value="Bahasa Indonesia">Bahasa Indonesia</p>
        <p><input type="checkbox" name="Language Spoken" Value="English">English</p>
        <p><input type="checkbox" name="Language Spoken" Value="Other">Other</p>

        <p>Bio</p>
        <textarea name="Bio" id="" cols="30" rows="10"></textarea>
        <br>
         <button type="submit">Sign Up</button> 
    </form>
       <!-- <button type><a href="welcome1">Sign Up</a></button>  -->
</body>
</html>