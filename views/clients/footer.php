 </div> <br> <br>

 <div class="footer">
  <div class="column">

    <h4>GIỚI THIỆU</h4>
    <ul>
    <li><a href="">Về chúng tôi</a></li> 
    <li><a href="">Liên hệ</a></li>
    <li><a href="">Tìm hiểu trả góp</a></li>
    <li><a href="">Trung tâm trợ giúp</a></li>
    <li><a href="">Xem thêm</a></li>
  </ul>
  </div>
  <div class="column">
    <h4>CHÍNH SÁCH</h4>
    <ul >
    <li><a href="">Chính sách bảo hành</a></li>
    <li><a href="">Chính sách bảo mật</a></li>
    <li><a href="">Chính sách giao hàng</a></li>
    <li><a href="">Chính sách đổi trả</a></li>
    <li><a href="">Xem thêm</a></li>
  </ul>
  </div>
  <div class="column">
    <h4>HỖ TRỢ KHÁCH HÀNG</h4>
    <ul>
      <li><a href="">Câu hỏi thường gặp</a></li>
      <li><a href="">Hướng dẫn mua hàng</a></li>
      <li><a href="">Kiểm tra đơn hàng</a></li>
      <li><a href="">Điều khoản dịch vụ</a></li>
      <li><a href="">Xem thêm</a></li>
    </ul>
  </div>

  <div class="column">
    <h4>ĐỊA CHỈ</h4>
    <div class="payment">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8639311820666!2d105.74468687503176!3d21.03812978061353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1731806098487!5m2!1svi!2s" width="300" height="140" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


  </div>
</div>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

 <script>
  btnSearch = document.getElementById('btnSearch')
  keyword   = document.getElementById('keyword');
  btnSearch.addEventListener('click',function(){
    location.href = "<?= ROOT_URL .'?ctl=search&keyword=' ?>" +keyword.value;
  } );
  keyword.addEventListener('keypress',function(event){
    if(event.key == "Enter"){
      location.href = "<?= ROOT_URL .'?ctl=search&keyword=' ?>" +keyword.value;
      event.preventDefault();
      
    }
  })

 </script>
 </body>
 
 </html>