<script src="http://madalla.kr/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#imgView").on('change', function(){
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                    $('#View').attr('src', e.target.result);
                }

              reader.readAsDataURL(input.files[0]);
            }
        }


    </script>

    <form id="imgForm">
        <input type='file' id="imgView" />
        <img id="View" src="#" alt="이미지 미리보기" />
    </form>