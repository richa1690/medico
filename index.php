<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>   
<?php include 'header.php';?>

<main id="main">

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Medico</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a  class="btn btn-primary my-2" id="donor">Donor</a>
          <a href="view.php" class="btn btn-secondary my-2">Reciever</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
<h1 style="text-align: center;"><b>OUR BRAVERS</b></h1>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <?php  

        include 'dbcon.php';
  $x =   new userdata();
  $y =   $x->braveusers();

foreach ($y as $key => $value) {?>
                <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?= $value[1];?></text></svg>

            <div class="card-body">
              <p class="card-text">One of our brave user rom city <?= $value[2]?>.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
 
  
      </div>
    </div>
  </div>

</main>

<?php include 'footer.php';?>

<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      
  

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>


<script>
$(document).ready(function(){
   function ChangeUrl(page, url) {
        if (typeof (history.pushState) != "undefined") {
            var obj = { Page: page, Url: url };
            history.pushState(obj, obj.Page, obj.Url);
        } else {
            alert("Browser does not support HTML5.");
        }
    }
$('#donor').click(function(e){
e.preventDefault();
$.ajax({
method:'POST',
url:'helper.php',
data:{
	'value':'form'
},
success:function(data)
{
	 ChangeUrl('medico', 'form.php');
	document.getElementById('main').innerHTML = data;
	$('#submit').click(function(e){
		e.preventDefault();
		$.ajax({
		method:'POST',
		url:'helper.php',
		data:$("form").serialize(),
		success:function(data)
		{
			if(data==1)
			{
				alert('register successfuly');
			}
		console.log(data);
		}
	})

});
}
})

});




})
</script>