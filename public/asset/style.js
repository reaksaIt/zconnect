$(document).ready(function() {
    $(window).on("load", function() {
        $('.loader').fadeOut(1000);
        $(function() {
            $('.img').Lazy({
                placeholder: "data:image/gif;base64,R0lGODlhEALAPQAPzl5uLr9Nrl8e7...",
                scrollDirection: 'vertical',
                effect: 'fadeIn',
                visibleOnly: true,
                onError: function(element) {
                    console.log('error loading ' + element.data('src'));
                }
            });
        });



        $('.slide').owlCarousel({
            nav: false,
            loop: true,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 10000,
            lazyLoad: true,
            items: 1,
            smartSpeed: 1000,

            // responsive: {
            //     0: {
            //         items: 1,
            //         nav: true
            //     },
            //     600: {
            //         items: 1,
            //         nav: false
            //     },
            //     1000: {
            //         items: 1,
            //         nav: true,
            //         loop: false
            //     }
            // }
        });

        $("input[type='checkbox']").change(function() {

            var camerapexel = [];

            $("input:checkbox:checked").map(function() {
                camerapexel.push($(this).val());
            });
            var html = '';
            var x = 1;
            for (i = 0; i < camerapexel.length; i++) {
                html += '<tr>';
                html += '<td>' + x++ + '</td>';
                html += '<td>' + camerapexel[i] + '</td>';
                html += '<td>';
                html += '<input type="number" name="cameraAmount[]" id="cameraAmount" class="form-control" placeholder="Amount Camera">'
                html += '</td>';
                html += '<td>';
                html += '<div class="input-group"><input type="number" name="cableLength[]" id="cableLength" class="form-control" placeholder="AmountCamera">';
                html += '<div class="input-group-append" ><span class="input-group-text" > m </span></div>';
                html += '</div></td>';
                html += '<td>';
                html += '<textarea name="remark[]" id="remark" rows="3" class="form-control" placeholder="Remark"></textarea>';
                html += '</td>';
                html + '</tr>';
            }
            $('#mylist').html(html);

        });
    });
});