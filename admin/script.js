$(document).ready(function () {
   $('.btn_delete').on('click',function () {
       WRN_PROFILE_DELETE = "Are you sure you want to delete this subcategory?";
       var id=$(this).data("id3");
       var msg=$('#message');
       var check = confirm(WRN_PROFILE_DELETE);
       if(check == true) {
           $.ajax({
               type: "POST",
               url: "deleteSubcategory.php",
               data: {
                   'id': id
               },
               success: function (response) {
                   msg.html(response);
                   setTimeout(function () {
                       msg.fadeOut();
                   }, 2000);
                   $('table tr').filter("[data-row-id='" + id + "']").remove();
               }
           });
       }

   });
    $('.btn_delete_product').on('click',function () {
        WRN_PROFILE_DELETE = "Are you sure you want to delete this product?";
        var id=$(this).data("id");
        var msg=$('#message');
        var check = confirm(WRN_PROFILE_DELETE);
        if(check == true) {
            $.ajax({
                type: "POST",
                url: "deleteProduct.php",
                data: {
                    'id': id
                },
                success: function (response) {
                    msg.html(response);
                    setTimeout(function () {
                        msg.fadeOut();
                    }, 2000);
                    $('table tr').filter("[data-row-id='" + id + "']").remove();
                }
            });
        }

    });
    $('.btn_delete1').on('click',function () {
        WRN_PROFILE_DELETE = "Are you sure you want to delete this category?";
        var id=$(this).data("id4");
        var msg=$('#message');
        var check = confirm(WRN_PROFILE_DELETE);
        if(check == true) {
            $.ajax({
                type: "POST",
                url: "deleteCategory.php",
                data: {
                    'catId': id
                },
                success: function (response) {
                    msg.html(response);
                    setTimeout(function () {
                        msg.fadeOut();
                    }, 2000);
                    $('table tr').filter("[data-row-id='" + id + "']").remove();
                }
            });
        }

    });
    $('#insertCart').on('click',function (e) {
        var category=$('#category').val();
        e.preventDefault();
        var msg=$('#message');
        if(category!='' && category!=null) {
            $.ajax({
                type: "POST",
                url: "insert_new_category.php",
                data: {
                    'category': category
                },
                success: function (response) {
                    msg.html(response);
                    setTimeout(function () {
                        msg.fadeOut();
                    }, 2000);
                }
            });
        }else {
           msg.html("<span class='btn btn-danger'>Enter category Name</span>");
            setTimeout(function () {
                msg.fadeOut();
            }, 2000);
        }
    });
    $('#addsubcat').on('click',function (e) {
        var subcat_name=$('#subcat_name').val();
        var catId=$('#catId').val();
        e.preventDefault();
        var msg=$('#message');
        if(subcat_name!='' && subcat_name!=null) {
            $.ajax({
                type: "POST",
                url: "insert_new_sub_category.php",
                data: {
                    'subcat_name': subcat_name,
                    'catId': catId
                },
                success: function (response) {
                    msg.html(response);
                    setTimeout(function () {
                        msg.fadeOut();
                    }, 2000);
                }
            });
        }else {
            msg.html("<span class='btn btn-danger'>Enter Subcategory Name</span>");
            setTimeout(function () {
                msg.fadeOut();
            }, 2000);
        }
    });
    $('#product_cat').on('change',function () {
        var product_cat=$('#product_cat').val();
        $.ajax({
            url:'insert_product.php',
            type:'json',
            method:'GET',
            data:{
                product_cat:product_cat
            },success:function (response) {
                var result=$.parseJSON(response);
                var string='';
                if(result.length==0){
                    string += "<option>No Subcategory associated with Category</option>";
                }else {
                    $.each(result, function (key, value) {
                        string += "<option value='+"+value['subcat_id']+"+'>"+ value['subcat_title'] + "</option>";
                    });
                }
                $('#product_subcat').html(string);
            }
        });

    });
    $('#insert_product').on('click',function (e) {
        e.preventDefault();
        var form=$('#product_form');
        var msg=$('#message');
        var error=$('#error');
        var product_name=$('#product_name').val();
        var product_cat=$('#product_cat').val();
        var product_subcat=$('#product_subcat').val();
        var product_price=$('#product_price').val();
        var product_desc=$('#product_desc').val();
        var formData = new FormData(form[0]);
        if(product_cat=='' || product_name=='' || product_subcat=='' || product_price=='' || product_desc==''){
            error.html('<span class="btn btn-danger">All fields must contain data</span>');
            setTimeout(function () {
                error.fadeOut();
            }, 2000);
        }else {
            $.ajax(
                {
                    url: 'insert_product.php',
                    method: 'POST',
                    dataType: 'text',
                    enctype: 'multipart/form-data',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function (response) {
                        msg.html(response);
                        setTimeout(function () {
                            msg.fadeOut();
                        }, 2000);
                    }
                }
            )
        }
    });
    $('#update_product').on('click',function (e) {
        e.preventDefault();
        var form=$('#product_form');
        var msg=$('#message');
        var product_name=$('#product_name').val();
        var product_cat=$('#product_cat').val();
        var product_subcat=$('#product_subcat').val();
        var product_price=$('#product_price').val();
        var product_desc=$('#product_desc').val();
        var formData = new FormData(form[0]);
        if(product_cat=='' || product_name=='' || product_subcat=='' || product_price=='' || product_desc==''){

        }else {
            $.ajax(
                {
                    url: 'editproduct.php',
                    method: 'POST',
                    dataType: 'text',
                    enctype: 'multipart/form-data',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function (response) {
                        msg.html(response);
                        setTimeout(function () {
                            msg.fadeOut();
                        }, 2000);
                    }
                }
            )
        }
    });
    $('#categoryForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            category: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply Category Name'
                    }
                }
            }
        }
    });
    $('#subcategoryForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            subcat_name: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply Subcategory Name'
                    }
                }
            },
            catId: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please Select Category'
                    }
                }
            }
        }
    });
    $('#product_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            product_name: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply product Name'
                    }
                }
            },
            product_cat: {
                validators: {
                    notEmpty: {
                        message: 'Please Select product Category'
                    }
                }
            },
            product_subcat: {
                validators: {
                    notEmpty: {
                        message: 'Please Select product Sub Category'
                    }
                }
            },
            product_price: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please Select product price'
                    }
                }
            },
            product_image: {
                validators: {
                    notEmpty: {
                        message: 'Please Select product Image'
                    }
                }
            },
            product_desc: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please Select product Description'
                    }
                }
            }
        }
    });
});