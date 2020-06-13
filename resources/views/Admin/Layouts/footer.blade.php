












<!---------------------------footer code------------------------------------------------------->
<!--------------------------------------------------------------------------------------------->


















<script src="{{URL::to('/')}}/Assets/js/jquery.js"></script>
<script src="{{URL::to('/')}}/Assets/js/popper.min.js"></script>
<script src="{{URL::to('/')}}/Assets/bootstrap4/js/bootstrap.min.js"></script>
<!--<script src="https://cdn.rtlcss.com/bootstrap/v4.0.0/js/bootstrap.min.js" integrity="sha384-54+cucJ4QbVb99v8dcttx/0JRx4FHMmhOWi4W+xrXpKcsKQodCBwAvu3xxkZAwsH" crossorigin="anonymous"></script>-->

<script src="{{URL::to('/')}}/Assets/js/script.js"></script>
<script src="{{URL::to('/')}}/Assets/js/all.min.js"></script>

<script src="{{URL::to('/')}}/Assets/js/bootstrap-select.min.js"></script>




<!-- include Owl Carousel plugin js-->


<script src="{{URL::to('/')}}/Assets/js/wow.js"></script>
<script>
    new WOW().init();
</script>
<script type="text/javascript" src="{{URL::to('/')}}/Assets/js/sweetAlert/sweetalert.js"></script>




<script>
    function printData()
    {
        $('#printTable').show();
        var divToPrint=document.getElementById("printTable");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        $('#printTable').hide();
        newWin.print();
        newWin.close();

    }

    $('#print_table').on('click',function(){
        printData();
    })
</script>


@if(Session::get('error') != '')
    <script type="text/javascript">
        Swal.fire({
            title: 'خطاء',
            text: '{{ Session::get("error") }}',
            icon: 'error',
            confirmButtonText: 'حسنا'
        });
        {{ Session::forget('error') }}
    </script>
@endif
<script>
    function showConfirmMessage(url) {
        Swal.fire({
            icon: 'warning',
            title: "هل أنت متأكد؟",
            text: "لن تستطيع إستعادة تلك البيانات أو أى بيانات مرتبطة بها مرةdfcf أخرى!",
            showCancelButton: true,
            confirmButtonText: "نعم, احذف البيانات!",
            cancelButtonText: "لا, الغِ الأمر!",
            confirmButtonColor: "#DD6B55",
            cancelButtonColor: '#d33',
            showLoaderOnConfirm: true,
            preConfirm: function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        method   : 'get',
                        url      : url,
                        dataType : 'json',
                        success : function(data){
                            if(data != "false"){
                                Swal.fire(
                                    'تم الحذف!',
                                    'تم حذف البيانات بنجاح.',
                                    'success'
                                )
                                $('#row_'+data).fadeOut();
                                $('#row_'+data).remove();
                            }else{
                                Swal.fire(
                                    'لم يتم الحذف!',
                                    'عذراً يوجد خطأ ما فلم تتم عملية الحذف بنجاح.',
                                    'error'
                                )
                            }
                        }
                    })
                } else if (
                    data.dismiss === Swal.DismissReason.cancel
                ) {
                    Swal.fire("تم الإلغاء", "لا تقلق كافة بياناتك فى أمان ولم يتم حذفها بعد :)", "error");
                }
            },
        });
    }

</script>

<script type="text/javascript">
    $('#datetimepicker1').datetimepicker({
        defaultDate: new Date(),
        format: 'YYYY-MM-DD H:mm:ss',
        sideBySide: true
    });

</script>
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
</body>
</html>
