$(document).ready(function (e) {
    $('#publish').on('click',function () {
        var productId=$('#productId').val();
        var userId=$('#userId').val();
        var message=$('#message').val();
        var msg=$('#msg');
        var inputrate=$('#rate').text();
        $.ajax({
            url:'details.php',
            dataType:'text',
            method:'POST',
            data:{
                productId:productId,
                userId:userId,
                inputrate:inputrate,
                message:message
            },success:function (response) {
                var userId=$('#userId').val();
                var result=$.parseJSON(response);
                var string='';
                if(result.length==0){
                    string += "<h3>No Comments To display</h3>";
                }else {
                    $.each(result, function (key, value) {
                        if(userId==value['userId']){
                            string += "<li class='list-group-item'>"+ value['message'] + "</li>";
                        }else {
                            string += "<li class='list-group-item list-group-item-success'>"+ value['message'] + "</li>";
                        }
                    });
                }
                $('#comments').html(string);
            }
        });
    });
    $('#publish').on('click',function () {
        var average=$('#average');
        var productId=$('#productId').val();
        $.ajax({
            url:'averagerate.php',
            dataType:'text',
            method:'GET',
            data:{
                productId:productId,
            },success:function (response) {
                $('#average').html(getStars(response));
            }
        });
    });
    var average=$('#average');
    var productId=$('#productId').val();
    average.load("averagerate.php?productId="+productId,function (response) {
        // average.html(response);
        $('#average').html(getStars(response));
    });
    // $("#stars").html(getStars(resp));
    function getStars(rating) {

  // Round to nearest half
  rating = Math.round(rating * 2) / 2;
  let output = [];

  // Append all the filled whole stars
  for (var i = rating; i >= 1; i--)
    output.push('<i class="fa fa-star" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  // If there is a half a star, append it
  if (i == .5) output.push('<i class="fa fa-star-half-o" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  // Fill the empty stars
  for (let i = (5 - rating); i >= 1; i--)
    output.push('<i class="fa fa-star-o" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  return output.join('');

}
    var com=$('#comments');
    var productId=$('#productId').val();
    var userId=$('#userId').val();
    com.load("comment.php?details="+productId,function (response) {
            var result=$.parseJSON(response);
            var string='';
            if(result.length==0){
                string += "<h3>No Comments To display</h3>";
            }else {
                $.each(result, function (key, value) {
                    if(userId==value['userId']){
                        string += "<li class='list-group-item'>"+ value['message'] + "</li>";
                    }else {
                        string += "<li class='list-group-item list-group-item-success'>"+ value['message'] + "</li>";
                    }
                });
            }
            $('#comments').html(string);
        });
    $('#signupForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fname: {
                validators: {
                    stringLength: {
                        min: 2,
                        message: 'The first name must be more than 2 characters long'

                    },
                    notEmpty: {
                        message: 'Please supply Company Name'
                    },
                    regexp: {
                        enabled: false,
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'Last name can only consist of alphabetical, number, and space'
                    }
                }
            },
            lname: {
                validators: {
                    stringLength: {
                        min: 2,
                        message: 'The last name must be more than 2 characters long'
                    },
                    notEmpty: {
                        message: 'Please supply Address'
                    },
                    regexp: {
                        enabled: false,
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'Last name can only consist of alphabetical, number, and space'
                    }
                }
            },
            mobile: {
                validators: {
                    digits: {
                        message: 'The phone number can contain digits only'
                    },
                    notEmpty: {
                        message: 'Please supply Phone number'
                    },
                    phone: {
                        country: 'KENYA',
                        message: 'The phone number is not valid'
                    },
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'phone number must be 10 or 12 characters long'
                    }
                }
            },
            idno: {
                validators: {
                    digits: {
                        message: 'The id  number can contain digits only'
                    },
                    notEmpty: {
                        message: 'Please supply ID number'
                    },
                    stringLength: {
                        min: 7,
                        max: 8,
                        message: 'ID number must be 7 or 8 characters long'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            residence: {
                validators: {
                    notEmpty: {
                        message: 'The residence is required and cannot be empty'
                    },
                    regexp: {
                        enabled: false,
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'residence can only consist of alphabetical, number, and space'
                    },
                    stringLength: {
                        min: 2,
                        message: 'The residence must be more than 2 characters long'
                    },
                }
            },
            pwd: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must have at least 8 characters'
                    }
                }
            },
            cpwd: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must have at least 8 characters'
                    },
                    identical: {
                        field: 'pwd',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });
});

