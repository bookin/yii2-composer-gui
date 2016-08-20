var showAjaxModal = function(ajaxUrl, title){
    var modalID = "ajax-modal";
    var $modal = $("#"+modalID);

    if($modal.length){
        if(!$modal.data("loader")&&$modal.find("img").length){
            $modal.data("loader",$modal.find("img").attr("src"));
        }

        $modal.find('.modal-body').html($("<div/>").addClass("text-center").append($("<img/>").attr("src",$modal.data("loader"))));
        if(!$modal.data('bs.modal').isShown){
            $modal.modal('show');
        }
        
        var $modalHeader = $modal.find('.modal-header');
        if(!$modalHeader.find('h4').length)
            $modalHeader.append('<h4 class="modal-title"/>');
        $modalHeader.find('h4').text(title);

        $modal.find('.modal-body').load(ajaxUrl);
    }
};

$(function(){
    $(document).on('click','.show-ajax-modal',function(e){
        e.preventDefault();
        var url = $(this).data('url') || $(this).attr('url');
        showAjaxModal($(this).data('url')||$(this).attr('href'), $(this).data('header'));
    });

    $("#search-button").click(function(e){
        var searchField = $("#search-field");
        if(!$(this).hasData('default-url')){
            $(this).data('default-url', $(this).attr("href"));
        }
        $(this).attr("href", $(this).data('default-url')+"?"+searchField.attr("name")+"="+searchField.val());
    });

    $(document).on("submit", "#install-form", function(e){
        e.preventDefault();
        console.log($(this));
        var $name = $(this).find('input[name="package"]');
        var $version = $(this).find('input[name="version"]');
        /* TODO: add validate info */
        var params = {
            command:'require',
            options:{
                packages:[$name.val()+':'+$version.val()]
            }
        };
        var url = $(this).data('ajax-url')+'?'+jQuery.param(params);
        showAjaxModal(url, $(this).data('header'));
        return false;
    });
});