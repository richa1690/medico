<!DOCTYPE html>
<html>
<head>
<title></title>
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<style>


body {
background: #C5E1A5;
}
form {
width: 60%;
margin: 60px auto;
background: #efefef;
padding: 60px 120px 80px 120px;
text-align: center;
-webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
}
label {
display: block;
position: relative;
margin: 40px 0px;
}
.label-txt {
position: absolute;
top: -1.6em;
padding: 10px;
font-family: sans-serif;
font-size: .8em;
letter-spacing: 1px;
color: rgb(120,120,120);
transition: ease .3s;
}
.input {
width: 100%;
padding: 10px;
background: transparent;
border: none;
outline: none;
}

.line-box {
position: relative;
width: 100%;
height: 2px;
background: #BCBCBC;
}

.line {
position: absolute;
width: 0%;
height: 2px;
top: 0px;
left: 50%;
transform: translateX(-50%);
background: #8BC34A;
transition: ease .6s;
}

.input:focus + .line-box .line {
width: 100%;
}

.label-active {
top: -3em;
}

button {
display: inline-block;
padding: 12px 24px;
background: rgb(220,220,220);
font-weight: bold;
color: rgb(120,120,120);
border: none;
outline: none;
border-radius: 3px;
cursor: pointer;
transition: ease .3s;
}

button:hover {
background: #8BC34A;
color: #ffffff;
}

</style>
</head>
<body>
<?php include 'header.php'; ?>
<form>
<label>
<p class="label-txt">ENTER YOUR EMAIL</p>
<input type="text" class="input email" name="email" id="email">
<div class="line-box">
<div class="line"></div>
</div>
</label>
<label>
<p class="label-txt">ENTER YOUR NAME</p>
<input type="text" class="input name" name="name" id="name">
<div class="line-box">
<div class="line"></div>
</div>
</label>
<label>
<p class="label-txt">CONTACT NO.</p>
<input type="text" class="input name" name="contact" id="cn">
<div class="line-box">
<div class="line"></div>
</div>
</label>
<label>
<p class="label-txt">ADHARCARD NO.</p>
<input type="text" class="input name" name="adharnum" id="an">
<div class="line-box">
<div class="line"></div>
</div>
</label>
<label>
<p class="label-txt">CITY</p>
<input type="text" class="input name" name="city" id="city">
<div class="line-box">
<div class="line"></div>
</div>
</label>
<label>

<select name="item" class="input name"><option value="select your choice" disabled>---Select your choice---</option><option value="plasma">Plasma</option><option value="oxygen">Oxygen Cylinder</option></select>
<div class="line-box">
<div class="line"></div>
</div>
</label>
<label>
<p class="label-txt">ENTER YOUR PASSWORD</p>
<input type="password" class="input password" name="password" id="password">
<div class="line-box">
<div class="line"></div>
</div>
</label>
<button type="submit" id="submit" name="submit">submit</button>
</form>

<?php include 'footer.php';?>	
<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

     
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>

<script>
$(document).ready(function(){
$('#submit').click(function(e){
e.preventDefault();
$.ajax({
method:'POST',
url:'helper.php',
data:$("form").serialize(),
success:function(data)
{
	debugger;
	if(data==1)
	{
		console.log(data);
	}
// window.location.href = 'login.php';
}
})

});
})

</script>