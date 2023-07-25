<!-- PARA EL NAV----------------------------------------------->

<style>
	body{
		background-color: white;
	}
	
  .navbar {
    background-color: black;
    border-radius: 0;
    border: none;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .navbar-nav li a {
    color: white;
    transition: color 0.3s;
  }

   a {
    color: aliceblue !important;
	font-size: 15px;
  }

  .navbar::after {
    content: "";
    display: block;
    height: 10px;
    width: 100%;
    background-color: purple;
  }

  

</style>

<nav class="navbar navbar-default" >
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">Tienda de Disfraces J' Luis</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./">INICIO </a></li>
        <li><a href="index.php">DISFRAZ</a></li>
        <li><a href="menuAlquiler.php">ALQUILER</a></li>
        <li><a href="./">CLIENTES</a></li>
      </ul>
    </div>
  </div>
</nav>