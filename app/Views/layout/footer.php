<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $('#tombolSimpan').on('click', (e) => {
        e.preventDefault();


        let $name = $('#name').val();
        let $email = $('#email').val();
        let $gender = $('#gender').val();
        let $role = $('#jabatan').val();

        $.ajax({
            url: '<?php echo site_url('home/simpan') ?>',
            type: 'POST',
            data: {
                name: $name,
                email: $email,
                gender: $gender,
                role: $role,
            },
            success: (hasil) => {
                let $obj = $.parseJSON(hasil);

                if ($obj.sukses === false) {
                    $('.success').hide();
                    $('.error').show();
                    $('.error').html($obj.error);
                } else {
                    $('.error').hide();
                    $('.success').show();
                    $('.success').html($obj.sukses);
                }
            }
        });

    });
</script>
</body>

</html>