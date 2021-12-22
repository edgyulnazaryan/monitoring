jQuery(document).ready(function (){

    var answer_1_check = false;
    var answer_3_check = false;
    var answer_4_check = false;
    var answer_2_check = false;
    jQuery('.answer_1').on('keyup', function (e){
        answer_1 = jQuery(this).val()
        if (answer_1.length >= 0)
            answer_1_check = true
    })

    jQuery('.answer_2').on('keyup', function (e){
        answer_2 = jQuery(this).val()
        if (answer_2.length >= 0)
            answer_2_check = true
    })

    jQuery('.answer_3').on('keyup', function (e){
        answer_3 = jQuery(this).val()
        if (answer_3.length >= 0)
            answer_3_check = true
    })

    jQuery('.answer_4').on('keyup', function (e){
        answer_4 = jQuery(this).val()
        if (answer_4.length >= 0)
        answer_4_check = true
        if (answer_1_check && answer_2_check && answer_3_check && answer_4_check ) {
            jQuery(".correct_answer").html
            (
                "<option name='correct_answer' value="+answer_1+" >"+answer_1+"</option>" +
                "<option name='correct_answer' value="+answer_2+">"+answer_2+"</option>" +
                "<option name='correct_answer' value="+answer_3+">"+answer_3+"</option>" +
                "<option name='correct_answer' value="+answer_4+">"+answer_4+"</option>"
            )
        }
    })

    /*console.log(answer_1_check)
        console.log(answer_2_check)
        console.log(answer_3_check)
        console.log(answer_4_check)*/


    /*jQuery(".answer_1").val()
    jQuery(".answer_2").val()
    jQuery(".answer_3").val()
    jQuery(".answer_4").val()*/



    var current_page = jQuery(".question_data").children('div').data('id');
    const check_selections = [
        { 'id' : current_page, 'data' : '' }
    ];
    var arr = []


    jQuery(".question_answer_block").children('.answer_class').each(function ()
    {
        jQuery(this).children().eq(1).change(function (e) {
            var val = jQuery(this).val()
            var rating = jQuery(this).data('rate')

            if (val.length != 0)
            {
                jQuery('.data_answer').val(val)
                jQuery('.rating').val(rating)
            }

        })


    })




    jQuery('.pager').children('li').each(function (e)
    {
        if(!jQuery(this).hasClass('active') /* && jQuery(this).text() != "← Previous" && jQuery(this).text() != "Next →" */)
        {
            jQuery(this).attr('hidden', true)
        }
    })
    jQuery(".btn-result-test").click(function (e)
    {


        /*$.ajax({
            url: "/announcements/getChildren",
            method: "post",
            data: {
                parent_id: parent_id,
                location_type_id: '2'
            },
            success: function(result) {
                if (result) {
                    district.empty();
                    let empty_val = "<option val=''>district</option>";
                    district.append(empty_val);
                    for (let i = 0; i < result.length; i++) {
                        let option = $("<option value=" + result[i].id + ">" + result[i].label + "</option>");
                        district.append(option);
                    }
                }
            },
            fail: function(result) {
                //
            },
        })*/

    })

})
