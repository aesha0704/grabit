<script src="{{asset('assets/front/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/front/js/tether.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/animsition.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.isotope.min.js')}}"></script>
<script src="{{asset('assets/front/js/headroom.js')}}"></script>
<script src="{{asset('assets/front/js/foodpicky.min.js')}}"></script>


<script>
    $('.btn-minuse').on('click', function(){            $(this).parent().siblings('input').val(parseInt($(this).parent().siblings('input').val()) - 1)
    })

    $('.btn-pluss').on('click', function(){            $(this).parent().siblings('input').val(parseInt($(this).parent().siblings('input').val()) + 1)
    })
</script>
