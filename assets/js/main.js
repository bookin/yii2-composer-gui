var showAjaxModal = function(ajaxUrl, title){
    var modalID = "ajax-modal";
    var $modal = $("#"+modalID);

    if($modal.length){
        if(!$modal.data("loader")&&$modal.find("img").length){
            $modal.data("loader",$modal.find("img").attr("src"));
        }

        if(!$modal.data('bs.modal').isShown){
            $modal.find('.modal-body').html($("<div/>").addClass("text-center").append($("<img/>").attr("src",$modal.data("loader"))));
            $modal.modal('show');
        }

        $modal.find('.modal-body').load(ajaxUrl);
        var $modalHeader = $modal.find('.modal-header');
        if(!$modalHeader.find('h4').length)
            $modalHeader.append('<h4 class="modal-title"/>');
        $modalHeader.find('h4').text(title);
    }
};

$(function(){
    $(document).on('click','.show-ajax-modal',function(e){
        e.preventDefault();
        var url = $(this).data('url') || $(this).attr('url');
        showAjaxModal($(this).data('url')||$(this).attr('href'), $(this).data('header'));
    });

    $("#search-button").click(function(){
        var searchField = $("#search-field");
        $(this).attr("href", "http://test.loc/web/composer/default/search?"+searchField.attr("name")+"="+searchField.val());
    });
});