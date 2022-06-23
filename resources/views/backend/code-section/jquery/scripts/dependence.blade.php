<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#country-dd').on('change', function () {
            var idCountry = this.value;
            $("#district-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-districts')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#district-dd').html('<option value="">Select district</option>');
                    $.each(result.districts, function (key, value) {
                        $("#district-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        });
        $('#district-dd').on('change', function () {
            var idDistrict = this.value;
            $("#upazila-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-upazilas')}}",
                type: "POST",
                data: {
                    district_id: idDistrict,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#upazila-dd').html('<option value="">Select Upazila</option>');
                    $.each(res.upazilas, function (key, value) {
                        $("#upazila-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>