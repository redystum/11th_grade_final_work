<link rel="stylesheet" href="./css/footer.css">

<div class="row footer">
  <div class="col-md-12">
    <div class="container">
      <div class="row">
        <div class="col-md-4">&ensp;Contacts: <br><br>
          &ensp;<img src="img/others/telefone.svg" alt="" width="25px">&ensp; Phone: 123 123 123 <br>
          &ensp;<img src="img/others/email.svg" alt="" width="25px">&ensp; Email: public@artisticdesign.com <br>
          <br>
          &ensp;<a href="https://www.instagram.com/csmiguelfatima/" target="_blank" rel="external"><img src="img/others/instagram.svg" alt="" width="25px"></a>
          &ensp;<a href="https://pt-pt.facebook.com/csmiguelfatima/" target="_blank" rel="external"><img src="img/others/facebook.svg" alt="" width="25px"></a>
        </div>
        <div class="col-md-4">Useful links: <br><br>
          <a href="#" rel="internal">Go to top</a> <br>
          <a href="./index.php" rel="internal">Home</a> <br>
          <a href="./products.php?product=0" rel="internal">Products</a> <br>
          <a href="./products.php?product=2" rel="internal">Office Course</a> <br>
          <a href="./products.php?product=1" rel="internal">Adobe Course</a> <br>
          <a href="./products.php?product=3" rel="internal">Autodesk Course</a> <br>
          <a href="./certification.php" rel="internal">Certification</a>
        </div>
        <div class="col-md-4">About us: <br><br>
          <a href="./about_us.php" rel="internal">About Us</a>
        </div>
      </div>
      <br><br>
      <p>&ensp;@ <span id="currentyear"></span> Art Design. All rights reserved.</p>
    </div>
  </div>
</div>

<script>
    var d = new Date();
    var year = d.getFullYear();
    document.getElementById("currentyear").innerHTML = year;
</script>