<!-- Footer -->

<footer class="footer">
  <div class="inner-footer">
      <div class="row d-flex justify-content-center">
          <div class="footer-col text-center">
              <img class="footlog" src="./images/Logo.png">
          </div>
          <div class="footer-col">
              <h5>Contact</h5>
              <ul class="nav">
                <li>thriftonicnepal@gmail.com</li>
                <li>Number:9841******</li>
              </ul>
          </div>

          <div class="footer-col">
              <h5>About Us</h5>
              <ul class="mx-0 px-0">
                <li class=""><a href="#">About Us</a></li>
                <li class=""><a href="#">Shipping</a></li>
                <li><a href="#">Privacy policies</a></li>
                <li><a href="#">Terms & Conditions</a></li>
              </ul>
          </div>

          <div class="footer-col">
              <h5>Social links</h5>
              <div class="social-links">
                  <a href="#" class=""><i class="fab fa-facebook-f text-green"></i></a>
                  <a href="#"><i class="fab fa-twitter text-green"></i></a>
                  <a href="#"><i class="fab fa-instagram text-green"></i></a>
              </div>
          </div>
      </div>
  </div>
  <div class="outer-footer">
      Copyright &copy; 2023 Thriftonic, Inc. All Rights Reserved
  </div>

</footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script>
    /*
    
    let cartLocal = localStorage.getItem('thrift_cart');
    var counter = document.getElementById('count_cart');
    // normal users cart
    let checkCart = cartLocal ? JSON.parse(cartLocal) : [];
    totalCart()

    // window.addEventListener('load', function(){
        var product = document.getElementById('add_to_cart');
        product.addEventListener('click', function(event){
            // get product id
            let cart_id = this.getAttribute('data-product-id');
            if(checkCart.length != 0 && JSON.parse(cartLocal).includes(cart_id)){
                alert('Item already added to the cart!');
                return false;
            }
            checkCart.push(cart_id)
            
            localStorage.setItem('thrift_cart', JSON.stringify(checkCart));

            // show cart added message
            document.getElementById('cart_msg').innerHTML = "Item is added to cart";
            totalCart()
        });
    // });
        
    function totalCart(){
        total_cart = checkCart.length;
        // add cart counter
        counter.innerHTML = total_cart;
    }
    // console.info(JSON.parse(cartLocal))

    //online cart
    var cart_now = document.getElementById('cart_now');
    cart_now.addEventListener('click', function(){
        $.ajax({
            url: 'add_cart_online.php',
            type: 'post',
            data: {cart_now},
            success: function(res){
                
            },
            error: function(err){

            }
        })
    })
    */
  </script>
  </body>
</html>