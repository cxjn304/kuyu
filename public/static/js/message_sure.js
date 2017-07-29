
    $("input[name=sup_name]").blur(function () {
        var myReg = /^[\u4e00-\u9fa5]+$/;
        if (myReg.test($("input[name=sup_name]").val())) {
            $('.span1').text("输入正确!").css("color","green");
        } else {
            $('.span1').text("*请输入中文名称!").css("color","red");
            $("input[name=sup_name]").val("");
        }
    })
    $("input[name=sup_phone]").blur(function () {
        var phone =  /^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/;
        if ( phone.test($("input[name=sup_phone]").val())){
            $('.span2').text("合法的手机号!").css("color","green");
        } else {
            $('.span2').text("*请输入合法的手机号!").css("color","red");
            $("input[name=sup_phone]").val("");
        }
    })
    $("input[name=sup_legal_sn]").blur(function () {
        var cP = /^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/;
        if ( cP.test($("input[name=sup_legal_sn]").val())){
            $('.span3').text("合法的身份证号!").css("color","green");
        } else {
            $('.span3').text("*请输入合法的身份证号!").css("color","red");
            $("input[name=sup_legal_sn]").val("");
        }
    })
    $("input[name=sup_comp_phone]").blur(function () {
        var phone =  /^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/;
        if ( phone.test($("input[name=sup_comp_phone]").val())){
            $('.span4').text("合法的手机号!").css("color","green");
        } else {
            $('.span4').text("*请输入合法的手机号!").css("color","red");
            $("input[name=sup_comp_phone]").val("");
        }
    })
    $("input[name=sup_cap]").blur(function () {
        var posPattern = /^\d+$/;
        if ( posPattern.test($("input[name=sup_cap]").val())){
            $('.span5').text("输入正确!").css("color","green");
        } else {
            $('.span5').text("*请输入正整数!").css("color","red");
            $("input[name=sup_cap]").val("");
        }
    })
