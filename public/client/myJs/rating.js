$(document).ready(function(){


    $('#stars li').on('mouseover', function(){

        var onStar = parseInt($(this).data('value'), 10);

        $(this).parent().children('li.star').each(function(e){
            if (e < onStar) {
                $(this).addClass('filled-star-hover');
            }
            else {
                $(this).removeClass('filled-star-hover');
            }
        });

    }).on('mouseout', function(){
        $(this).parent().children('li.star').each(function(e){
            $(this).removeClass('filled-star-hover');
        });
    });


    $('#stars li').on('click', function(){

        var onStar = parseInt($(this).data('value'), 10);

        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('filled-star-selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('filled-star-selected');
        }

        var ratingValue = parseInt($('#stars li.filled-star-selected').last().data('value'), 10);
        var belong = $('#stars li.filled-star-selected').last().data('belong')

        document.getElementById(belong).value = ratingValue;

    });


});
