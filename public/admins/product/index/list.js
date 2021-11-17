function actionDelete(event){
    event.preventDefault(); // tat action tu dong nay ra message
    let urlRequest = $(this).data('url');
    let that = $(this); // dung bien that de tro vao trong callback success

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            // call AJAX de xoa ban ghi trong database
            $.ajax({
               type: 'GET',
               url: urlRequest,
                success: function (data){
                    if (data.code == 200){
                        that.parent().parent().remove();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                },
                error: function () {

                }
            });

        }
    })
}

$(function (){
    $(document).on('click', '.action_delete', actionDelete);

});
