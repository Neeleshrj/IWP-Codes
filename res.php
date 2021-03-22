<html>

<body>
    <center>


        <div id="inputbox">
            <h1>Reserve Train</h1><br>
            <div>
                <form action="display.php" method="post">


                    <label> Passenger Name: </label>
                    <input type="text" name="passname" required>
                    <br><br>

                    <label> From </label>
                    <input type="text" name="from" required>
                    <br><br>

                    <label> To </label>
                    <input type="text" name="to" required>
                    <br><br>

                    <label> Class </label>
                    <input type="text" name="class" id="fname" required>
                    <br><br>

                    <label> Number of seats required </label>
                    <input type="text" name="number" id="lname" required>
                    <br><br>

                    <label> Train number </label>
                    <input type="text" name="tnumber" id="fname" required>
                    <br><br>

                    <label> Date of Travelling </label>
                    <input type="date" name="dateoftrav" id="date">
                    <br><br>

                    <input type="submit" name="submit" value="Submit">
                    &nbsp;&nbsp;
                    <input type="submit" name="reset" value="Clear">
                </form>
            </div>
        </div>
    </center>
</body>


</html>

<style>
#inputbox {
    width: 40%;
    padding: 50px;
    font-family: 'Courier New';

}

label {
    display: inline-block;
    width: 150px;
    text-align: right;
    padding-right: 20px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"] {
    width: 400px;
    padding: 12px 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>