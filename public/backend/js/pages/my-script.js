$(document).on("change", "#customFile.file-image", function () {
    $this = $(this)
    $this.parent(".custom-file").next(".preview-image.new").empty()
    $this.closest(".form-group").find(".preview-image.old").show()
    for (let i = 0; i < this.files.length; ++i) {
      let filereader = new FileReader()
      let $img = jQuery.parseHTML(
        "<img src='' style='display:block;margin:10px auto 0;width: auto;height: 150px;object-fit:cover;border:1px solid #3699ff;border-radius:5px;'>"
      );
      filereader.onload = function () {
        $img[0].src = this.result
      }
      filereader.readAsDataURL(this.files[i])
      $this.parent(".custom-file").next(".preview-image.new").append($img)
      $this.closest(".form-group").find(".preview-image.old").hide()
    }
  })

  function ChangeToSlug(title)
{
    var slug;
 
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    return slug;
}

$(document).ready(function(){

  setTimeout(function(){
      $('.pre-loading').fadeOut(400)
      $('html, body').css({
          overflow: 'auto',
          height: 'auto'
      })
  }, 1000)

  $('.delete-item').click(function(e){
    e.preventDefault()
    $this = $(this)
    let form = $this.attr('form')
    return Swal.fire({
      title: 'Bạn có chắc chắn muốn xóa?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Vâng, chắc chắn!',
      cancelButtonText: 'Hủy'
    }).then((result) => {
      if (result.isConfirmed) {
        $this.closest('form').submit()
        if(form) $('#'+form).submit()
      }
    })
  })
})

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
  }
})

function salert(type, message){
  Swal.fire({
      position: 'top-right',
      icon: type,
      title: message,
      showConfirmButton: false,
      timer: 1300,
      timerProgressBar: true
  })
}